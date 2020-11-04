/*

//Dostosowanie wysokość do rodzaju wyświetlania formularza 

*/

function changeName() {
    document.getElementById("changingForm").style.display = "block";
    document.querySelector("#fieldOne legend").innerHTML = "Imię";
    document.querySelector("#fieldTwo legend").innerHTML = "Nazwisko";
    document.getElementsByTagName("input")[1].placeholder = "Adam";
    document.getElementsByTagName("input")[2].placeholder = "Nowacki";
    document.getElementById("fieldOne").style.display = "block";
    document.getElementById("fieldTwo").style.display = "block";
    document.getElementById("fieldThree").style.display = "none";
    document.getElementById("fieldFour").style.display = "none";
    document.getElementById("valid1").style.display = "none";
    document.getElementById("valid2").style.display = "none";
    document.getElementById("valid3").style.display = "none";
    document.getElementById("valid4").style.display = "none";
    document.getElementById("nameInput").setAttribute("name", "name");

    document.getElementById("changingForm").style.top =
        window.innerHeight / 2 - 150 + "px";

    let errorName = 0;
    let errorSurname = 0;

    // Imie
    document
        .getElementById("nameInput")
        .addEventListener("focusout", function () {
            errorName = 0;
            let name = document.forms["changingForm"]["nameInput"].value;

            if (name == "") {
                document.getElementById("valid1").innerHTML =
                    "Brak podanego imienia<br>";
                errorName = 1;
            } else {
                if (name.length <= 2) {
                    document.getElementById("valid1").innerHTML =
                        "Podaj prawdziwe imię<br>";
                    errorName = 1;
                }
                if (name.length >= 25) {
                    document.getElementById("valid1").innerHTML =
                        "Podaj prawdziwe imię<br>";
                    errorName = 1;
                }
            }
            if (errorName == 1) {
                document.getElementById("nameInput").style.borderColor = "red";
                document.getElementById("valid1").style.display = "block";
            } else {
                document.getElementById("nameInput").style.borderColor =
                    "lightgray";
                document.getElementById("valid1").style.display = "none";
                document.getElementById("valid1").innerHTML = "";
                document.forms["changingForm"]["nameInput"].value =
                    name[0].toUpperCase() + name.slice(1, name.length);
                check2Inputs();
            }
        });

    // Nazwisko
    document
        .getElementById("surname")
        .addEventListener("focusout", function () {
            errorSurname = 0;
            let surname = document.forms["changingForm"]["surname"].value;

            if (surname == "") {
                document.getElementById("valid2").innerHTML =
                    "Brak podanego nazwiska<br>";
                errorSurname = 1;
            } else {
                if (surname.length <= 2) {
                    document.getElementById("valid2").innerHTML =
                        "Podaj prawdziwe nazwisko<br>";
                    errorSurname = 1;
                }
                if (surname.length >= 40) {
                    document.getElementById("valid2").innerHTML =
                        "Maksymalnie 40 znaków<br>";
                    errorSurname = 1;
                }
            }
            if (errorSurname == 1) {
                document.getElementById("surname").style.borderColor = "red";
                document.getElementById("valid2").style.display = "block";
            } else {
                document.getElementById("surname").style.borderColor =
                    "lightgray";
                document.getElementById("valid2").style.display = "none";
                document.getElementById("valid2").innerHTML = "";
                document.forms["changingForm"]["surname"].value =
                    surname[0].toUpperCase() + surname.slice(1, surname.length);
                check2Inputs();
            }
        });
}

