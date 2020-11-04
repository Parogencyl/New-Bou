// Walidacja formularza

let errorName = 0;
let errorSurname = 0;
let errorPassword = 0;
let errorRepeatPassword = 0;
let errorEmail = 0;
let errorTelefon = 0;
let errorDay = 0;
let errorMonth = 0;
let errorYear = 0;
let errorDate = 0;

// Imie
document.getElementById("name").addEventListener("focusout", function() {
    errorName = 0;
    let name = document.forms["registrationForm"]["name"].value;

    if (name == "") {
        document.getElementById("nameValid").innerHTML = "Brak podanego imienia<br>";
        errorName = 1;
    } else {
        if (name.length <= 2) {
            document.getElementById("nameValid").innerHTML = "Podaj prawdziwe imię<br>";
            errorName = 1;
        }
        if (name.length >= 25) {
            document.getElementById("nameValid").innerHTML = "Podaj prawdziwe imię<br>";
            errorName = 1;
        }
    }
    if (errorName == 1) {
        document.getElementById("name").style.borderColor = "red";
        document.getElementById("nameValid").style.display = "block";
    } else {
        document.getElementById("name").style.borderColor = "lightgray";
        document.getElementById("nameValid").style.display = "none";
        document.getElementById("nameValid").innerHTML = "";
        document.forms["registrationForm"]["name"].value = name[0].toUpperCase() + name.slice(1, name.length);
        enableButton();
    }
});

// Nazwisko
document.getElementById("surname").addEventListener("focusout", function() {
    errorSurname = 0;
    let surname = document.forms["registrationForm"]["surname"].value;

    if (surname == "") {
        document.getElementById("surnameValid").innerHTML = "Brak podanego nazwiska<br>";
        errorSurname = 1;
    } else {
        if (surname.length <= 2) {
            document.getElementById("surnameValid").innerHTML = "Podaj prawdziwe nazwisko<br>";
            errorSurname = 1;
        }
        if (surname.length >= 40) {
            document.getElementById("surnameValid").innerHTML = "Maksymalnie 40 znaków<br>";
            errorSurname = 1;
        }
    }
    if (errorSurname == 1) {
        document.getElementById("surname").style.borderColor = "red";
        document.getElementById("surnameValid").style.display = "block";
    } else {
        document.getElementById("surname").style.borderColor = "lightgray";
        document.getElementById("surnameValid").style.display = "none";
        document.getElementById("surnameValid").innerHTML = "";
        document.forms["registrationForm"]["surname"].value = surname[0].toUpperCase() + surname.slice(1, surname.length);
        enableButton();
    }
});

// Email
document.getElementById("email").addEventListener("focusout", function() {
    errorEmail = 0;
    let email = document.forms["registrationForm"]["email"].value;

    if (email == "") {
        document.getElementById("emailValid").innerHTML = "Brak podanego emaila<br>";
        errorEmail = 1;
    } else {
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (!email.match(mailformat)) {
            document.getElementById("emailValid").innerHTML = "Błędny format maila <br>";
            errorEmail = 1;
        }
    }
    if (errorEmail == 1) {
        document.getElementById("email").style.borderColor = "red";
        document.getElementById("emailValid").style.display = "block";
    } else {
        document.getElementById("email").style.borderColor = "lightgray";
        document.getElementById("emailValid").style.display = "none";
        document.getElementById("emailValid").innerHTML = "";
        enableButton();
    }
});

// Hasło
document.getElementById("password").addEventListener("focusout", function() {
    errorPassword = 0;
    let password = document.forms["registrationForm"]["password"].value;

    if (password == "") {
        document.getElementById("passwordValid").innerHTML = "Brak podanego hasła<br>";
        errorPassword = 1;
    } else {
        if (password.length < 8) {
            document.getElementById("passwordValid").innerHTML = "Co najmniej 8 znaków <br>";
            errorPassword = 1;
        }
        if (password.length > 25) {
            document.getElementById("passwordValid").innerHTML = "Maksymalnie 25 znaków <br>";
            errorPassword = 1;
        }
        if ((password.match(/[A-Z]/g)) == null) {
            document.getElementById("passwordValid").innerHTML = "Hasło musi posiadać: małą literę, dużą literę, liczbę <br>";
            errorPassword = 1;
        } else if ((password.match(/[a-z]/g)) == null) {
            document.getElementById("passwordValid").innerHTML = "Hasło musi posiadać: małą literę, dużą literę, liczbę <br>";
            errorPassword = 1;
        } else if ((password.match(/[0-9]/g)) == null) {
            document.getElementById("passwordValid").innerHTML = "Hasło musi posiadać: małą literę, dużą literę, liczbę <br>";
            errorPassword = 1;
        }
    }
    if (errorPassword == 1) {
        document.getElementById("password").style.borderColor = "red";
        document.getElementById("passwordValid").style.display = "block";
    } else {
        document.getElementById("password").style.borderColor = "lightgray";
        document.getElementById("passwordValid").style.display = "none";
        document.getElementById("passwordValid").innerHTML = "";
        enableButton();

        // Sprawdzenie czy wcześniej nie zostało wpisane Powtórzenie hasła i usunięcie jego błędu
        if (errorRepeatPassword == 1) {
            let repeatPassword = document.forms["registrationForm"]["repeatPassword"].value;
            errorRepeatPassword = 0;
            if (password != repeatPassword) {
                document.getElementById("repeatPasswordValid").innerHTML = "Błędne hasło<br>";
                errorRepeatPassword = 1;
            }
            if (errorRepeatPassword == 1) {
                document.getElementById("repeatPassword").style.borderColor = "red";
                document.getElementById("repeatPasswordValid").style.display = "block";
            } else {
                document.getElementById("repeatPassword").style.borderColor = "lightgray";
                document.getElementById("repeatPasswordValid").style.display = "none";
                document.getElementById("repeatPasswordValid").innerHTML = "";
                enableButton();
            }
        }
    }
});

