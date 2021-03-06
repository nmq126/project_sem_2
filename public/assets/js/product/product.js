$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var handlers = [
    // on first click:
    function() {
        $(".select").addClass("active");

    },
    // on second click:
    function() {
        $(".select").removeClass("active");

    }
    // ...as many more as you want here
];

var counter = 0;
$(".button-select").click(function() {
    // call the appropriate function preserving this and any arguments
    handlers[counter++].apply(this, Array.prototype.slice.apply(arguments));
    // "wrap around" when all handlers have been called
    counter %= handlers.length;
});
$("#checkall").change(function(e) {
    if ($(this).prop("checked") == false) {
        while (array_id.length > 0) {
            array_id.pop();
        }
    }
});
const array_id = [];
$("#checkall").click(function(e) {
    while (array_id.length > 0) {
        array_id.pop();
    }
    $(".checkitem").prop("checked", $(this).prop("checked"))
    $(".checkitem").each(function(e) {
        array_id.push($(this).val());
    });

});
//remove element array_id
function remove(value) {

    const index = array_id.indexOf(value);
    if (index > -1) { array_id.splice(index, 1); }
}
//~~~~~~~~~~~~~~~~~~~~
//check box element
$(".checkitem").change(function(e) {
    if ($(this).prop("checked") == true) {
        array_id.push($(this).val());
    }
    if ($(this).prop("checked") == false) {
        $("#checkall").prop("checked", false);
        remove($(this).val());
    }
    if ($(".checkitem:checked").length == $(".checkitem").length) {
        $("#checkall").prop("checked", true);
    }
});
//~~~~~~~~~~~~~~~~~~~~
$("button[name= checkall]").click(function(e) {
    while (array_id.length > 0) {
        array_id.pop();
    }
    $(".checkitem").prop("checked", $("#checkall").prop("checked", true))
    $(".checkitem").each(function(e) {
        array_id.push($(this).val());

    });
});
$("button[name= reset]").click(function(e) {
    $("input[name=name]").val('');
    $("input[name=min]").val('');
    $("input[name=max]").val('');
    $("select[name=status]").val(-1);
    $("select[name=category]").val(-1);
    $("select[name=discount]").val(-1);
    $("select[name=isFeatured]").val(-1);

});
$(".destroy").click(function() {
    let ids = {
        id: array_id,
    }

    $.ajax({
        url: '/admin/products/destroy',
        data: ids,
        method: 'POST',
        success: function(msg) {
            alert("Thay ?????i th??nh c??ng ")
            location.reload();
        },
        error: function(data) { alert("B???n ph???i ch??a ch???n m???c ti??u") }
    });

});
$(".stock-all").click(function() {
    let ids = {
        id: array_id,
    }

    $.ajax({
        url: '/admin/products/status',
        data: ids,
        method: 'POST',
        success: function(msg) {
            alert("Thay ?????i th??nh c??ng ")
            location.reload();
        },
        error: function(data) { alert("B???n ph???i ch??a ch???n m???c ti??u") }
    });

});
$(".unstock-all").click(function() {
    let ids = {
        id: array_id,
    }

    $.ajax({
        url: '/admin/products/unstatus',
        data: ids,
        method: 'POST',
        success: function(msg) {
            alert("Thay ?????i th??nh c??ng ")
            location.reload();
        },
        error: function(data) { alert("B???n ph???i ch??a ch???n m???c ti??u") }
    });

});
$(".popular-all").click(function() {
    let ids = {
        id: array_id,
    }

    $.ajax({
        url: '/admin/products/featured',
        data: ids,
        method: 'POST',
        success: function(msg) {
            alert("Thay ?????i th??nh c??ng ")
            location.reload();
        },
        error: function(data) { alert("B???n ph???i ch??a ch???n m???c ti??u") }
    });

});
$(".unpopular-all").click(function() {
    let ids = {
        id: array_id,
    }

    $.ajax({
        url: '/admin/products/unfeatured',
        data: ids,
        method: 'POST',
        success: function(msg) {
            alert("Thay ?????i th??nh c??ng ")
            location.reload();
        },
        error: function(data) { alert("B???n ph???i ch??a ch???n m???c ti??u") }
    });

});



$("#cancel-item").click(function() {
    hideItem();
});

function deleteItem(id) {
    $("#delete_order_" + id).slideDown();

}

function hideItem(id) {
    $("#delete_order_" + id).slideUp();
}
