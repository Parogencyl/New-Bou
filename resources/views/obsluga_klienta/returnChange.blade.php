<!DOCTYPE html>
<html lang="pl">

<head>
    <title>New Bou | Obsługa klienta</title>
    <link rel="shortcut icon" href="{{ asset('public/graphics/icons8-sneakers-64.png')}}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('public/css/structure.css')}}" rel="stylesheet">
    <link href="{{ asset('public/css/obsluga/returnChange.css')}}" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <!-- First menu -->
    <nav id="navbar1" class="text-right row pt-2">
        @include('nav1')
    </nav>

    <!-- Second menu -->
    <nav id="navbar2" class="text-center row bg-light text-center">
        @include('nav2')
    </nav>

    <section>
        <div class="container ">
            <h2 class="mt-5 mb-3 text-center"> <i class="fas fa-minus text-danger"></i> Zwroty / Reklamacje / Wymiana <i class="fas fa-minus text-danger"></i> </h2>

            <h4 class="mb-5 mt-5 text-center"> Zwrot </h4>
            <p> Otrzymany towar możesz zwrócić bez podania przyczyny w ciągu 14 dni od otrzymania przesyłki. Zwracany towar nie może posiadać żadnych śladów użytkowania, dlatego należy zachować ostrożnoś podczas przymierzania obuwia. Rezygnacji możesz dokonać
                z całości zamówienia lub z jego części. W przypadku odstąpienia od umowy zwracamy Państwu wszystkie otrzymane od Państwa płatności, w tym koszty dostarczenia (jeśli takie się pojawiły). Przy zwrocie tylko części zamówienia koszty dostarczenia
                zwracamy proporcjonalnie do ilości zwracanych towarów (zwracana jest wartość obuwia odesłanego, jeśli towar nie jest uszkodzony). Pieniądze za zakupiony towar zwrócimy Ci najszybciej jak to możliwe (w ciągu 5 dni roboczych, licząc
                od dnia odebrania przesyłki). Należność za zwrócone towary wpłacimy na Twój rachunek bankowy lub na kartę płatniczą (zależnie od sposobu płatności).</p>
            <p> Aby dokonać zwrotu należy zalogować się, wejść w historię zakupów i przy zwracanym towarze wybrać opcję "Zwrot towaru". Następnie zostanie pobrany odpowiedni dokument, który należy wypełnić i dołączyć do zwracanego towaru.</p>
            <p class="text-danger mt-4 mb-4 text-center">
                <a href="#" class="text-danger text-decoration-none"> <i class="far fa-file-pdf"></i> </a>
            </p>

            <p> <span class="font-weight-bold"> Dane do wysyłki: </span>
                <br> New Bou
                <br> ul. obuwnicza 2
                <br> 65-123 Zielona Góra
            </p>
            <p> <span class="font-weight-bold">Uwaga!!</span> Towar zwracany za pobraniem nie zostanie przez nas odebrany! </p>

            <h4 class="mb-5 mt-5 text-center"> Wymiana </h4>
            <p> Aby wymienić towar wystarczy odesłać zakupione obuwie na podany poniżej adres i złożyć zamówienie na nowy produkt. Do odsyłanego towaru należy dołączyć wypełniony poniższy plik.</p>
            <p class="text-danger mt-4 mb-4 text-center">
                <a href="#" class="text-danger text-decoration-none"> <i class="far fa-file-pdf"></i> </a>
            </p>
            <p> <span class="font-weight-bold"> Dane do wysyłki: </span>
                <br> New Bou
                <br> ul. obuwnicza 2
                <br> 65-123 Zielona Góra
            </p>
            <p> By towar został przyjęty przez nas zawartość paczki musi być kompletna (zwracany produkt oraz wypełniony dokument o zwrocie towaru). Obuwie nie może nosić śladów użytkowania.</p>
            <p> <span class="font-weight-bold">Uwaga!!</span> Nie odbieramy towaru wysłanego za pobraniem! </p>
            <h4 class="mb-5 mt-5 text-center"> Reklamacja </h4>

            <p> Reklamację można zgłosić, gdy otrzymany towar nie jest kompletny, jest wadliwy lub uszkodzony. Raklamacji można także dokonać, gdy obuwie w czasie użytkowania uszkodzi się nie z winy użytkownika.
            </p>
            <p> Aby dokonać reklamacji należy pobrać odpowiedni dokument znajdujący się poniżej. Należy go wypełnić i dołączyć do reklamowanego produktu.</p>

            <p class="text-danger mt-4 mb-4 text-center">
                <a href="#" class="text-danger text-decoration-none"> <i class="far fa-file-pdf"></i> </a>
            </p>
            <p> <span class="font-weight-bold"> Towar należy odesłać pod adres: </span>
                <br> New Bou
                <br> ul. obuwnicza 2
                <br> 65-123 Zielona Góra
            </p>
            <p> Po przesłaniu obuwia na reklamację rozpatrzymy ją w ciągu 5 dni roboczych i poinformujemy Cię o jej wyniku. Jeśli reklamacja nie zostanie rozpatrzona pozytywnie buty zostaną odesłane z powrotem na adres nadawcy. Natomiast, gdy obuwie zostanie
                objęte reklamacją zostaną podjęte odpowiednie czynności zeleżnie od twojego wyboru (naprawa uszkodzonego obuwia / wymiana na nowe obuwie / zwrot pieniędzy). </p>
            <p> Reklamacja nie obejmuje:
                <br> - wad widocznych nie stwierdzonych od razu po otrzymaniu obuwia,
                <br> - naturalnego zużycia obuwia,
                <br> - zapachu pochodzącego z obuwia,
                <br> - wad oraz uszkodzeń powstałych podczas czyszczenia lub prania obuwia,
                <br> - przetartego lub startego spodu obuwia,
                <br> - uszkodzeń mechanicznych takich jak: przetarć, zadrapań, rys czy obić.
            </p>
    </section>

    <!-- Footer -->
    <footer class="pt-4 pb-4 mt-5">
        @include('footer')
    </footer>

</body>


</html>