<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.6;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        h2 {
            color: #007bff;
        }
        .product {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
            margin-bottom: 10px;
        }
        .product img {
            max-width: 100px;
            height: auto;
            display: block;
            margin-bottom: 10px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>New Order Notification</h2>
        <p>Dear UMKM - {{ $seller->name }},</p>
        <p>A new order has been placed for one of your products.</p>
        <p>Customer Email: {{ $order->email }}</p>

        @foreach($order->items as $item)
            <div class="product">
                @if($item->product->images->isNotEmpty())
                <img src="{{ asset('images/' . $item->product->images->first()->image_path) }}" alt="{{ $item->product->name }}" style="max-width: 200px;">
            @else
                <img src="{{ asset('images/placeholder.png') }}" alt="No image available" style="max-width: 200px;">
            @endif
                <p><strong>Product Name:</strong> {{ $item->product->name }}</p>
                <p><strong>Description:</strong> {{ $item->product->description }}</p>
                <p><strong>Quantity:</strong> {{ $item->quantity }}</p>
            </div>
        @endforeach

        <p><strong>Message:</strong> {{ $order->message }}</p>
        <p>We will contact you shortly regarding your order.</p>

        <div class="footer">
            <p>Best Regards,</p>
            <p>Intech Technology - Australia</p>
        </div>
    </div>
</body>
</html>
