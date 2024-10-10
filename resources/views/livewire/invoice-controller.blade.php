<div>
    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        span,
        label {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }

        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }

        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }

        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }

        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }

        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }

        .text-end {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }

        .no-border {
            border: 1px solid #fff !important;
        }

        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">UD Laris Yogyakarta</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Invoice Id: {{ $order_id }}</span> <br>
                    <span>Date: {{ $order->created_at->format('d-m-Y') }}</span> <br>
                    <span>Zip code: {{ $address->zip_Code }}</span> <br>
                    <span>Address: {{ $address->street_address }}</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Order Details</th>
                <th width="50%" colspan="2">User Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Order Id:</td>
                <td>{{ $order->id }}</td>

                <td>Full Name:</td>
                <td>{{ $address->full_name }}</td>
            </tr>
            <tr>
                <td>Tracking Id/No.:</td>
                <td>0</td>

                <td>Email Id:</td>
                <td>{{ auth()->user()->email }}</td>
            </tr>
            <tr>
                <td>Ordered Date:</td>
                <td>{{ $order->created_at->format('d-m-Y h:i A') }}</td>

                <td>Phone:</td>
                <td>{{ $address->phone }}</td>
            </tr>
            <tr>
                <td>Payment Mode:</td>
                <td>{{ $order->payment_method }}</td>

                <td>Address:</td>
                <td>{{ $address->street_address }}, {{ $address->city }}, {{ $address->state }},
                    {{ $address->zip_code }}</td>
            </tr>
            <tr>
                <td>Order Status:</td>
                <td>{{ $order->status }}</td>

                <td>Pin code:</td>
                <td>0</td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Order Items
                </th>
            </tr>
            <tr class="bg-blue">
                <th>ID</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order_items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ Number::currency($item->unit_amount,'IDR') }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td class="fw-bold">{{ Number::currency($item->total_amount,'IDR') }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4" class="total-heading">Total Amount - <small>Inc. all vat/tax</small> :</td>
                <td colspan="1" class="total-heading">{{ Number::currency($item->order->grand_total,'IDR') }}</td>
            </tr>
        </tbody>
    </table>
    <div class="pt-5">
        <a href="{{ route('downloadinvoice', ['order_id' => $order->id]) }}" target="_blank" class="bg-slate-600 text-white py-2 px-6 rounded-md hover:bg-slate-500 btn-sm float-end">
            Download Invoice
        </a>
    </div>

        <br>
    <p class="text-center">
        Thank you for shopping with UD Laris Yogyakarta
    </p>

</div>
