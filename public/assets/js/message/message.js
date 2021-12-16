$("#cancel-item").click(function() {
    hideItem();
});

function deleteItem(id) {
    $("#delete_order_" + id).slideDown();

}

function hideItem(id) {
    $("#delete_order_" + id).slideUp();
}
