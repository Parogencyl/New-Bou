<!DOCTYPE html>
<html lang="pl">

<head>
    <title>New Bou | Informacje</title>
    <link rel="shortcut icon" href="{{ asset('public/graphics/icons8-sneakers-64.png')}}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('public/css/structure.css')}}" rel="stylesheet">
    <link href="{{ asset('public/css/informacje/privacyPolicy.css')}}" rel="stylesheet">

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
            <h2 class="mt-5 mb-3 text-center"> <i class="fas fa-minus text-danger"></i> Polityka prywatności <i class="fas fa-minus text-danger"></i> </h2>
            <h4 class="mb-4 text-center"> Polityka prywatności sklepu internetowego New Bou</h4>

            <p> Szanowny Kliencie, chcielibyśmy poinformować Cię, że korzystanie ze sklepu internetowego www.bohun.vot.pl/newbou wymaga przetwarzania Twoich danych osobowych przez serwis. W związku z tym Administrator na podstawie Twoich danych będzie wykonywał
                odpowiednie zadania oraz usługi, z których Ty korzystasz na naszym serwerze. Przetwarzane dane wykorzystywane są przez Administratorów w celu ułatwienia Ci korzystania z Naszego serwisu internetowego.
            </p>
            <p> Wszelkie czynności związane z przetwarzaniem danych osobowych przez Administratora zgodne są z obowiązującymi przepisami ustalonymi przez Parlament Europejski i Rady Uni Europejskiej 2016/679 z dnia 27 kwietnia 2016 roku w sprawie ochrony
                osób fizycznych w związku z przetwarzaniem danych osobowych i w sprawie swobodnego przepływu takich danych oraz uchylenia dyrektywy 95/46/WE (ogólne rozporządzenie o ochronie danych).
            </p>
            <p> Zapewniamy, iż wszystkie dane gromadzone przez serwis New Bou są tylko i wyłącznie w celu dokonywania Twoich zakupów oraz dopasowania ofert do Twoich potrzeb.
            </p>
            <p> Dane osobowe gromadzone przez New Bou:
                <br> 1. Dane osobowe zgromadzone z usług oraz zgód wyrażonych przez Ciebie.
                <br> 2. Dane osobowe niezbędne do dokonania zakupu oraz wcześniejszej rejestracji:
                <br> - dane osobowe zamawiającego takie jak: imię, nazwisko, adres zamieszkania, numer telefonu, adres email;
                <br> - dane osobowe odbiorcy (w przypadku, gdy odbiorca nie jest osobą zamawiającą) takie jak: imię, nazwisko, adres zamieszkania, numer telefonu, adres email;
                <br> - login wraz z hasłem użytkownika serwisu;
                <br> 3. Dane firmy oraz NIP w przypadku, gdy zakup dokonywany jest w ramach prowadzonej działalności.
                <br> 4. Inne dane gromadzone za pośrednictwem plików Cookies.
            </p>
            <p> Klient ma prawo zażądać dostępu do swoich danych osobowych w celu ich analizy, usunięcia, bądź ograniczenia dostępu do nich. Klient może także zakać dalszego przetwarzania danych osobowych.</p>

            <p class="text-body"> Kontakt
                <br> Email: newbou@bohun.vot.pl
            </p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="pt-4 pb-4 mt-5">
        @include('footer')
    </footer>

</body>


</html>