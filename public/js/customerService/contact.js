// Otwieranie i zamykanie pytań
for (let i = 1; i < 9; i++) {
    $("#answer" + i).hide();
}

function openAnswer(id) {
    if (document.getElementById(id).style.display == "block") {
        $("#" + id).hide("blind");
    } else {
        $("#" + id).show("blind");
        document.getElementById(id).style.display = "block";
    }
}

// Walidcja formularzu
let errorTopic = 1;
let errorName = 1;
let errorSurname = 1;
let errorEmail = 1;
let errorContent = 1;

// Temat
document.getElementById("topic").addEventListener("focusout", function () {
    errorTopic = 0;
    let topic = document.forms["questionFrom"]["topic"].value;

    if (topic == "") {
        document.getElementById("topicValid").innerHTML =
            "Brak podanego tematu<br>";
        errorTopic = 1;
    } else {
        if (topic.length <= 10) {
            document.getElementById("topicValid").innerHTML =
                "Zbyt krótka treść tematu (min. 10 znaków)<br>";
            errorTopic = 1;
        }
        if (topic.length >= 120) {
            document.getElementById("topicValid").innerHTML =
                "Zbyt długa treść tematu (max. 120 znaków)<br>";
            errorTopic = 1;
        }
    }
    if (errorTopic == 1) {
        document.getElementById("topic").style.borderColor = "red";
        document.getElementById("topicValid").style.display = "block";
    } else {
        document.getElementById("topic").style.borderColor = "lightgray";
        document.getElementById("topicValid").style.display = "none";
        document.getElementById("topicValid").innerHTML = "";
        document.forms["questionFrom"]["topic"].value =
            topic[0].toUpperCase() + topic.slice(1, topic.length);
    }
});

// Imie
document.getElementById("name").addEventListener("focusout", function () {
    errorName = 0;
    let name = document.forms["questionFrom"]["name"].value;

    if (name == "") {
        document.getElementById("nameValid").innerHTML =
            "Brak podanego imienia<br>";
        errorName = 1;
    } else {
        if (name.length <= 2) {
            document.getElementById("nameValid").innerHTML =
                "Podaj prawdziwe imię<br>";
            errorName = 1;
        }
        if (name.length >= 25) {
            document.getElementById("nameValid").innerHTML =
                "Podaj prawdziwe imię<br>";
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
        document.forms["questionFrom"]["name"].value =
            name[0].toUpperCase() + name.slice(1, name.length);
    }
});

// Nazwisko
document.getElementById("surname").addEventListener("focusout", function () {
    errorSurname = 0;
    let surname = document.forms["questionFrom"]["surname"].value;

    if (surname == "") {
        document.getElementById("surnameValid").innerHTML =
            "Brak podanego nazwiska<br>";
        errorSurname = 1;
    } else {
        if (surname.length <= 2) {
            document.getElementById("surnameValid").innerHTML =
                "Podaj prawdziwe nazwisko<br>";
            errorSurname = 1;
        }
        if (surname.length >= 40) {
            document.getElementById("surnameValid").innerHTML =
                "Maksymalnie 40 znaków<br>";
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
        document.forms["questionFrom"]["surname"].value =
            surname[0].toUpperCase() + surname.slice(1, surname.length);
    }
});

// Email
document.getElementById("email").addEventListener("focusout", function () {
    errorEmail = 0;
    let email = document.forms["questionFrom"]["email"].value;

    if (email == "") {
        document.getElementById("emailValid").innerHTML =
            "Brak podanego emaila<br>";
        errorEmail = 1;
    } else {
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (!email.match(mailformat)) {
            document.getElementById("emailValid").innerHTML =
                "Błędny format maila <br>";
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
    }
});

// Treść wiadomości
document.getElementById("content").addEventListener("focusout", function () {
    errorContent = 0;
    let content = document.forms["questionFrom"]["content"].value;

    if (content == "") {
        document.getElementById("contentValid").innerHTML =
            "Brak podanego tematu<br>";
        errorContent = 1;
    } else {
        if (content.length <= 10) {
            document.getElementById("contentValid").innerHTML =
                "Zbyt krótka treść wiadomości (min. 20 znaków)<br>";
            errorContent = 1;
        }
        if (content.length >= 250) {
            document.getElementById("contentValid").innerHTML =
                "Zbyt długa treść tematu (max. 120 znaków)<br>";
            errorContent = 1;
        }
    }
    if (errorContent == 1) {
        document.getElementById("content").style.borderColor = "red";
        document.getElementById("contentValid").style.display = "block";
    } else {
        document.getElementById("content").style.borderColor = "lightgray";
        document.getElementById("contentValid").style.display = "none";
        document.getElementById("contentValid").innerHTML = "";
        document.forms["questionFrom"]["content"].value =
            content[0].toUpperCase() + content.slice(1, content.length);
    }
});
