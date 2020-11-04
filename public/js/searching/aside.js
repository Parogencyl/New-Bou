// Add icon to selected filter
function focusConfiguration(name) {
    var content = document.getElementById(name.id).innerHTML;
    var valueContent = content.search("<i class");
    if (valueContent == -1) {
        document.getElementById(name.id).innerHTML =
            content + "<i class='fas fa-check text-success '></i>";
        document.getElementById(name.id).style.color = "black";
    } else {
        var res = content.substring(0, valueContent);
        document.getElementById(name.id).innerHTML = res;
        document.getElementById(name.id).style.color = "rgb(110, 110, 110)";
    }
}

// Add icon to size
function focusConfigurationSize(name) {
    var content = document.getElementById(name.id).innerHTML;
    var valueContent = content.search("<i class");
    if (valueContent == -1) {
        for (let i = 0; i < 14; i++) {
            document.getElementById("size" + (34 + i)).innerHTML = 34 + i;
            document.getElementById("size" + (34 + i)).style.color =
                "rgb(110, 110, 110)";
        }
        document.getElementById(name.id).innerHTML =
            content + "<i class='fas fa-check text-success '></i>";
        document.getElementById(name.id).style.color = "black";
    } else {
        var res = content.substring(0, valueContent);
        document.getElementById(name.id).innerHTML = res;
        document.getElementById(name.id).style.color = "rgb(110, 110, 110)";
        for (let i = 0; i < 14; i++) {
            document.getElementById("size" + (34 + i)).innerHTML = 34 + i;
            document.getElementById("size" + (34 + i)).style.color =
                "rgb(110, 110, 110)";
        }
    }
}

// Add icon to type of shoes
function focusConfigurationType(name) {
    var classic = document.getElementById("Classic").innerHTML;
    var sport = document.getElementById("Sport").innerHTML;
    var winter = document.getElementById("Winter").innerHTML;
    var slippers = document.getElementById("Slippers").innerHTML;

    if (name == "Classic") {
        var valueContent = classic.search("<i class");
        if (valueContent == -1) {
            document.getElementById("Classic").innerHTML =
                classic + "<i class='fas fa-check text-success '></i>";
            document.getElementById("Classic").style.color = "black";
        } else {
            var res = classic.substring(0, valueContent);
            document.getElementById("Classic").innerHTML = res;
            document.getElementById("Classic").style.color =
                "rgb(110, 110, 110)";
        }
        document.getElementById("Sport").innerHTML = "Sportowe";
        document.getElementById("Slippers").innerHTML = "Klapki";
        document.getElementById("Winter").innerHTML = "Trampki";

        document.getElementById("Winter").style.color = "rgb(110, 110, 110)";
        document.getElementById("Sport").style.color = "rgb(110, 110, 110)";
        document.getElementById("Slippers").style.color = "rgb(110, 110, 110)";
    } else if (name == "Sport") {
        var valueContent = sport.search("<i class");
        if (valueContent == -1) {
            document.getElementById("Sport").innerHTML =
                sport + "<i class='fas fa-check text-success '></i>";
            document.getElementById("Sport").style.color = "black";
        } else {
            var res = sport.substring(0, valueContent);
            document.getElementById("Sport").innerHTML = res;
            document.getElementById("Sport").style.color = "rgb(110, 110, 110)";
        }
        document.getElementById("Classic").innerHTML = "Klasyczne";
        document.getElementById("Winter").innerHTML = "Trampki";
        document.getElementById("Slippers").innerHTML = "Klapki";

        document.getElementById("Classic").style.color = "rgb(110, 110, 110)";
        document.getElementById("Winter").style.color = "rgb(110, 110, 110)";
        document.getElementById("Slippers").style.color = "rgb(110, 110, 110)";
    } else if (name == "Winter") {
        var valueContent = winter.search("<i class");
        if (valueContent == -1) {
            document.getElementById("Winter").innerHTML =
                winter + "<i class='fas fa-check text-success '></i>";
            document.getElementById("Sport").style.color = "black";
        } else {
            var res = winter.substring(0, valueContent);
            document.getElementById("Winter").innerHTML = res;
            document.getElementById("Winter").style.color =
                "rgb(110, 110, 110)";
        }
        document.getElementById("Classic").innerHTML = "Klasyczne";
        document.getElementById("Sport").innerHTML = "Sportowe";
        document.getElementById("Slippers").innerHTML = "Klapki";

        document.getElementById("Classic").style.color = "rgb(110, 110, 110)";
        document.getElementById("Slippers").style.color = "rgb(110, 110, 110)";
        document.getElementById("Sport").style.color = "rgb(110, 110, 110)";
    } else {
        var valueContent = slippers.search("<i class");
        if (valueContent == -1) {
            document.getElementById("Slippers").innerHTML =
                slippers + "<i class='fas fa-check text-success '></i>";
            document.getElementById("Sport").style.color = "black";
        } else {
            var res = slippers.substring(0, valueContent);
            document.getElementById("Slippers").innerHTML = res;
            document.getElementById("Slippers").style.color =
                "rgb(110, 110, 110)";
        }
        document.getElementById("Classic").innerHTML = "Klasyczne";
        document.getElementById("Winter").innerHTML = "Trampki";
        document.getElementById("Sport").innerHTML = "Sportowe";

        document.getElementById("Classic").style.color = "rgb(110, 110, 110)";
        document.getElementById("Winter").style.color = "rgb(110, 110, 110)";
        document.getElementById("Sport").style.color = "rgb(110, 110, 110)";
    }
}

