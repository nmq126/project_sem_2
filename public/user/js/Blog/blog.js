var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
};

$(".search-input").keyup(function() {
    var _text = $(this).val();

    if (_text != '') {
        $.ajax({
            url: "http://127.0.0.1:8000/blog-json?key=" + _text,
            method: "GET",
            success: function(res) {
                var _html = `;

`
                res.forEach(element => {

                    _html += `<div class="media">
    <a href="#">
        <img 
        src="` + element.image + `" alt="">
    </a>
    <div class="media-body">
        <h4><a href="#">` + element.title + `</a> </h4>
    </div>
    </div>`;
                });

                $(".result").html(_html);

            }

        });

    } else {

        $(".result").html("");
    }

});