function changeEmail() {
    document.getElementById("changingForm").style.display = "block";
    document.getElementsByTagName("input")[1].placeholder =
        "mojemail@poczta.pl";
    document.querySelector("#fieldOne legend").innerHTML = "Email";
    document.getElementById("fieldOne").style.display = "block";
    document.getElementById("fieldTwo").style.display = "none";
    document.getElementById("fieldThree").style.display = "none";
    document.getElementById("fieldFour").style.display = "none";
    document.getElementById("valid1").style.display = "none";
    document.getElementById("valid2").style.display = "none";
    document.getElementById("valid3").style.display = "none";
    document.getElementById("valid4").style.display = "none";
    document.getElementById("nameInput").setAttribute("name", "email");

    document.getElementById("changingForm").style.top =
        window.innerHeight / 2 - 110 + "px";

    let errorName = 0;

    // Email
    document
        .getElementById("nameInput")
        .addEventListener("focusout", function () {
            errorName = 0;
            let name = document.forms["changingForm"]["nameInput"].value;

            if (name == "") {
                document.getElementById("valid1").innerHTML =
                    "Brak podanego adresu email<br>";
                errorName = 1;
            } else {
                var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                if (!name.match(mailformat)) {
                    document.getElementById("valid1").innerHTML =
                        "Błędny format adresu email <br>";
                    errorName = 1;
                }
            }
            if (errorName == 1) {
                document.getElementById("namnameInpute").style.borderColor =
                    "red";
                document.getElementById("valid1").style.display = "block";
            } else {
                document.getElementById("nameInput").style.borderColor =
                    "lightgray";
                document.getElementById("valid1").style.display = "none";
                document.getElementById("valid1").innerHTML = "";
                check1Input();
            }
        });
}

function changeTel() {
    document.getElementById("changingForm").style.display = "block";
    document.querySelector("#fieldOne legend").innerHTML = "Telefon";
    document.getElementsByTagName("input")[1].placeholder = "777 666 888";
    document.getElementById("fieldOne").style.display = "block";
    document.getElementById("fieldTwo").style.display = "none";
    document.getElementById("fieldThree").style.display = "none";
    document.getElementById("fieldFour").style.display = "none";
    document.getElementById("valid1").style.display = "none";
    document.getElementById("valid2").style.display = "none";
    document.getElementById("valid3").style.display = "none";
    document.getElementById("valid4").style.display = "none";
    document.getElementById("nameInput").setAttribute("name", "phone");

    document.getElementById("changingForm").style.top =
        window.innerHeight / 2 - 110 + "px";

    let errorName = 0;

    // Numer
    document
        .getElementById("nameInput")
        .addEventListener("focusout", function () {
            errorName = 0;
            let name = document.forms["changingForm"]["nameInput"].value;

            if (name == "") {
                document.getElementById("valid1").innerHTML =
                    "Brak podanego numeru telefonu<br>";
                errorName = 1;
            } else {
                if (name.length == 9) {
                    var telFormat = /[0-9]{3}[0-9]{3}[0-9]{3}/g;
                    if (!name.match(telFormat)) {
                        document.getElementById("valid1").innerHTML =
                            "Numer może zawierać tylko liczby <br>Format: 777 666 888 lub 777888666 <br>";
                        errorName = 1;
                    }
                } else {
                    if (name.length == 11) {
                        var telFormat = /[0-9]{3}[\s][0-9]{3}[\s][0-9]{3}/g;
                        if (!name.match(telFormat)) {
                            document.getElementById("valid1").innerHTML =
                                "Numer może zawierać tylko liczby <br>Format: 777 666 888 lub 777888666 <br>";
                            errorName = 1;
                        }
                    } else {
                        document.getElementById("valid1").innerHTML =
                            "Numer musi składać z 9 liczb <br>";
                        errorName = 1;
                    }
                }
            }
            if (errorName == 1) {
                document.getElementById("nameInput").style.borderColor = "red";
                document.getElementById("valid1").style.display = "block";
            } else {
                document.getElementById("nameInput").style.borderColor =
                    "lightgray";
                document.getElementById("valid1").style.display = "none";
                document.getElementById("valid1").innerHTML = "";
                check1Input();
            }
        });
}

function additionalAddress() {
    document
        .getElementById("nameInput")
        .setAttribute("name", "additionalAddress");
}

