$(".delete").click(function(event) {
    event.preventDefault();
    deleteItem();
});

$("#cancel-item").click(function() {
    hideItem();
});

function deleteItem() {
    $("#delete_order").slideDown();
}

function hideItem() {
    $("#delete_order").slideUp();
}

$("select[name=level]").change(function(e) {
    if (window.confirm('Bạn có chắc muốn thay đổi chức vụ của user này?')){
        this.form.submit();
    }
    else if (this.value == 1) this.value = 0;
    else if (this.value == 0) this.value = 1;
});
$("select[name=status]").change(function(e) {
    if (window.confirm('Bạn có chắc muốn khóa/mở khóa tài khoản này?')) {
        this.form.submit();
    }
    else if (this.value == 1) this.value = 0;
    else if (this.value == 0) this.value = 1;
});
