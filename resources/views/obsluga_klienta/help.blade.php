<!DOCTYPE html>
<html lang="pl">

<head>
    <title>New Bou | Obsługa klienta</title>
    <link rel="shortcut icon" href="{{ asset('public/graphics/icons8-sneakers-64.png')}}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('public/css/structure.css')}}" rel="stylesheet">
    <link href="{{ asset('public/css/obsluga/help.css')}}" rel="stylesheet">

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
        <div>
            <h2 class="mt-5 mb-3 text-center"> <i class="fas fa-minus text-danger"></i> Uzyskaj pomoc <i class="fas fa-minus text-danger"></i> </h2>
            <p style="text-align: justify;"> Drogi Kliencie, <br>tutaj znajdziesz najczęściej zadawane pytania i odpowiedzi na nie. Posługując się poniższym formulatrzem może zadać własne pytanie odnoście produktu, zamówienia oraz innego rodzaju pytania. Postaramy się odpowiedzieć na
                każde zadane pytanie w jak najszybszym czasie. Mamy nadzięję, że w uda nam się odpowiedzieć na Twoje pytanie oraz rozwiać wszelkie wątpliwości.</p>
            <div id="leftSide">
                <h5 class="text-center mb-4 font-weight-bold"> Najczęściej zadawane pytania</h5>

                <!-- Po dodaniu pytania trzeba zwiększyć ilość ukrytych elementów -->
                <div class="question">
                    <p class="questionTitle" onclick="openAnswer('answer1')">- Ile kosztuje przesyłka?</p>
                    <p class="answerText" id="answer1"> Wysyłka towaru przez naszą firmę jest darmowa. Jedynym kosztem po Państwa stronie samo obuwie :). W przypadku zwrotu, wymiany bądź reklamacji towar jest odsyłany przez Państwa na własny koszt. </p>
                </div>

                <div class="question">
                    <p class="questionTitle" onclick="openAnswer('answer2')">- Ile czasu trwa dostawa?</p>
                    <p class="answerText" id="answer2"> Towar wysyłany jest w 24 godziny od potwierdzenia płaty środków za obuwię zakupione przez Państwa. Sam czas dostawy to około 1-2 dni robocze. </p>
                </div>

                <div class="question">
                    <p class="questionTitle" onclick="openAnswer('answer3')">- Czy możliwa jest wysyłka za gnicę Polski?</p>
                    <p class="answerText" id="answer3"> Takie zamówienia także realizujemy, natomiast w takim przypadku koszt przesyłki opłacany jest przez Państwa podczas odbioru. Koszt oraz czas dostawy zależy od odległości kraju docelowego od Polski. </p>
                </div>

                <div class="question">
                    <p class="questionTitle" onclick="openAnswer('answer4')">- Jak dokonać zwrotu obuwia?</p>
                    <p class="answerText" id="answer4"> Aby dokonać zwrotu obuwia należy pobrać dokument z zakładki <i> 'Zwrot / Wymiana / Reklamacja' </i> odpowiadający zwrotowi produktu. Następnie dokument należy wypełnić oraz dołączyć do odsyłanego produktu. Dane do wysyłki znajdują
                        się obok pobieranego pliku. </p>
                </div>

                <div class="question">
                    <p class="questionTitle" onclick="openAnswer('answer5')">- Jak dokonać wymiany obuwia?</p>
                    <p class="answerText" id="answer5"> Aby dokonać wymiany obuwia należy pobrać dokument z zakładki <i> 'Zwrot / Wymiana / Reklamacja' </i> odpowiadający wymianie produktu. Następnie dokument należy wypełnić oraz dołączyć do odsyłanego produktu. Dane do wysyłki znajdują
                        się obok pobieranego pliku. </p>
                </div>

                <div class="question">
                    <p class="questionTitle" onclick="openAnswer('answer6')">- Kiedy będzie dostępny rozmiar obuwia?</p>
                    <p class="answerText" id="answer6"> Gdy rozmiar wybranego przez Państwa obuwia aktualnie nie jest dostępny można wysłać zapytanie w tej sprawie wypełniając formularz kontaktowy. W wiadomości należy podać model obuwia oraz rozmiar, który Państwa interesuje. My postaramy
                        się odpowiedzeń jak naszybiej będzie to możliwe. </p>
                </div>

                <div class="question">
                    <p class="questionTitle" onclick="openAnswer('answer7')">- Dokument sprzadaży?</p>
                    <p class="answerText" id="answer7"> W opakowaniu zamówionego obuwia znajdą Państwo paragon wystawiony przez firmę New Bou potwierdzjący państwa zakup. </p>
                </div>

                <div class="question">
                    <p class="questionTitle" onclick="openAnswer('answer8')">- Jak zarejestrować się na stronie New Bou?</p>
                    <p class="answerText" id="answer8"> Przechodząc do zakładki <i> 'Moje konto' </i>, na samym dole znajduje się odnośnik do strony rejestracyjnej użytkowników. Należy wypełnić wszystkie pola, a następnie powierdzić adres Email. </p>
                </div>

            </div>
            <div id="rightSide">

                <form method="POST" action="" id="questionFrom">
                    <h4 class="text-center mb-3 mt-0 pt-0 font-weight-bold"> Zadaj nam pytanie </h4>

                    <div class="form-group">
                        <label for="topic">Temat:</label>
                        <input type="text" class="form-control" placeholder="Temat wiadomości" id="topic" name="topic" required>
                        <div class="valid" id="topicValid"></div>
                    </div>

                    <div class="form-group">
                        <label for="name">Imię:</label>
                        <input type="text" class="form-control" placeholder="Podaj imię" id="name" name="name" required>
                        <div class="valid" id="nameValid"></div>
                    </div>

                    <div class="form-group">
                        <label for="surname">Nazwisko:</label>
                        <input type="text" class="form-control" placeholder="Podaj nazwisko" id="surname" name="surname" required>
                        <div class="valid" id="surnameValid"></div>
                    </div>

                    <div class="form-group">
                        <label for="email">Adres email:</label>
                        <input type="email" class="form-control" placeholder="Podaj email" id="email" name="email" required>
                        <div class="valid" id="emailValid"></div>
                    </div>

                    <div class="form-group">
                        <label for="content">Treść wiadomości:</label>
                        <textarea class="form-control" placeholder="Opowiedz o problemie" id="content" name="content" required></textarea>
                        <div class="valid" id="contentValid"></div>
                    </div>

                    <button type="submit" class="btn btn-danger" id="log" disabled> Wyślij </button>
                </form>
            </div>

    </section>

    <!-- Footer -->
    <footer class="pt-4 pb-4 mt-5">
        @include('footer')
    </footer>

</body>

<script src="{{ asset('public/js/customerService/contact.js')}}"></script>


</html>