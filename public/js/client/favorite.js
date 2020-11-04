function hover(name) {
    var classes = document.getElementsByClassName("blockData");
    for (var i = 0; i < classes.length; i++) {
        name.id = "getImg";
        var elem = document.getElementsByClassName("blockData")[i].innerHTML;
        var pos = elem.indexOf("getImg");
        if (pos != -1) {
            document.getElementsByClassName("blockData")[i].id = "modified";
            document.querySelector("#modified .imageShow img").src = name.src;
            document.getElementsByClassName("blockData")[i].removeAttribute("id");
            name.removeAttribute("id");
            break;
        } else {
            name.removeAttribute("id");
        }
    }
}

if (document.getElementsByClassName("blockData")[0] == undefined || document.getElementsByClassName("blockData")[0] == null) {
    document.getElementById("empty").style.display = "block";
} else {
    document.getElementById("empty").style.display = "none";
}