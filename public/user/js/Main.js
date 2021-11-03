// /* Flower flake animation */
// let pictureSrc = "../../user/img/pixlr-bg-result.png";
// let pictureWidth = 25;
// let pictureHeight = 25;
// let numFlakes = 10;
// let downSpeed = 0.0013;
// let lrFlakes = 5;
//
//
// if (Math.round(numFlakes) !== numFlakes || numFlakes < 1) {
//     numFlakes = 10;
// }
//
// for (let x = 0; x < numFlakes; x++) {
//     if (document.layers) {
//         document.write('<layer id="snFlkDiv' + x + '"><imgsrc="' + pictureSrc + '" height="' + pictureHeight + '"width="' + pictureWidth + '" alt="*" border="0"></layer>');
//     } else {
//         document.write('<div style="position:absolute; z-index:9999;" id="snFlkDiv' + x + '"><img src="' + pictureSrc + ' " height= " ' + pictureHeight + '" width="' + pictureWidth + '" alt="*"></div>');
//     }
// }
//
// let xcoords = [], ycoords = [], snFlkTemp;
// for (let x = 0; x < numFlakes; x++) {
//     xcoords[x] = (x + 1) / (numFlakes + 1);
//     do {
//         snFlkTemp = Math.round((numFlakes - 1) * Math.random());
//     } while (typeof (ycoords[snFlkTemp]) == 'number');
//     ycoords[snFlkTemp] = x / numFlakes;
// }
//
// function flakeFall() {
//     if (!getRefToDivNest('snFlkDiv0')) {
//         return;
//     }
//     let scrWidth = 0, scrHeight = 0, scrollHeight = 0, scrollWidth = 0;
//     if (typeof (window.innerWidth) == 'number') {
//         scrWidth = window.innerWidth;
//         scrHeight = window.innerHeight;
//     } else {
//         if (document.documentElement && (document.documentElement.clientWidth || document.documentElement.clientHeight)) {
//             scrWidth = document.documentElement.clientWidth;
//             scrHeight = document.documentElement.clientHeight;
//         } else {
//             if (document.body && (document.body.clientWidth || document.body.clientHeight)) {
//                 scrWidth = document.body.clientWidth;
//                 scrHeight = document.body.clientHeight;
//             }
//         }
//     }
//     if (typeof (window.pageYOffset) == 'number') {
//         scrollHeight = pageYOffset;
//         scrollWidth = pageXOffset;
//     } else {
//         if (document.body && (document.body.scrollLeft || document.body.scrollTop)) {
//             scrollHeight = document.body.scrollTop;
//             scrollWidth = document.body.scrollLeft;
//         } else {
//             if (document.documentElement && (document.documentElement.scrollLeft || document.documentElement.scrollTop)) {
//                 scrollHeight = document.documentElement.scrollTop;
//                 scrollWidth = document.documentElement.scrollLeft;
//             }
//         }
//     }
//     for (let x = 0; x < numFlakes; x++) {
//         if (ycoords[x] * scrHeight > scrHeight - pictureHeight) {
//             ycoords[x] = 0;
//         }
//         let divRef = getRefToDivNest('snFlkDiv' + x);
//         if (!divRef) {
//             return;
//         }
//         if (divRef.style) {
//             divRef = divRef.style;
//         }
//         let oPix = document.childNodes ? 'px' : 0;
//         divRef.top = (Math.round(ycoords[x] * 0.994 * scrHeight) + scrollHeight) + oPix;
//         divRef.left = (Math.round(((xcoords[x] * scrWidth) - (pictureWidth / 2)) + ((scrWidth / ((numFlakes + 1) * 4)) * (Math.sin(lrFlakes * ycoords[x]) - Math.sin(3 * lrFlakes * ycoords[x])))) + scrollWidth) + oPix;
//         ycoords[x] += downSpeed;
//     }
// }
//
// function getRefToDivNest(divName) {
//     if (document.layers) {
//         return document.layers[divName];
//     }
//     if (document[divName]) {
//         return document[divName];
//     }
//     if (document.getElementById) {
//         return document.getElementById(divName);
//     }
//     if (document.all) {
//         return document.all[divName];
//     }
//     return false;
// }
//
// window.setInterval('flakeFall();', 10);


/* Navigation menu onclick */
let MenuItems = document.getElementById("MenuItems");
MenuItems.style.maxHeight = "0px";

function menu() {
    if (MenuItems.style.maxHeight === "0px") {
        MenuItems.style.maxHeight = "200px";
    } else MenuItems.style.maxHeight = "0px";
}


let prevScrollpos = window.pageYOffset;
window.onscroll = function () {
    {
        scrollFunction()
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
        /* On top button */
        {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("myBtn").style.display = "block";
            } else {
                document.getElementById("myBtn").style.display = "none";
            }
        }
    }}


// When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;

    }

    $('#myBtn').click(function () {
        $('html,body').animate({scrollTop: 0})
    })
