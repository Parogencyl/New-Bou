// otwieranie szczegółów zakupu
var countBlocks = document.getElementById("center").childElementCount;
for (let i = 0; i < countBlocks - 1; i++) {
    document.getElementsByClassName("infoBlock")[i].style.display = "none";
    document.getElementsByClassName("opinion")[i].style.display = "none";
}

function details(number) {
    if (
        document.getElementsByClassName("opinion")[number - 1].style.display ==
        "block"
    ) {
        rate(number);
    }
    if (
        document.getElementsByClassName("infoBlock")[number - 1].style
            .display == "block"
    ) {
        document.getElementsByClassName("blockData")[
            number - 1
        ].style.animationName = "";
        document.getElementsByClassName("blockData")[
            number - 1
        ].style.animationName = "close";
        $(".infoBlock")
            .eq(number - 1)
            .hide(600);
        setTimeout(() => {
            document.getElementsByClassName("blockData")[
                number - 1
            ].style.height = "210px";
        }, 600);
        document.getElementsByClassName("infoBlock")[number - 1].style.display =
            "none";
    } else {
        document.getElementsByClassName("blockData")[
            number - 1
        ].style.animationName = "";
        document.getElementsByClassName("blockData")[
            number - 1
        ].style.animationName = "open";
        $(".infoBlock")
            .eq(number - 1)
            .show(600);
        setTimeout(() => {
            document.getElementsByClassName("blockData")[
                number - 1
            ].style.height = "100%";
        }, 600);
        document.getElementsByClassName("infoBlock")[number - 1].style.display =
            "block";
    }
}

function rate(number) {
    if (
        document.getElementsByClassName("infoBlock")[number - 1].style
            .display == "block"
    ) {
        details(number);
    }
    if (
        document.getElementsByClassName("opinion")[number - 1].style.display ==
        "block"
    ) {
        document.getElementsByClassName("blockData")[
            number - 1
        ].style.animationName = "";
        document.getElementsByClassName("blockData")[
            number - 1
        ].style.animationName = "close2";
        $(".opinion")
            .eq(number - 1)
            .hide(600);
        setTimeout(() => {
            document.getElementsByClassName("blockData")[
                number - 1
            ].style.height = "210px";
        }, 600);
        document.getElementsByClassName("opinion")[number - 1].style.display =
            "none";
    } else {
        document.getElementsByClassName("blockData")[
            number - 1
        ].style.animationName = "";
        document.getElementsByClassName("blockData")[
            number - 1
        ].style.animationName = "open2";
        $(".opinion")
            .eq(number - 1)
            .show(600);
        setTimeout(() => {
            document.getElementsByClassName("blockData")[
                number - 1
            ].style.height = "100%";
        }, 600);
        document.getElementsByClassName("opinion")[number - 1].style.display =
            "block";
        addListener(number);
    }
}

// Dodanie opini o produkcie