// Add icon to selected filter
function focusConfigurationSort(name) {
    var contentExp = document.getElementById("mostExpensive").innerHTML;
    var contentCheap = document.getElementById("mostCheapest").innerHTML;
    if (name == "exp") {
        var valueContent = contentExp.search("<i class");
        if (valueContent == -1) {
            document.getElementById("mostExpensive").innerHTML =
                contentExp + "<i class='fas fa-check text-success '></i>";
            document.getElementById("mostExpensive").style.color = "black";
        } else {
            var res = contentExp.substring(0, valueContent);
            document.getElementById("mostExpensive").innerHTML = res;
            document.getElementById("mostExpensive").style.color =
                "rgb(110, 110, 110)";
        }
        document.getElementById("mostCheapest").innerHTML = "Najtańsze";
    } else {
        var valueContent = contentCheap.search("<i class");
        if (valueContent == -1) {
            document.getElementById("mostCheapest").innerHTML =
                contentCheap + "<i class='fas fa-check text-success '></i>";
            document.getElementById("mostCheapest").style.color = "black";
        } else {
            var res = contentCheap.substring(0, valueContent);
            document.getElementById("mostCheapest").innerHTML = res;
            document.getElementById("mostCheapest").style.color =
                "rgb(110, 110, 110)";
        }
        document.getElementById("mostExpensive").innerHTML = "Najdroższe";
    }
}

// Set width for article element
document.getElementById("items").style.width = window.innerWidth - 580 + "px";
if (window.innerWidth < 1800) {
    document.getElementById("items").style.width =
        window.innerWidth - 600 + "px";
}
if (window.innerWidth < 1500) {
    document.getElementById("items").style.width =
        window.innerWidth - 520 + "px";
}
if (window.innerWidth < 1300) {
    document.getElementById("items").style.width =
        window.innerWidth - 500 + "px";
}
if (window.innerWidth < 1200) {
    document.getElementById("items").style.width =
        window.innerWidth - 330 + "px";
}
if (window.innerWidth < 992) {
    document.getElementById("items").style.width =
        window.innerWidth - 270 + "px";
}
if (window.innerWidth < 768) {
    document.getElementById("items").style.width =
        window.innerWidth - 250 + "px";
}
if (window.innerWidth < 720) {
    document.getElementById("items").style.width =
        window.innerWidth - 180 + "px";
}
if (window.innerWidth < 576) {
    document.getElementById("items").style.width =
        window.innerWidth - 20 + "px";
}

window.addEventListener("resize", function () {
    if (window.innerWidth < 1800) {
        document.getElementById("items").style.width =
            window.innerWidth - 600 + "px";
    }
    if (window.innerWidth < 1500) {
        document.getElementById("items").style.width =
            window.innerWidth - 520 + "px";
    }
    if (window.innerWidth < 1300) {
        document.getElementById("items").style.width =
            window.innerWidth - 500 + "px";
    }
    if (window.innerWidth < 1200) {
        document.getElementById("items").style.width =
            window.innerWidth - 330 + "px";
    }
    if (window.innerWidth < 992) {
        document.getElementById("items").style.width =
            window.innerWidth - 270 + "px";
    }
    if (window.innerWidth < 768) {
        document.getElementById("items").style.width =
            window.innerWidth - 250 + "px";
    }
    if (window.innerWidth < 720) {
        document.getElementById("items").style.width =
            window.innerWidth - 180 + "px";
    }
    if (window.innerWidth < 576) {
        document.getElementById("items").style.width =
            window.innerWidth - 20 + "px";
    }
});
