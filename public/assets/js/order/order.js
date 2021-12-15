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


 //~~~~~~~~~~~~

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
 //chuyển đổi tất cả trạng thái đơn hàng sang Trạng thái Hủy bỏ
 $(".destroy").click(function() {
     let ids = {

         id: array_id,
     }

     $.ajax({
         url: '/admin/orders/destroy',
         data: ids,
         method: 'POST',

         success: function(msg) {
             alert("Thay đổi trạng thái tất cả đơn hàng thành công ")
             location.reload()
         },
         error: function(data) { alert("Bạn chưa chọn mục tiêu") }
     });

 });
 $(".done-all").click(function() {
     let ids = {

         id: array_id,
     }

     $.ajax({
         url: '/admin/orders/done',
         data: ids,
         method: 'POST',

         success: function(msg) {
             alert("Thay đổi trạng thái tất cả đơn hàng thành công ")
             location.reload()
         },
         error: function(data) { alert("Bạn phải chưa chọn mục tiêu") }
     });

 });
 $(".wait-all").click(function() {
     let ids = {

         id: array_id,
     }

     $.ajax({
         url: '/admin/orders/wait',
         data: ids,
         method: 'POST',

         success: function(msg) {
             alert("Thay đổi trạng thái tất cả đơn hàng thành công ")
             location.reload()
         },
         error: function(data) { alert("Bạn phải chưa chọn mục tiêu") }
     });

 });
 $(".waircheckout-all").click(function() {
     let ids = {

         id: array_id,
     }

     $.ajax({
         url: '/admin/orders/waircheckout',
         data: ids,
         method: 'POST',

         success: function(msg) {
             alert("Thay đổi trạng thái tất cả đơn hàng thành công ")
             location.reload()
         },
         error: function(data) { alert("Bạn phải chưa chọn mục tiêu") }
     });

 });
 $(".process-all").click(function() {
     let ids = {

         id: array_id,
     }

     $.ajax({
         url: '/admin/orders/process',
         data: ids,
         method: 'POST',

         success: function(msg) {
             alert("Thay đổi trạng thái tất cả đơn hàng thành công ")
             location.reload()
         },
         error: function(data) { alert("Bạn phải chưa chọn mục tiêu") }
     });

 });
 $(".deliver-all").click(function() {
     let ids = {

         id: array_id,
     }

     $.ajax({
         url: '/admin/orders/deliver',
         data: ids,
         method: 'POST',

         success: function(msg) {
             alert("Thay đổi trạng thái tất cả đơn hàng thành công ")
             location.reload()
         },
         error: function(data) { alert("Bạn phải chưa chọn mục tiêu") }
     });

 });
 $(".check-all").click(function() {
     let ids = {

         id: array_id,
     }

     $.ajax({
         url: '/admin/orders/checkall',
         data: ids,
         method: 'POST',

         success: function(msg) {
             alert("Thay đổi thanh toán tất cả đơn hàng thành công ")
             location.reload()
         },
         error: function(data) { alert("Bạn phải chưa chọn mục tiêu") }
     });

 });
 $(".checkall-none").click(function() {
     let ids = {

         id: array_id,
     }

     $.ajax({
         url: '/admin/orders/checkallnon',
         data: ids,
         method: 'POST',

         success: function(msg) {
             alert("Thay đổi thanh toán tất cả đơn hàng thành công ")
             location.reload()
         },
         error: function(data) { alert("Bạn phải chưa chọn mục tiêu") }
     });

 });
 $(".delete-all").click(function() {
     let ids = {

         id: array_id,
     }

     $.ajax({
         url: '/admin/orders/delete_all',
         data: ids,
         method: 'POST',

         success: function(msg) {
             alert("xóa tất cả thành công thành công ")
             location.reload()
         },
         error: function(data) { alert("Bạn phải chưa chọn mục tiêu") }
     });

 });
 //```````````````````````````````````````````````````````````````````````````````
 //```````````````````````````````````````````````````````````````````````````````
 //```````````````````````````````````````````````````````````````````````````````
 $("#cancel").click(function() {
     hide();
 });



 function message() {
     $("#delete_message").slideDown();
 }

 function hide() {
     $("#delete_message").slideUp();
 }


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
 $("button[name= excel]").click(function(e) {
     window.location.replace("/download");

 });
 //~~~~~~~~~~~~~~~~~~~~

 $("button[name= reset]").click(function(e) {
     $("input[name=start_date]").val('');
     $("input[name=end_date]").val('');
     $("input[name=key]").val('');
     $("input[name=address]").val('');
     $("input[name=phone]").val('');
     $("select[id=status]").val(-1);
     $("select[id=checkout]").val(2);
     $("select[id=product]").val(0);
     $("select[id=trash]").val(0);

 });

 //submit change
 $("select[name=checkout]").change(function() {
     this.form.submit();

 });
 $("select[name=status]").change(function() {
     this.form.submit();

 });
