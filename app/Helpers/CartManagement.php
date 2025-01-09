<?php

namespace App\Helpers;

use App\Models\Product;
use Illuminate\Support\Facades\Cookie;

class CartManagement
{
    // add item to cart
    static public function addItemToCart($product_id)
    {
        $cart_items = self::getCartItemsFromCookie();
    $existing_item = null;

    foreach ($cart_items as $key => $item) {
        if ($item['product_id'] == $product_id) {
            $existing_item = $key;
            break;
        }
    }

    $product = Product::find($product_id);
    if ($product) {
        if ($existing_item !== null) {
            // Validasi stok sebelum menambah quantity
            if ($cart_items[$existing_item]['quantity'] < $product->quantity) {
                $cart_items[$existing_item]['quantity']++;
                $cart_items[$existing_item]['total_amount'] = $cart_items[$existing_item]['quantity'] * $cart_items[$existing_item]['unit_amount'];
            } else {
                session()->flash('error', 'Stok tidak mencukupi untuk ' . $product->name);
            }
        } else {
            // Tambah produk jika belum ada di keranjang
            if ($product->quantity > 0) {
                $cart_items[] = [
                    'product_id' => $product->id,
                    'name' => $product->name,
                    'image' => $product->image[0],
                    'quantity' => 1,
                    'unit_amount' => $product->price,
                    'total_amount' => $product->price
                ];
            } else {
                session()->flash('error', 'Produk ' . $product->name . ' tidak tersedia.');
            }
        }
    }
        self::addCartItemsToCookie($cart_items);
        return count($cart_items);
    }
    // Add custom product to cart with incrementing ID and auto-generated name
    static public function addCustomProductToCart($customProduct)
    {
        // Get the existing custom products from the cookie
        $custom_products = json_decode(Cookie::get('custom_products'), true);

        // Inisialisasi array custom_products jika kosong
        $custom_products = isset($_COOKIE['custom_products']) ? json_decode($_COOKIE['custom_products'], true) : [];

        // Tambahkan produk kustom ke array
        $custom_products[] = $customProduct;

        // Save the updated custom products back to the cookie (expires in 30 days)
        Cookie::queue('custom_products', json_encode($custom_products), 60 * 24 * 30);

        // Optionally, clear custom products from the cookie after checkout
        Cookie::queue(Cookie::forget('custom_products'));

        // Get the current cart items from the cookie
        $cart_items = self::getCartItemsFromCookie();

        // Add the cart items (including custom products) back to the cookie
        self::addCartItemsToCookie($cart_items);

        return count($cart_items) + count($custom_products);
    }

    // add item to cart with quantity
    static public function addItemToCartWithQty($product_id, $qty = 1)
    {
        $cart_items = self::getCartItemsFromCookie();

        $existing_item = null;

        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                $existing_item = $key;
                break;
            }
        }

        if ($existing_item !== null) {
            $cart_items[$existing_item]['quantity'] = $qty;
            $cart_items[$existing_item]['total_amount'] = $cart_items[$existing_item]['quantity'] *
                $cart_items[$existing_item]['unit_amount'];
        } else {
            $product = Product::where('id', $product_id)->first(['id', 'name', 'price', 'image']);
            if ($product) {
                $cart_items[] = [
                    'product_id' => $product->id,
                    'name' => $product->name,
                    'image' => $product->image[0],
                    'quantity' => $qty,
                    'unit_amount' => $product->price,
                    'total_amount' => $product->price
                ];
            }
        }
        self::addCartItemsToCookie($cart_items);
        return count($cart_items);
    }

    // remove item from cart
    static public function removeCartItem($product_id)
    {
        $cart_items = self::getCartItemsFromCookie();

        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                unset($cart_items[$key]);
            }
        }

        self::addCartItemsToCookie($cart_items);
        return $cart_items;
    }

    // add cart items to cookie
    static public function addCartItemsToCookie($cart_items)
    {
        Cookie::queue('cart_items', json_encode($cart_items), 60 * 24 * 30);
    }
    // clear cart items from cookie
    static public function clearCartItems()
    {
        Cookie::queue(Cookie::forget('cart_items'));
        Cookie::queue(Cookie::forget('custom_products'));
    }
    // Get all custom products from cookie
    static public function getCustomProductsFromCookie()
    {
        $custom_products = json_decode(Cookie::get('custom_products'), true);
        if (!$custom_products) {
            $custom_products = [];
        }
        return $custom_products;
    }
    // Add custom product to cart (and handle both regular and custom products in the same function)
    static public function addItemToCartWithCustomProduct($product_id = null, $customProduct = null)
    {
        $cart_items = self::getCartItemsFromCookie();

        if ($customProduct) {
            // Add custom product if it's provided
            self::addCustomProductToCart($customProduct);
        } else {
            // Handle regular product if provided
            $existing_item = null;
            foreach ($cart_items as $key => $item) {
                if ($item['product_id'] == $product_id) {
                    $existing_item = $key;
                    break;
                }
            }

            if ($existing_item !== null) {
                $cart_items[$existing_item]['quantity']++;
                $cart_items[$existing_item]['total_amount'] = $cart_items[$existing_item]['quantity'] *
                    $cart_items[$existing_item]['unit_amount'];
            } else {
                $product = Product::where('id', $product_id)->first(['id', 'name', 'price', 'image']);
                if ($product) {
                    $cart_items[] = [
                        'product_id' => $product->id,
                        'name' => $product->name,
                        'image' => $product->image[0],
                        'quantity' => 1,
                        'unit_amount' => $product->price,
                        'total_amount' => $product->price
                    ];
                }
            }
        }

        // Add both regular and custom products to cookie
        self::addCartItemsToCookie($cart_items);
        return count($cart_items);
    }

    // get all cart items from cookie
    static public function getCartItemsFromCookie()
    {
        $cart_items = json_decode(Cookie::get('cart_items'), true);
        if (!$cart_items) {
            $cart_items = [];
        }
        return $cart_items;
    }

    // increment item quantity
    static public function incrementQuantityToCartItem($product_id)
    {
        $cart_items = self::getCartItemsFromCookie();

    foreach ($cart_items as $key => $item) {
        if ($item['product_id'] == $product_id) {
            // Ambil stok produk dari database
            $product = Product::find($product_id);
            if ($product && $item['quantity'] < $product->quantity) {
                // Tambah quantity jika stok mencukupi
                $cart_items[$key]['quantity']++;
                $cart_items[$key]['total_amount'] = $cart_items[$key]['quantity'] * $cart_items[$key]['unit_amount'];
            } else {
                // Jika stok tidak cukup, tampilkan pesan error (opsional)
                session()->flash('error', 'Stok tidak mencukupi untuk ' . $item['name']);
            }
        }
    }
        self::addCartItemsToCookie($cart_items);
        return $cart_items;
    }

    // decrement item quantity
    static public function decrementQuantityToCartItem($product_id)
    {
        $cart_items = self::getCartItemsFromCookie();

        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                if ($cart_items[$key]['quantity'] > 1) {
                    $cart_items[$key]['quantity']--;
                    $cart_items[$key]['total_amount'] = $cart_items[$key]['quantity'] * $cart_items[$key]
                    ['unit_amount'];
                }
            }
        }
        self::addCartItemsToCookie($cart_items);
        return $cart_items;
    }

    // Di dalam CartManagement.php
    public static function calculateGrandTotal($cart_items)
    {
        $total = 0;

        foreach ($cart_items as $item) {
            $total += $item['total_amount'];
        }

        return $total;
    }


}
