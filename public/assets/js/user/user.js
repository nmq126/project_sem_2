$("#cancel-item").click(function() {
    hideItem();
});

function deleteItem(id) {
    $("#delete_order_" + id).slideDown();

}

function hideItem(id) {
    $("#delete_order_" + id).slideUp();
}
$("select[name=level]").change(function(e) {
    if (window.confirm('Bạn có chắc muốn thay đổi chức vụ của user này?')) {
        this.form.submit();
    } else if (this.value == 1) this.value = 0;
    else if (this.value == 0) this.value = 1;
});
$("select[name=status]").change(function(e) {
    if (window.confirm('Bạn có chắc muốn khóa/mở khóa tài khoản này?')) {
        this.form.submit();
    } else if (this.value == 1) this.value = 0;
    else if (this.value == 0) this.value = 1;
});
