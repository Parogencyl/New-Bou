<!DOCTYPE html>
<html lang="pl">

<head>
    <title>New Bou | Informacje</title>
    <link rel="shortcut icon" href="{{ asset('public/graphics/icons8-sneakers-64.png')}}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('public/css/structure.css')}}" rel="stylesheet">
    <link href="{{ asset('public/css/informacje/about.css')}}" rel="stylesheet">

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
        <div class="container text-center">
            <h2 class="mt-5 mb-3"> <i class="fas fa-minus text-danger"></i> INFORMACJE O NEW BOU <i class="fas fa-minus text-danger"></i> </h2>
            <p> Nasz sklep <b>New Bou</b> istnieje na rynku od 2017 roku. W naszej ofercie znajdują się buty tylko i wyłącznie dla osób dorosłych. Nasze obuwie charakteryzuje się wysokiej jakości wykonaniem oraz materiałem wykorzystanym do jego stworzenia.
                Doskonale zdajemy sobie sprawę z tego, jak buty są ważne dla każdego z nas, więc oferujemy to, co najlepsze specjalnie dla Was.
            </p>
            <p>U nas na pewno znajdziesz to czego szukasz. Dzięki prostemu procesowi dokonywania zakupów szybko i wygodnie zamówisz swoje produkty. Dzięki możliwości darmowego zwrotu nie musisz obawiać się o źle dobrany rozmiar, ponieważ bezproblemowo zamienimy na inne.
            </p>
            <p> Słyniemy nie tylko z wysokiej klasy obuwia, ale także z podejścia do klienta. Do każdego podchodzimy indywidualnie, ponieważ przede wszystkim zależy nam na zadowoleniu Klientów.
            </p>

            <h2 class="mt-5 mb-3 "> bohun.vot.pl/newbou </h2>
            <h3 class="mb-3"> Damian Bohonos</h3>
            <h5 class="text-secondary"> Email: newbou@bohun.vot.pl </h5>
        </div>
    </section>

    <!-- Footer -->
    <footer class="pt-4 pb-4 mt-5">
        @include('footer')
    </footer>

</body>


</html>