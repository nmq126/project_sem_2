document.addEventListener("DOMContentLoaded", function () {
    $("form[name=checkout-form]").validate({
        rules: {
            name: "required",
            email: {
                required: true,
                email: true,
            },
            phone: "required",
            address: "required",

        },
        messages: {
            name: "Please enter your name",
            email: {
                required: "Email is required",
                email: "Wrong email format."
            },
            phone: "Please enter your phone",
            address: "Please enter your address",

        },
        submitHandler: function () {
            form.submit();
            window.location.href = "/confirm";
        }
    });
});