function addListener(number) {
    number = number * 5 + 1;

    document
        .getElementsByTagName("i")
        [number].addEventListener("click", function () {
            document.getElementsByTagName("i")[number].className =
                "fas fa-star";
            document.getElementsByTagName("i")[number + 1].className =
                "far fa-star";
            document.getElementsByTagName("i")[number + 2].className =
                "far fa-star";
            document.getElementsByTagName("i")[number + 3].className =
                "far fa-star";
            document.getElementsByTagName("i")[number + 4].className =
                "far fa-star";
            var element = (number - 1) / 5;

            element = element * 3 - 2;

            document.getElementsByTagName("input")[element].value = 1;
        });

    document
        .getElementsByTagName("i")
        [number + 1].addEventListener("click", function () {
            document.getElementsByTagName("i")[number].className =
                "fas fa-star";
            document.getElementsByTagName("i")[number + 1].className =
                "fas fa-star";
            document.getElementsByTagName("i")[number + 2].className =
                "far fa-star";
            document.getElementsByTagName("i")[number + 3].className =
                "far fa-star";
            document.getElementsByTagName("i")[number + 4].className =
                "far fa-star";
            var element = (number - 1) / 5;
            element = element * 3 - 2;

            document.getElementsByTagName("input")[element].value = 2;
        });

    document
        .getElementsByTagName("i")
        [number + 2].addEventListener("click", function () {
            document.getElementsByTagName("i")[number].className =
                "fas fa-star";
            document.getElementsByTagName("i")[number + 1].className =
                "fas fa-star";
            document.getElementsByTagName("i")[number + 2].className =
                "fas fa-star";
            document.getElementsByTagName("i")[number + 3].className =
                "far fa-star";
            document.getElementsByTagName("i")[number + 4].className =
                "far fa-star";
            var element = (number - 1) / 5;
            element = element * 3 - 2;

            document.getElementsByTagName("input")[element].value = 3;
        });

    document
        .getElementsByTagName("i")
        [number + 3].addEventListener("click", function () {
            document.getElementsByTagName("i")[number].className =
                "fas fa-star";
            document.getElementsByTagName("i")[number + 1].className =
                "fas fa-star";
            document.getElementsByTagName("i")[number + 2].className =
                "fas fa-star";
            document.getElementsByTagName("i")[number + 3].className =
                "fas fa-star";
            document.getElementsByTagName("i")[number + 4].className =
                "far fa-star";
            var element = (number - 1) / 5;
            element = element * 3 - 2;

            document.getElementsByTagName("input")[element].value = 4;
        });

    document
        .getElementsByTagName("i")
        [number + 4].addEventListener("click", function () {
            document.getElementsByTagName("i")[number].className =
                "fas fa-star";
            document.getElementsByTagName("i")[number + 1].className =
                "fas fa-star";
            document.getElementsByTagName("i")[number + 2].className =
                "fas fa-star";
            document.getElementsByTagName("i")[number + 3].className =
                "fas fa-star";
            document.getElementsByTagName("i")[number + 4].className =
                "fas fa-star";
            var element = (number - 1) / 5;
            element = element * 3 - 2;

            document.getElementsByTagName("input")[element].value = 5;
        });
}

// Przenoszenie daty do nowej linii poniżej 576px szerokości
window.addEventListener("resize", function () {
    if (window.innerWidth < 576) {
        var br = document.getElementsByClassName("buyDate")[0].innerHTML;
        if (br.indexOf("<br>") == -1) {
            var number = document.getElementById("center").childElementCount;
            for (let i = 0; i < number - 1; i++) {
                var content = document.getElementsByClassName("buyDate")[i]
                    .innerHTML;
                document.getElementsByClassName("buyDate")[i].innerHTML =
                    "<br>" + content;
                document.getElementsByClassName("buyDate")[
                    i
                ].style.marginBottom = "20px";
            }
        }
    } else {
        var br = document.getElementsByClassName("buyDate")[0].innerHTML;
        if (br.indexOf("<br>") == 0) {
            var number = document.getElementById("center").childElementCount;
            for (let i = 0; i < number - 1; i++) {
                var content = document.getElementsByClassName("buyDate")[i]
                    .innerHTML;
                content = content.slice(4, content.length);
                document.getElementsByClassName("buyDate")[
                    i
                ].innerHTML = content;
            }
        }
    }
});
if (window.innerWidth < 576) {
    var number = document.getElementById("center").childElementCount;
    var br = document.getElementsByClassName("buyDate")[0].innerHTML;
    if (br.indexOf("<br>") == 0) {
        for (let i = 0; i < number - 1; i++) {
            var content = document.getElementsByClassName("buyDate")[i]
                .innerHTML;
            document.getElementsByClassName("buyDate")[i].innerHTML =
                "<br>" + content;
        }
    }
} else {
    var br = document.getElementsByClassName("buyDate")[0].innerHTML;
    if (br.indexOf("<br>") == 0) {
        var number = document.getElementById("center").childElementCount;
        for (let i = 0; i < number - 1; i++) {
            var content = document.getElementsByClassName("buyDate")[i]
                .innerHTML;
            content = content.slice(4, content.length);
            document.getElementsByClassName("buyDate")[i].innerHTML = content;
        }
    }
}
