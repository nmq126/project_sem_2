<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-container">
    <h2>Shopping cart</h2>
    <p>Update your cart information</p>

    <table class="w3-table w3-table-all">
        <tr>
            <th>Product Id</th>
            <th>Product Name</th>
            <th>Unit Price</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Action</th>
        </tr>
        @php
            $totalPrice = 0;
        @endphp
        @foreach($shoppingCart as $cartItem)
            @php
                if (isset($cartItem) && isset($totalPrice)) {
                    $totalPrice += $cartItem->unitPrice * $cartItem->quantity;
                }
            @endphp
            <tr>
                <form action="/cart/update" method="post">
                    @csrf
                    <td>{{$cartItem->id}}</td>
                    <td>{{$cartItem->name}}</td>
                    <td>{{$cartItem->unitPrice}}</td>
                    <td>
                        <input type="hidden" name="id" value="{{$cartItem->id}}">
                        <input name="quantity" class="w3-input w3-border w3-quarter" type="number" min="1" value="{{$cartItem->quantity}}">
                    </td>
                    <td>{{$cartItem->unitPrice * $cartItem->quantity}}</td>
                    <td>
                        <button class="w3-button w3-indigo">Update</button>
                        <a href="/cart/remove?id={{$cartItem->id}}" onclick="return confirm('Bạn có chắc muốn xoá sản phẩm này khỏi giỏ hàng?')" class="w3-button w3-red">Delete</a>
                    </td>
                </form>
            </tr>
        @endforeach
    </table>
    <div style="margin-top: 20px">
        <strong>Total price {{$totalPrice}} VNĐ</strong>
    </div>
    <button><a href="/product">Thêm sản phẩm</a></button>
    <button><a href="/checkout">Đặt hàng</a></button>
</div>

</body>
</html>
