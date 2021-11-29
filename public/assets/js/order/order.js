    //dung tam
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
    $("button[name= deleteall]").click(function(event) {
        event.preventDefault();
        message();
    });
    $("#delete-all").click(function() {
        let ids = {

            id: array_id,
        }

        $.ajax({
            url: '/admin/orders/destroy',
            data: ids,
            method: 'POST',

            success: function(msg) {
                alert("Xóa tất cả thành công")
                location.reload()
            },
            error: function(data) { alert("Bạn phải chưa chọn mục tiêu") }
        });

    });
    $("#cancel").click(function() {
        hide();
    });



    function message() {
        $("#delete_message").slideDown();
    }

    function hide() {
        $("#delete_message").slideUp();
    }
    //````````````````````
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //Check All script
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

    //~~~~~~~~~~~~~~~~~~~~

    $("button[name= reset]").click(function(e) {
        $("input[name=start-date]").val('');
        $("input[name=end-date]").val('');
        $("select[name=status]").val(-1);

    });
    $("button[name=search]").click(function(e) {
        let start_date = $("input[name=start-date]").val();
        let end_date = $("input[name=end-date]").val();
        let status = $("select[name=status]").val();
        let data = {
            status: status,
            start_date: start_date,
            end_date: end_date,
        }
        $.ajax({
            url: "/admin/orders/search",
            method: "GET",
            data: data,
            success: function(data) {
                let contentHTML = "";
                data.forEach(element => {

                    contentHTML += ` 
<tr>
                            <td><span class="text-primary"><input type="checkbox" class="checkitem"value=${element.id} style="margin-right: 20px">${element.id}</span></td>
                            <td>${element.ship_name}</td>
                            <td>${element.ship_address}</td>
                            <td>${element.ship_phone}</td>
                            <td>${element.total_price}</td>
                            <td>${element.isCheckout}</td>
                            <td>${element.created_at}</td>
                            `;

                    if (element.status == 0) {
                        contentHTML += `
                        <td><span style="width:100px;"><span class="badge-text badge-text-small info">WaitForCheckout</span></span>
                        </td>
                              `
                    }

                    if (element.status == 1) {
                        contentHTML += `
                        <td><span style="width:100px;"><span class="badge-text badge-text-small info">Waiting</span></span>
                        </td>
                                `;
                    }

                    if (element.status == 2) {
                        contentHTML += `
                        <td><span style="width:100px;"><span class="badge-text badge-text-small info">Processing</span></span>
                        </td>
                              `
                    };
                    if (element.status == 3) {
                        contentHTML += `
                        <td><span style="width:100px;"><span class="badge-text badge-text-small info">Delivering</span></span>
                                </td>
                              `
                    };
                    if (element.status == 4) {
                        contentHTML += `
                        <td><span style="width:100px;"><span
                        class="badge-text badge-text-small success">Done</span></span>
            </td>
                              `
                    };
                    contentHTML += `
    <td class="td-actions">
                                <a href="'admin/orders/${element.id}/detail"><i
                                        class="la la-edit edit"></i></a>
                                <a href="#"><i class="la la-close delete"></i></a>
                            </td>
                        </tr>
    `;



                });
                $("#OrdersList").html(contentHTML);

            },
            error: function() {
                alert("Must handle error.");
            }
        });
    });
    $(".search-input").keyup(function() {
        var _text = $(this).val();

        if (_text != '') {
            $.ajax({
                url: "/admin/orders/search/" + _text,
                method: "GET",
                success: function(res) {
                    var contentHTML = '';


                    res.forEach(element => {


                        contentHTML += ` 
                        <tr>
                                                    <td><span class="text-primary"><input type="checkbox" class="checkitem"value=${element.id} style="margin-right: 20px">${element.id}</span></td>
                                                    <td>${element.ship_name}</td>
                                                    <td>${element.ship_address}</td>
                                                    <td>${element.ship_phone}</td>
                                                     <td>${element.total_price}</td>
                                                    <td>${element.isCheckout}</td>
                                                    <td>${element.created_at}</td>
                                                    `;
                        if (element.status == 0) {
                            contentHTML += `
                                                        <td><span style="width:100px;"><span class="badge-text badge-text-small info">WaitForCheckout</span></span>
                                                        </td>
                                                              `
                        }

                        if (element.status == 1) {
                            contentHTML += `
                                                        <td><span style="width:100px;"><span class="badge-text badge-text-small info">Waiting</span></span>
                                                        </td>
                                                                `;
                        }

                        if (element.status == 2) {
                            contentHTML += `
                                                        <td><span style="width:100px;"><span class="badge-text badge-text-small info">Processing</span></span>
                                                        </td>
                                                              `
                        };
                        if (element.status == 3) {
                            contentHTML += `
                                                        <td><span style="width:100px;"><span class="badge-text badge-text-small info">Delivering</span></span>
                                                                </td>
                                                              `
                        };
                        if (element.status == 4) {
                            contentHTML += `
                                                        <td><span style="width:100px;"><span
                                                        class="badge-text badge-text-small success">Done</span></span>
                                            </td>
                                                              `
                        };
                        contentHTML += `
                            <td class="td-actions">
                                                        <a href="'admin/orders/${element.id}/detail"><i
                                                                class="la la-edit edit"></i></a>
                                                        <a href="#"><i class="la la-close delete"></i></a>
                                                    </td>
                                                </tr>
                            `;


                    });

                    $("#OrdersList").html(contentHTML);

                }

            });

        } else {

            $.ajax({
                url: "/admin/orders/json",
                method: "GET",

                success: function(data) {
                    let contentHTML = "";
                    data.forEach(element => {

                        contentHTML += ` 
    <tr>
                                <td><span class="text-primary"><input type="checkbox" class="checkitem"value=${element.id} style="margin-right: 20px">${element.id}</span></td>
                                <td>${element.ship_name}</td>
                                <td>${element.ship_address}</td>
                                <td>${element.ship_phone}</td>
                                <td>${element.total_price}</td>
                                <td>${element.isCheckout}</td>
                                <td>${element.created_at}</td>
                                `;

                        if (element.status == 0) {
                            contentHTML += `
                            <td><span style="width:100px;"><span class="badge-text badge-text-small info">WaitForCheckout</span></span>
                            </td>
                                  `
                        }

                        if (element.status == 1) {
                            contentHTML += `
                            <td><span style="width:100px;"><span class="badge-text badge-text-small info">Waiting</span></span>
                            </td>
                                    `;
                        }

                        if (element.status == 2) {
                            contentHTML += `
                            <td><span style="width:100px;"><span class="badge-text badge-text-small info">Processing</span></span>
                            </td>
                                  `
                        };
                        if (element.status == 3) {
                            contentHTML += `
                            <td><span style="width:100px;"><span class="badge-text badge-text-small info">Delivering</span></span>
                                    </td>
                                  `
                        };
                        if (element.status == 4) {
                            contentHTML += `
                            <td><span style="width:100px;"><span
                            class="badge-text badge-text-small success">Done</span></span>
                </td>
                                  `
                        };
                        contentHTML += `
        <td class="td-actions">
                                    <a href="'admin/orders/${element.id}/detail"><i
                                            class="la la-edit edit"></i></a>
                                    <a href="#"><i class="la la-close delete"></i></a>
                                </td>
                            </tr>
        `;



                    });
                    $("#OrdersList").html(contentHTML);

                },
                error: function() {
                    alert("Must handle error.");
                }
            });
        }

    });