// Powtórzenie hasła
document.getElementById("repeatPassword").addEventListener("focusout", function() {
    errorRepeatPassword = 0;
    let repeatPassword = document.forms["registrationForm"]["repeatPassword"].value;

    if (repeatPassword == "") {
        document.getElementById("repeatPasswordValid").innerHTML = "Brak podanego hasła<br>";
        errorRepeatPassword = 1;
    } else {
        let password = document.forms["registrationForm"]["password"].value;
        if (password != repeatPassword) {
            document.getElementById("repeatPasswordValid").innerHTML = "Błędne hasło<br>";
            errorRepeatPassword = 1;
        }
    }
    if (errorRepeatPassword == 1) {
        document.getElementById("repeatPassword").style.borderColor = "red";
        document.getElementById("repeatPasswordValid").style.display = "block";
    } else {
        document.getElementById("repeatPassword").style.borderColor = "lightgray";
        document.getElementById("repeatPasswordValid").style.display = "none";
        document.getElementById("repeatPasswordValid").innerHTML = "";
        enableButton();
    }
});

// Numer telefonu
document.getElementById("tel").addEventListener("focusout", function() {
    errorTelefon = 0;
    let tel = document.forms["registrationForm"]["tel"].value;

    if (repeatPassword == "") {
        document.getElementById("telefonValid").innerHTML = "Brak podanego numeru telefonu<br>";
        errorTelefon = 1;
    } else {
        if (tel.length != 9) {
            document.getElementById("telefonValid").innerHTML = "Numer powinien posiadać 9 cyfr<br>";
            errorTelefon = 1;
        }
    }
    if (errorTelefon == 1) {
        document.getElementById("tel").style.borderColor = "red";
        document.getElementById("telefonValid").style.display = "block";
    } else {
        document.getElementById("tel").style.borderColor = "lightgray";
        document.getElementById("telefonValid").style.display = "none";
        document.getElementById("telefonValid").innerHTML = "";
        enableButton();
    }
});

// Miesiące
let allMonths = ["January", "Febuary", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];


// Dzień urodzenia
document.getElementById("day").addEventListener("focusout", function() {
    errorDay = 0;
    let day = document.forms["registrationForm"]["day"].value;
    let year = document.forms["registrationForm"]["year"].value;
    let month = document.getElementById("month").value;

    // Sprawdzenie pełnoletności
    if (month != "" && day != "" && year != "") {
        var date = new Date();
        var milisec = date.getTime();
        year = Number(year) + 18;
        date.setFullYear(year, allMonths.indexOf(month), day);
        var dateMili = date.getTime();
        if (dateMili > milisec) {
            document.getElementById("dateValid").style.display = "block";
            document.getElementById("dateValid").innerHTML = "<br>Nie jesteś osobą pełnoletnią.<br>";
            errorDate = 1;
        } else {
            document.getElementById("dateValid").innerHTML = "";
            document.getElementById("dateValid").style.display = "none";
            errorDate = 0;
        }
    }

    if (day == "") {
        document.getElementById("dayValid").innerHTML = "Brak podanego dnia urodzenia<br>";
        errorDay = 1;
    } else {
        if (day < 1 || day > 31) {
            document.getElementById("dayValid").innerHTML = "Liczba powinna być z przedziału 1-31<br>";
            errorDay = 1;
        } else {
            // Sprawdzenie dni w lutym
            if (year != "" && year > 1900) {
                if (month == "Febuary") {
                    if (year % 4 == 0) {
                        if (day > 29) {
                            document.getElementById("dayValid").innerHTML = "Luty ma 29 dni<br>";
                            errorDay = 1;
                        }
                    } else {
                        if (day > 28) {
                            document.getElementById("dayValid").innerHTML = "Luty ma 28 dni<br>";
                            errorDay = 1;
                        }
                    }
                }
            }
        }
    }
    if (errorDay == 1) {
        document.getElementById("day").style.borderColor = "red";
        document.getElementById("dayValid").style.display = "block";
    } else {
        document.getElementById("day").style.borderColor = "lightgray";
        document.getElementById("dayValid").style.display = "none";
        document.getElementById("dayValid").innerHTML = "";
        enableButton();
    }

});

