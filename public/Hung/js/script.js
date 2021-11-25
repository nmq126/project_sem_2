let MenuItems = document.getElementById("MenuItems");
MenuItems.style.maxHeight = "0px";

function menu() {
    if (MenuItems.style.maxHeight === "0px") {
        MenuItems.style.maxHeight = "300px";
        document.getElementById("menu-button").classList.remove('fa-bars');
        document.getElementById("menu-button").classList.add('fa-times');
    } else {
        MenuItems.style.maxHeight = "0px";
        document.getElementById("menu-button").classList.remove('fa-times');
        document.getElementById("menu-button").classList.add('fa-bars');
    }
}

let prevScrollpos = window.pageYOffset;
window.onscroll = function () {
    $('#myBtn').click(function () {
        window.scroll({
            top: 0,
            behavior: 'smooth'
        });
    });

    {
        scrollFunction();
    }

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

        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
    }
}