function changeAddress() {
    document.getElementById("changingForm").style.display = "block";
    document.getElementById("fieldTwo").style.display = "block";
    document.querySelector("#fieldOne legend").innerHTML = "Adres zamieszkania";
    document.querySelector("#fieldTwo legend").innerHTML = "Kod pocztowy";
    document.getElementById("fieldThree").style.display = "block";
    document.getElementById("fieldFour").style.display = "block";
    document.getElementsByTagName("input")[1].placeholder = "Robotników 10b";
    document.getElementsByTagName("input")[2].placeholder = "50-001 Wrocław";
    document.getElementsByTagName("input")[3].placeholder = "Dolny Śląsk";
    document.getElementsByTagName("input")[4].placeholder = "Polska";
    document.getElementById("valid1").style.display = "none";
    document.getElementById("valid2").style.display = "none";
    document.getElementById("valid3").style.display = "none";
    document.getElementById("valid4").style.display = "none";
    document.getElementById("nameInput").setAttribute("name", "address");

    document.getElementById("changingForm").style.top =
        window.innerHeight / 2 - 230 + "px";

    let errorName = 0;
    let errorSurname = 0;
    let errorProvince = 0;
    let errorCountry = 0;

    // Adres zamieszkania
    document
        .getElementById("nameInput")
        .addEventListener("focusout", function () {
            errorName = 0;
            let name = document.forms["changingForm"]["nameInput"].value;
            if (name == "") {
                document.getElementById("valid1").innerHTML =
                    "Brak podanego adresu zamieszkania<br>";
                errorName = 1;
            } else {
                if (name.length <= 5) {
                    document.getElementById("valid1").innerHTML =
                        "Niepoprawny adres zamieszkania<br>";
                    errorName = 1;
                }
            }
            if (errorName == 1) {
                document.getElementById("nameInput").style.borderColor = "red";
                document.getElementById("valid1").style.display = "block";
            } else {
                document.getElementById("nameInput").style.borderColor =
                    "lightgray";
                document.getElementById("valid1").style.display = "none";
                document.getElementById("valid1").innerHTML = "";
                document.forms["changingForm"]["nameInput"].value =
                    name[0].toUpperCase() + name.slice(1, name.length);
                check2Inputs();
            }
        });

    // Kod pocztowy
    document
        .getElementById("surname")
        .addEventListener("focusout", function () {
            errorSurname = 0;
            let surname = document.forms["changingForm"]["surname"].value;

            if (surname == "") {
                document.getElementById("valid2").innerHTML =
                    "Brak podanego kodu pocztowego oraz miasta<br>";
                errorSurname = 1;
            } else {
                if (surname.length <= 9) {
                    document.getElementById("valid2").innerHTML =
                        "Należy podać kod pocztowy oraz nazwę miasta np '50-001 Wrocław' <br>";
                    errorSurname = 1;
                }
            }
            if (errorSurname == 1) {
                document.getElementById("surname").style.borderColor = "red";
                document.getElementById("valid2").style.display = "block";
            } else {
                document.getElementById("surname").style.borderColor =
                    "lightgray";
                document.getElementById("valid2").style.display = "none";
                document.getElementById("valid2").innerHTML = "";
                if (surname[0] >= "0" && surname[0] <= "9") {
                    var text =
                        surname.slice(0, 7) +
                        surname[7].toUpperCase() +
                        surname.slice(8, surname.length);
                    document.forms["changingForm"]["surname"].value = text;
                } else {
                    var text =
                        surname[0].toUpperCase() +
                        surname.slice(1, surname.length);
                    document.forms["changingForm"]["surname"].value = text;
                }
                check4Inputs();
            }
        });

    // Województwo
    document
        .getElementById("province")
        .addEventListener("focusout", function () {
            errorProvince = 0;
            let province = document.forms["changingForm"]["province"].value;

            if (province == "") {
                document.getElementById("valid3").innerHTML =
                    "Brak podanego województwa<br>";
                errorProvince = 1;
            } else {
                if (province.length <= 4) {
                    document.getElementById("valid3").innerHTML =
                        "Należy podać prawidłową nazwę województwa <br>";
                    errorProvince = 1;
                }
                if (province.length >= 30) {
                    document.getElementById("valid3").innerHTML =
                        "Należy podać prawidłową nazwę województwa <br>";
                    errorProvince = 1;
                }
            }
            if (errorProvince == 1) {
                document.getElementById("province").style.borderColor = "red";
                document.getElementById("valid3").style.display = "block";
            } else {
                document.getElementById("province").style.borderColor =
                    "lightgray";
                document.getElementById("valid3").style.display = "none";
                document.getElementById("valid3").innerHTML = "";
                document.forms["changingForm"]["province"].value =
                    province[0].toUpperCase() +
                    province.slice(1, province.length);
                check3Radio();
            }
        });

    // Kraj
    document
        .getElementById("country")
        .addEventListener("focusout", function () {
            errorCountry = 0;
            let country = document.forms["changingForm"]["country"].value;

            if (country == "") {
                document.getElementById("valid4").innerHTML =
                    "Podaj nazwy kraju <br>";
                errorCountry = 1;
            } else {
                if (country.length <= 4) {
                    document.getElementById("valid4").innerHTML =
                        "Należy podać prawidłową nazwę kraju <br>";
                    errorCountry = 1;
                }
                if (country.length >= 30) {
                    document.getElementById("valid4").innerHTML =
                        "Należy podać prawidłową nazwę kraju <br>";
                    errorCountry = 1;
                }
            }
            if (errorCountry == 1) {
                document.getElementById("country").style.borderColor = "red";
                document.getElementById("valid4").style.display = "block";
            } else {
                document.getElementById("country").style.borderColor =
                    "lightgray";
                document.getElementById("valid4").style.display = "none";
                document.getElementById("valid4").innerHTML = "";
                document.forms["changingForm"]["country"].value =
                    country[0].toUpperCase() + country.slice(1, country.length);
                check4Inputs();
            }
        });
}

