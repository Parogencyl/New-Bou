function change(name) {
    var classes = document.getElementsByClassName("blockData");
    for (var i = 0; i < classes.length; i++) {
        name.id = "changing";
        var elem = document.getElementsByClassName("blockData")[i].innerHTML;
        var pos = elem.indexOf("changing");
        if (pos != -1) {
            document.getElementsByClassName("blockData")[i].id = "modified";
            if (
                document.getElementsByClassName("mod")[i].innerHTML ==
                'Zmień rozmiar <i class="fas fa-exchange-alt"></i>'
            ) {
                document.getElementsByClassName("mod")[i].innerHTML =
                    'Zapisz <i class="fas fa-exchange-alt"></i>';

                document
                    .getElementsByClassName("mod")
                    [i].setAttribute("type", "button");

                document.getElementsByClassName("inputSize")[i].style.display =
                    "block";
                var sizeNumber = document.getElementsByClassName("size")[i]
                    .innerHTML;
                document.getElementsByClassName("inputSize")[
                    i
                ].value = sizeNumber;
                document
                    .getElementsByClassName("inputSize")
                    [i].addEventListener("change", changingLook.bind(null, i));
            } else {
                document.getElementsByClassName("mod")[i].innerHTML =
                    'Zmień rozmiar <i class="fas fa-exchange-alt"></i>';

                document
                    .getElementsByClassName("mod")
                    [i].setAttribute("type", "submit");

                document.getElementsByClassName("inputSize")[i].style.display =
                    "none";
                document.getElementsByClassName("size")[
                    i
                ].textContent = document.getElementsByClassName("inputSize")[
                    i
                ].value;
                document
                    .getElementsByClassName("inputSize")
                    [i].removeEventListener(
                        "change",
                        changingLook.bind(null, i)
                    );
            }
            document
                .getElementsByClassName("blockData")
                [i].removeAttribute("id");
            name.removeAttribute("id");
            break;
        } else {
            name.removeAttribute("id");
        }
    }
}

function changingLook(number) {
    var tag = document.getElementsByClassName("inputSize")[number];
    var min = 34;
    var max = 47;
    if (tag.value < min || tag.value > max) {
        document.getElementsByClassName("mod")[number].disabled = true;
    } else {
        document.getElementsByClassName("mod")[number].disabled = false;
    }
}
