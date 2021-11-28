let menu = document.querySelector('#menu-bar');
let navbar = document.querySelector('.navbar');
let prevScrollpos = window.pageYOffset;


menu.onclick = () => {

    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');

}

window.onscroll = () => {

    scrollFunction()
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');

    if (window.scrollY > 60) {
        document.querySelector('#scroll-top').classList.add('active');
    } else {
        document.querySelector('#scroll-top').classList.remove('active');
    }

}

// header onscroll animation

function scrollFunction() {
    /* Navigation bar scroll*/
    {
        let currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("nav").style.top = "0";
        } else {
            document.getElementById("nav").style.top = "-270px";
        }
        prevScrollpos = currentScrollPos;
    }
}