// Sprawdzenie czy dane są podane
function check1Input() {
    if (document.forms["changingForm"]["nameInput"].value != "") {
        document.getElementById("submit").disabled = false;
    } else {
        document.getElementById("submit").disabled = true;
    }
}

function check2Inputs() {
    if (
        document.forms["changingForm"]["nameInput"].value != "" &&
        document.forms["changingForm"]["surname"].value != ""
    ) {
        document.getElementById("submit").disabled = false;
    } else {
        document.getElementById("submit").disabled = true;
    }
}

function check4Inputs() {
    if (
        document.forms["changingForm"]["nameInput"].value != "" &&
        document.forms["changingForm"]["surname"].value != "" &&
        document.forms["changingForm"]["province"].value != "" &&
        document.forms["changingForm"]["country"].value != ""
    ) {
        document.getElementById("submit").disabled = false;
    } else {
        document.getElementById("submit").disabled = true;
    }
}

// Placeholder na stronie Zamówienie

function changeNameOrder() {
    document.getElementsByTagName("input")[6].placeholder = "Adam";
    document.getElementsByTagName("input")[7].placeholder = "Nowacki";
}

function changeEmailOrder() {
    document.getElementsByTagName("input")[6].placeholder =
        "mojemail@poczta.pl";
}

function changeTelOrder() {
    document.getElementsByTagName("input")[6].placeholder = "777 666 888";
}
function changeAddressOrder() {
    document.getElementsByTagName("input")[6].placeholder = "Robotników 10b";
    document.getElementsByTagName("input")[7].placeholder = "50-001 Wrocław";
    document.getElementsByTagName("input")[8].placeholder = "Dolny Śląsk";
    document.getElementsByTagName("input")[9].placeholder = "Polska";
}
