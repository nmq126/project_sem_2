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
    this.form.submit();
});
$("select[name=status]").change(function(e) {
    this.form.submit();
});