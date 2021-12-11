$(document).ready(function () {
    $('.add-to-cart-button').click(function () {
        let data = {
            id: this.getAttribute('data-id'),
            name: this.getAttribute('data-name'),
            quantity: $('input[name=quantity]').val()
        }
        addToCart(data);
    })
})

function addToCart(data) {
    $.ajax({
        url: '/cart/add?id=' + data.id + '&quantity=' + data.quantity,
        method: 'GET',
        success: function (res) {
            $.toast({
                heading: 'Thành công',
                text: 'Sản phẩm ' + data.name + ' đã được thêm vào giỏ hàng',
                position: 'bottom-left',
                showHideTransition: 'slide',
                hideAfter: 5000,
                icon: 'success',
                stack: 5
            })
            updatePrice(res)
        },
        error: function (data) {
            $.toast({
                heading: 'Thất bại',
                text: 'Có lỗi xảy ra, vui lòng thử lại sau',
                position: 'top-center',
                showHideTransition: 'slide',
                hideAfter: 5000,
                icon: 'error',
                stack: 5
            })
        }
    })
    function updatePrice(data) {
        let totalQuantity = 0;
        for (let key in data) {
            totalQuantity += data[key].quantity * 1;
        }
        $('#lblCartCount').html(totalQuantity);
    }
}
