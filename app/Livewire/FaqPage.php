<?php

namespace App\Livewire;

use Livewire\Component;

class FaqPage extends Component
{
    public $faqs = [
        [
            'question' => 'Apa itu UD Laris?',
            'answer' => 'UD Laris adalah salah satu UMKM di Yogyakarta yang bergerak di bidang
            furniture (lemari, kursi, meja, rak) berbahan dasar dari kayu.'
        ],
        [
            'question' => 'Apakah Customer dapat memesan produk secara kustom',
            'answer' => 'Ya, Anda dapat memesan produk kustom dari daftar yang tersedia pada halaman Kustom Produk.'
        ],
        [
            'question' => 'Berapa lama pesanan kustom dapat diselesaikan?',
            'answer' => 'Tergantung dari kerumitan produk yang dipesan, umumnya bisa dicapai 3-7.'
        ],
        [
            'question' => 'Bagaimana cara melakukan pembayaran di web UD Laris',
            'answer' => 'Pembayaran dapat dilakukan dengan menggunakan metode COD atau Midtrans untuk pembayaran
            digital yang lebih banyak.'
        ],
        [
            'question' => 'Bagaimana cara melakukan kustomisasi produk di web UD Laris',
            'answer' => 'Caranya sangat mudah, Anda cukup mengikuti langkah-langkah di halaman Kustom Produk.
            Setelah itu Anda akan mendapatkan konfirmasi untuk melanjutkan pembayaran.'
        ]
    ];

    public function render()
    {
        return view('livewire.faq-page');
    }
}
