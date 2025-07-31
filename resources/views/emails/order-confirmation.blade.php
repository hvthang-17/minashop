<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đơn hàng</title>
</head>
<body>
    <h1>Cảm ơn bạn đã đặt hàng tại TT Antiques!</h1>

    <h3>Thông tin đơn hàng:</h3>
    <ul>
        <li><strong>Số đơn hàng:</strong> {{$order->id}}</li>
        <li><strong>Ngày:</strong> {{$order->created_at->format('d/m/Y H:i')}}</li>
        <li><strong>Tổng cộng:</strong> ${{$order->total}}</li>
        <li><strong>Phương thức thanh toán:</strong> cod</li>
    </ul>

    <h3>Tổng kết đơn hàng:</h3>
    <ul>
        <li><strong>Tạm tính:</strong> ${{$order->subtotal}}</li>
        <li><strong>Giảm giá:</strong> ${{$order->discount}}</li>
        <li><strong>VAT:</strong> ${{$order->tax}}</li>
        <li><strong>Tổng cộng:</strong> ${{$order->total}}</li>
    </ul>

    <p>Đơn hàng của bạn sẽ sớm được xử lý. Cảm ơn bạn đã tin tưởng mua sắm tại TT Antiques!.</p>

    <p>Trân trọng,<br>TT Antiques!</p>
</body>
</html>
