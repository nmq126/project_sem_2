$("input[name=key]").keyup(function(e) {
    var _text = $(this).val();
    if (_text != '') {
        $.ajax({
            url: "/admin/user/" + _text,
            type: "GET",
            success: function(e) {
                var _html = "";
                for (var user of e) {
                    _html += `
    <div class="result-item">
    <img src="" alt="">
    <a href="/admin/user/detail/` + user.id + `"> <span>` + user.email + `</span></a>   
    </div>
    `;
                };

                $(".result").html(_html);
            }

        })
    } else {
        var _html = "";
        $(".result").html(_html);
    }

})