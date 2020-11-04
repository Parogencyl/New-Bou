// Podanie nowego maila
document.getElementById("email").addEventListener("focusout", function() {
    var errorEmail = 0;
    let email = document.forms["addEmail"]["email"].value;

    if (email == "") {
        document.getElementById("emailValid").innerHTML = "Brak podanego emaila<br>";
        errorEmail = 1;
    } else {
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (!email.match(mailformat)) {
            document.getElementById("emailValid").innerHTML = "Błędny format emaila <br>";
            errorEmail = 1;
        }
    }
    if (errorEmail == 1) {
        document.getElementById("email").style.borderColor = "red";
        document.getElementById("emailValid").style.display = "block";
    } else {
        document.getElementById("email").style.borderColor = "black";
        document.getElementById("emailValid").style.display = "none";
        document.getElementById("emailValid").innerHTML = "";
        enableButton();
    }
});

// Sprawdzenie podania nowego maila
function enableButton() {
    if (document.forms["addEmail"]["email"].value != "") {
        document.getElementById("submit").disabled = false;
    } else {
        document.getElementById("submit").disabled = true;
    }
}

// Zmiana dla braku maila pomocniczego

if (document.getElementById("secondaryEmail").innerHTML == "" || document.getElementById("secondaryEmail").innerHTML == " ") {
    document.getElementById("addEmailBlock").style.display = "block";
    document.getElementById("secondaryEmail").style.display = "none";
    document.getElementById("buttons").style.display = "none";
} else {
    document.getElementById("addEmailBlock").style.display = "none";
    document.getElementById("secondaryEmail").style.display = "block";
    document.getElementById("buttons").style.display = "block";
}


///////           Zmiana maila

function changeEmail() {
    document.getElementById("changingForm").style.display = "block";
    document.getElementsByTagName("input")[1].placeholder = "mojemail@poczta.pl";
    document.querySelector("#fieldOne legend").innerHTML = "Email";
    document.getElementById("fieldOne").style.display = "block";
    document.getElementById("valid1").style.display = "none";

    document.getElementById("changingForm").style.top = ((window.innerHeight / 2) - 120) + "px";

    let errorName = 0;

    // Email
    document.getElementById("emailChangeInput").addEventListener("focusout", function() {
        errorName = 0;
        let name = document.forms["changingForm"]["emailChangeInput"].value;

        if (name == "") {
            document.getElementById("valid1").innerHTML = "Brak podanego adresu email<br>";
            errorName = 1;
        } else {
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (!name.match(mailformat)) {
                document.getElementById("valid1").innerHTML = "Błędny format adresu email <br>";
                errorName = 1;
            }
        }
        if (errorName == 1) {
            document.getElementById("emailChangeInput").style.borderColor = "red";
            document.getElementById("valid1").style.display = "block";
        } else {
            document.getElementById("emailChangeInput").style.borderColor = "lightgray";
            document.getElementById("valid1").style.display = "none";
            document.getElementById("valid1").innerHTML = "";
            check1Input();
        }
    });
}

// Sprawdzenie czy dane są podane 
function check1Input() {
    if (document.forms["changingForm"]["emailChangeInput"].value != '') {
        document.getElementById("submit").disabled = false;
    } else {
        document.getElementById("submit").disabled = true;
    }
}