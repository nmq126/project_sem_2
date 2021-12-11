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
    $("form[name=change]").submit();
});
$("#lock").click(function(e) {
    $("form[name=statuschange]").submit();
});