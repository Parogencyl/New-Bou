// Change main foto
function hover(name) {
    var source = document.getElementById(name.id).src;
    document.querySelector("#imageShow img").src = source;
}

// Set active size of boots
function activeSize(name) {
    size = document.getElementsByClassName("col-sm-2 col-2").length;
    for (let i = 0; i < size; i++) {
        if (
            document.getElementsByClassName("col-sm-2 col-2")[i].className ==
            "col-sm-2 col-2 active"
        ) {
            document
                .getElementsByClassName("col-sm-2 col-2")
                [i].classList.remove("active");
        }
    }

    if (
        document.getElementById(name.id).className != "col-sm-2 col-2 disable"
    ) {
        document.getElementById(name.id).classList.add("active");

        sizeShoes = document.getElementById(name.id).innerHTML;
        document.getElementById("inputSize").value = sizeShoes;
    }
}

//Opinions open
function opinionsOpen() {
    if (document.getElementById("opinions").style.display == "block") {
        document.getElementById("opinion").style.borderBottom =
            "1px solid rgb(136, 136, 136)";
        $("#opinions").hide("blind");
    } else {
        document.getElementById("opinion").style.borderBottom = "none";
        $("#opinions").show("blind");
    }
}