// Miesiąc urodzenia
document.getElementById("month").addEventListener("focusout", function() {
    errorMonth = 0;
    let month = document.getElementById("month").value;
    let day = document.forms["registrationForm"]["day"].value;
    let year = document.forms["registrationForm"]["year"].value;

    // Sprawdzenie pełnoletności
    if (month != "" && day != "" && year != "") {
        var date = new Date();
        var milisec = date.getTime();
        year = Number(year) + 18;
        date.setFullYear(year, allMonths.indexOf(month), day);
        var dateMili = date.getTime();
        if (dateMili > milisec) {
            document.getElementById("dateValid").style.display = "block";
            document.getElementById("dateValid").innerHTML = "<br>Nie jesteś osobą pełnoletnią.<br>";
            errorDate = 1;
        } else {
            document.getElementById("dateValid").innerHTML = "";
            document.getElementById("dateValid").style.display = "none";
            errorDate = 0;
        }
    }
    if (month == "") {
        document.getElementById("monthValid").innerHTML = "Nie wybrano miesiąca urodzenia<br>";
        errorMonth = 1;
    } else {
        if (year != "" && year > 1900) {
            errorDay = 0;
            if (month == "Febuary") {
                if (year % 4 == 0) {
                    if (day > 29) {
                        document.getElementById("dayValid").innerHTML = "Luty ma 29 dni<br>";
                        errorDay = 1;
                    }
                } else {
                    if (day > 28) {
                        document.getElementById("dayValid").innerHTML = "Luty ma 28 dni<br>";
                        errorDay = 1;
                    }
                }
            }
            if (errorDay == 1) {
                document.getElementById("day").style.borderColor = "red";
                document.getElementById("dayValid").style.display = "block";
            } else {
                document.getElementById("day").style.borderColor = "lightgray";
                document.getElementById("dayValid").style.display = "none";
                document.getElementById("dayValid").innerHTML = "";
            }
        }
    }
    if (errorMonth == 1) {
        document.getElementById("month").style.borderColor = "red";
        document.getElementById("monthValid").style.display = "block";
    } else {
        document.getElementById("month").style.borderColor = "lightgray";
        document.getElementById("monthValid").style.display = "none";
        document.getElementById("monthValid").innerHTML = "";
        enableButton();
    }

});


// Rok urodzenia
document.getElementById("year").addEventListener("focusout", function() {
    errorYear = 0;
    let year = document.forms["registrationForm"]["year"].value;
    let day = document.forms["registrationForm"]["day"].value;
    let month = document.getElementById("month").value;


    // Sprawdzenie pełnoletności
    if (month != "" && day != "" && year != "") {
        var date = new Date();
        var milisec = date.getTime();
        year = Number(year) + 18;
        date.setFullYear(year, allMonths.indexOf(month), day);
        var dateMili = date.getTime();
        if (dateMili > milisec) {
            document.getElementById("dateValid").style.display = "block";
            document.getElementById("dateValid").innerHTML = "<br>Nie jesteś osobą pełnoletnią.<br>";
            errorDate = 1;
        } else {
            document.getElementById("dateValid").innerHTML = "";
            document.getElementById("dateValid").style.display = "none";
            errorDate = 0;
        }
    }
    if (year == "") {
        document.getElementById("yearValid").innerHTML = "Nie podano roku urodzenia<br>";
        errorYear = 1;
    } else {
        if (year != "" && year > 1900) {
            errorDay = 0;
            if (month == "Febuary") {
                if (year % 4 == 0) {
                    if (day > 29) {
                        document.getElementById("dayValid").innerHTML = "Luty ma 29 dni<br>";
                        errorDay = 1;
                    }
                } else {
                    if (day > 28) {
                        document.getElementById("dayValid").innerHTML = "Luty ma 28 dni<br>";
                        errorDay = 1;
                    }
                }
            }
            if (errorDay == 1) {
                document.getElementById("day").style.borderColor = "red";
                document.getElementById("dayValid").style.display = "block";
            } else {
                document.getElementById("day").style.borderColor = "lightgray";
                document.getElementById("dayValid").style.display = "none";
                document.getElementById("dayValid").innerHTML = "";
            }
        }
    }
    if (errorYear == 1) {
        document.getElementById("year").style.borderColor = "red";
        document.getElementById("yearValid").style.display = "block";
    } else {
        document.getElementById("year").style.borderColor = "lightgray";
        document.getElementById("yearValid").style.display = "none";
        document.getElementById("yearValid").innerHTML = "";
        enableButton();
    }
});

function enableButton() {
    if (document.forms["registrationForm"]["password"].value == '' || document.forms["registrationForm"]["name"].value == '' ||
        document.forms["registrationForm"]["surname"].value == '' || document.forms["registrationForm"]["email"].value == '' ||
        document.forms["registrationForm"]["repeatPassword"].value == '' || document.forms["registrationForm"]["tel"].value == '' ||
        document.forms["registrationForm"]["day"].value == '' || document.getElementById("month").value == '' ||
        document.forms["registrationForm"]["year"].value == '' || errorDate == 1) {
        document.getElementById("log").disabled = true;
    } else {
        document.getElementById("log").disabled = false;
    }
}