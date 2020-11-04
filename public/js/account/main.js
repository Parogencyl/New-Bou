function openAccount() {
    var disp = document.getElementById("accountDrop").style.display;
    if (disp == "block") {
        $('#accountDrop').hide('blind');
        document.getElementById("iOne").style.transform = "rotate(0deg)";
        document.getElementById("iOne").style.transitionDuration = "0.5s";
    } else {
        $('#accountDrop').show('blind');
        document.getElementById("iOne").style.transform = "rotate(180deg)";
        document.getElementById("iOne").style.transitionDuration = "0.5s";
    }
}

function openShopping() {
    var disp = document.getElementById("shoppingDrop").style.display;
    if (disp == "block") {
        $('#shoppingDrop').hide('blind');
        document.getElementById("iTwo").style.transform = "rotate(0deg)";
        document.getElementById("iTwo").style.transitionDuration = "0.5s";
    } else {
        $('#shoppingDrop').show('blind');
        document.getElementById("iTwo").style.transform = "rotate(180deg)";
        document.getElementById("iTwo").style.transitionDuration = "0.5s";
    }
}

function openSecurity() {
    var disp = document.getElementById("securityDrop").style.display;
    if (disp == "block") {
        $('#securityDrop').hide('blind');
        document.getElementById("iThree").style.transform = "rotate(0deg)";
        document.getElementById("iThree").style.transitionDuration = "0.5s";
    } else {
        $('#securityDrop').show('blind');
        document.getElementById("iThree").style.transform = "rotate(180deg)";
        document.getElementById("iThree").style.transitionDuration = "0.5s";
    }
}