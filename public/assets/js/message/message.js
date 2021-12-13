$("#cancel").click(function() {
    hide();
});

function message() {
    $("#delete_message").slideDown();
}

function hide() {
    $("#delete_message").slideUp();
}

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
