<!DOCTYPE html>
<html>

<head>
    <title>Xác nhận</title>
</head>

<body>
    <div>
        <h3 style="color: blue">Thông tin đặt hàng</h3>
        <p>Tên khách hàng: {{$bill->name}}</p>
        <p>Địa chỉ: {{$bill->address}}</p>
        <p>Điện thoại: {{$bill->phone}}</p>
        <h3 style="color: blue">Thông tin đặt hàng</h3>
        <table class="table table-condensed">
            <thead>
                <td class="description">Tên sản phẩm</td>
                <td class="price">Giá</td>
                <td class="quantity">Số lượng</td>
                <td class="total">Thành tiền</td>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $Item)
                <tr>
                    <td class="cart_description">
                        <p>{{ $Item->name }}</p>
                    </td>
                    <td class="cart_price">
                        <p>{{ $Item->price }} VNĐ</p>
                    </td>
                    <td class="cart_quantity">
                        <p>{{ $Item->qty }}</p>
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price">{{ $Item->price * $Item->qty }} VNĐ</p>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        <h3 style="color: blue">Qúy khách đã đặt hàng thành công</h3>
        <p>
            Sản phẩm của quý khách sẽ được vận chuyển đến địa chỉ có trong
            phần thông tin trong thời gian sớm nhất và nhận viên giao hàng
            sẽ liên lạc với quý khách 24h trước khi giao hàng đến địa chỉ
        </p>
    </div>
</body>

</html>