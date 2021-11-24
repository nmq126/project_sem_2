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
                index = sliderLength - 3;

                return;
            };
            postionX = postionX - sliderItemWidth;
            sliderMain.style.transform = `translateX(${postionX}px)`;

        } else if (direction == -1) {
            index--;
            if (index < 0) {

                index = 0;
                return;
            };

            postionX = postionX + sliderItemWidth;

            sliderMain.style.transform = `translateX(${postionX}px)`
        }
    }
});
