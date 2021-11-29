var searchButton = document.getElementById('search-b');
var searchContent = document.getElementById('search-content');

function show() {
    if (searchContent.style.display === 'none') {
        searchContent.style.display = 'block';
        searchButton.classList.replace('fa-plus', 'fa-minus');
    } else {
        searchContent.style.display = 'none';
        searchButton.classList.replace('fa-minus', 'fa-plus');
    }
}

function sort(sortBy) {
    let i;
    let items = document.getElementsByClassName("product");

    // getElementsByClassName returns object. make it a array to use sort function
    let itemsArr = [];
    for (i in items) {
        if (items[i].nodeType === 1) { // consider elements only
            itemsArr.push(items[i]);
        }
    }

    itemsArr = itemsArr.filter(function (e) {
        return e
    });

    let sorted = itemsArr.sort(function (a, b) {
        a = a.getElementsByClassName(sortBy)[0].innerHTML;
        b = b.getElementsByClassName(sortBy)[0].innerHTML;

        //decide whether need number sort or string sort
        if (isNaN(a) || isNaN(b))
            return a.localeCompare(b);
        else
            return a - b;
    });
    if (document.getElementById('sort').value === 'item-price' || document.getElementById('sort').value === 'item-name') {
        for (i = 0; i < sorted.length; ++i) {
            document.getElementById("products-list").appendChild(sorted[i]);
        }
    } else {
        for (i = sorted.length - 1; i >= 0; --i) {
            document.getElementById("products-list").appendChild(sorted[i]);
        }
    }
}
