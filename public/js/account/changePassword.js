// Hasło
document
    .getElementById("currentPassword")
    .addEventListener("focusout", function () {
        var errorPassword = 0;
        let password =
            document.forms["changePassword"]["currentPassword"].value;

        if (password == "") {
            document.getElementById("valid1").innerHTML =
                "Brak podanego hasła<br>";
            errorPassword = 1;
        }
        if (errorPassword == 1) {
            document.getElementById("currentPassword").style.borderColor =
                "red";
            document.getElementById("valid1").style.display = "block";
        } else {
            document.getElementById("currentPassword").style.borderColor =
                "black";
            document.getElementById("valid1").style.display = "none";
            document.getElementById("valid1").innerHTML = "";
            button();
        }
    });

// Nowe hasło
document
    .getElementById("newPassword")
    .addEventListener("focusout", function () {
        var errorPassword = 0;
        let password = document.forms["changePassword"]["newPassword"].value;

        if (password == "") {
            document.getElementById("valid2").innerHTML =
                "Brak podanego hasła<br>";
            errorPassword = 1;
        } else {
            if (password.length < 8) {
                document.getElementById("valid2").innerHTML =
                    "Co najmniej 8 znaków <br>";
                errorPassword = 1;
            }
            if (password.length > 25) {
                document.getElementById("valid2").innerHTML =
                    "Maksymalnie 25 znaków <br>";
                errorPassword = 1;
            }
            if (password.match(/[A-Z]/g) == null) {
                document.getElementById("valid2").innerHTML =
                    "Hasło musi posiadać: małą literę, dużą literę, liczbę <br>";
                errorPassword = 1;
            } else if (password.match(/[a-z]/g) == null) {
                document.getElementById("valid2").innerHTML =
                    "Hasło musi posiadać: małą literę, dużą literę, liczbę <br>";
                errorPassword = 1;
            } else if (password.match(/[0-9]/g) == null) {
                document.getElementById("valid2").innerHTML =
                    "Hasło musi posiadać: małą literę, dużą literę, liczbę <br>";
                errorPassword = 1;
            }
        }
        if (errorPassword == 1) {
            document.getElementById("newPassword").style.borderColor = "red";
            document.getElementById("valid2").style.display = "block";
        } else {
            document.getElementById("newPassword").style.borderColor = "black";
            document.getElementById("valid2").style.display = "none";
            document.getElementById("valid2").innerHTML = "";
            button();

            // Sprawdzenie czy wcześniej nie zostało wpisane Powtórzenie hasła i usunięcie jego błędu
            let repeatPassword =
                document.forms["changePassword"]["repeatPassword"].value;
            if (repeatPassword != "") {
                var errorRepeatPassword = 0;
                if (password != repeatPassword) {
                    document.getElementById("valid3").innerHTML =
                        "Błędne hasło<br>";
                    errorRepeatPassword = 1;
                }
                if (errorRepeatPassword == 1) {
                    document.getElementById(
                        "repeatPassword"
                    ).style.borderColor = "red";
                    document.getElementById("valid3").style.display = "block";
                } else {
                    document.getElementById(
                        "repeatPassword"
                    ).style.borderColor = "black";
                    document.getElementById("valid3").style.display = "none";
                    document.getElementById("valid3").innerHTML = "";
                    button();
                }
            }
        }
    });

// Powtórzenie hasła
document
    .getElementById("repeatPassword")
    .addEventListener("focusout", function () {
        var errorRepeatPassword = 0;
        let repeatPassword =
            document.forms["changePassword"]["repeatPassword"].value;

        if (repeatPassword == "") {
            document.getElementById("valid3").innerHTML =
                "Brak podanego hasła<br>";
            errorRepeatPassword = 1;
        } else {
            let password =
                document.forms["changePassword"]["newPassword"].value;
            if (password != "") {
                if (password != repeatPassword) {
                    document.getElementById("valid3").innerHTML =
                        "Błędne hasło<br>";
                    errorRepeatPassword = 1;
                }
            }
        }
        if (errorRepeatPassword == 1) {
            document.getElementById("repeatPassword").style.borderColor = "red";
            document.getElementById("valid3").style.display = "block";
        } else {
            document.getElementById("repeatPassword").style.borderColor =
                "black";
            document.getElementById("valid3").style.display = "none";
            document.getElementById("valid3").innerHTML = "";
            button();
        }
    });

function button() {
    if (
        document.forms["changePassword"]["repeatPassword"].value != "" &&
        document.forms["changePassword"]["newPassword"].value != "" &&
        document.forms["changePassword"]["currentPassword"].value != ""
    ) {
        document.getElementById("submit").disabled = false;
    } else {
        document.getElementById("submit").disabled = true;
    }
}
