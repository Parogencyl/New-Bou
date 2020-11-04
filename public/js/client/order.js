document.getElementById("buy").addEventListener("mouseover", function () {
    if (
        document.getElementById("name").innerHTML != "" &&
        document.getElementById("email").innerHTML != "" &&
        document.getElementById("tel").innerHTML != "" &&
        document.getElementById("address") != null &&
        document.querySelector("input[name='pay']:checked")
    ) {
        document.getElementById("buy").disable = false;
    } else {
        document.getElementById("buy").disable = true;
        alert(
            "Należy wypełnić wszystkie informacje oraz wybrać sposób płatności."
        );
    }
});
