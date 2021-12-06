$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function() {


    Date.prototype.yyyymmdd = function() {
        var yyyy = this.getFullYear().toString();
        var mm = (this.getMonth() - 2).toString(); // getMonth() is zero-based
        var dd = this.getDate().toString();
        return yyyy + "-" + (mm[1] ? mm : "0" + mm[0]) + "-" + (dd[1] ? dd : "0" + dd[0]); // padding
    };
    var date = new Date();
    $("input[name=start_date]").val(date.yyyymmdd());
    const start_date = $("input[name=start_date]").val();
    const end_date = $("input[name=end_date]").val();

    let data = {
        start_date: start_date,
        end_date: end_date,
    }
    $.ajax({
        url: '/admin/dashboard/json/month',
        data: data,
        method: 'GET',

        success: function(data) {
            chartArea.setData(data);

        },
        error: function(data) {}
    });
    $.ajax({
        url: '/admin/dashboard/json',
        method: 'GET',

        success: function(data) {
            chart.setData(data);

        },
        error: function(data) {}
    });
    $.ajax({
        url: '/admin/dashboard/json/month',
        data: data,
        method: 'GET',

        success: function(data) {
            chartArea.setData(data);

        },
        error: function(data) {}
    });
});
$("button[name= reset]").click(function(e) {
    $("input[name=start_date]").val('');
    $("input[name=end_date]").val('');
    $("select[id=product]").val(0);
});
$("button[name=search]").click(function(e) {
    const start_date = $("input[name=start_date]").val();
    const end_date = $("input[name=end_date]").val();

    let data = {
        start_date: start_date,
        end_date: end_date,
    }
    $.ajax({
        url: '/admin/dashboard/json/month',
        data: data,
        method: 'GET',

        success: function(data) {
            chartArea.setData(data);

        },
        error: function(data) {}
    });
});