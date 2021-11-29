const container = document.querySelector(".cart-wrapper");
const cards = document.querySelector(".carts");

let isPressDown = false;
let cursorXSapce;

container.addEventListener("mousedown", function(e) {
    isPressDown = true;
    cursorXSapce = e.offsetX - cards.offsetLeft;

});
window.addEventListener("mouseup", function(e) {
    isPressDown = false;
});
container.addEventListener("mousemove", function(e) {
    if (!isPressDown) return;
    e.preventDefault();
    cards.style.left = `${e.offsetX - cursorXSapce}px`
    boundCards();
});

function boundCards() {
    const container_rect = container.getBoundingClientRect();
    const cards_rect = cards.getBoundingClientRect();

    if (parseInt(cards.style.left) > 0) {

        cards.style.left = 0;
    } else if (cards_rect.right < container_rect.right) {
        cards.style.left = `-${cards_rect.width - container_rect.width}px`
    }


}
window.addEventListener("load", function() {
    const slider = this.document.querySelector(".slider");
    const sliderMain = this.document.querySelector(".slider-main");
    const sliderItems = this.document.querySelectorAll(".slider-item");
    const nextBtn = this.document.querySelector(".fa-chevron-circle-right");
    const prevBtn = this.document.querySelector(".fa-chevron-circle-left ");
    const sliderItemWidth = sliderItems[0].clientWidth;
    const sliderLength = sliderItems.length;
    let postionX = 0;
    let index = 0;
    nextBtn.addEventListener("click", function() {
        handleChangeSlide(1);
    });
    prevBtn.addEventListener("click", function() {
        handleChangeSlide(-1);
    });

    function handleChangeSlide(direction) {
        if (direction == 1) {
            index++;
            if (index >= sliderLength - 2) {
                index = 0;
                postionX = 0;
                sliderMain.style.transform = `translateX(${postionX}px)`;
                return;
            };
            postionX = postionX - sliderItemWidth;
            sliderMain.style.transform = `translateX(${postionX}px)`;

        } else if (direction == -1) {
            index--;
            if (index < 0) {
                index = 0;
                postionX = 0;
                sliderMain.style.transform = `translateX(${postionX}px)`;
                return;


            };

            postionX = postionX + sliderItemWidth;

            sliderMain.style.transform = `translateX(${postionX}px)`
        }
    }


});




$(document).ready(function() {
    const inputQuantity = $('input[name=quantity]');
    let quantity = 1;
    const input = $("#quantity-span");
    $("button[name=minus]").click(function(event) {
        quantity--;
        if (quantity <= 0) {
            quantity = 1;
        }

        input.html(quantity);
        inputQuantity.val(quantity);

    });
    $("button[name=plus]").click(function(event) {
        quantity++;
        input.innerHTML = `${quantity}`
        input.html(quantity);
        inputQuantity.val(quantity);

    });


});
$(".comment").click(function(event) {
    $(".comment").addClass("active");
    $(".detail").removeClass("active");
    $(".detail-item-2").css("display", "none");
    $(".detail-item-1").css("display", "block");
});
$(".detail").click(function(event) {
    $(".comment").removeClass("active");
    $(".detail").addClass("active");
    $(".detail-item-1").css("display", "none");
    $(".detail-item-2").css("display", "block");
});