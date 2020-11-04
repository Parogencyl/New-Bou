<!DOCTYPE html>
<html lang="pl">

<head>
    <title>New Bou | Rejestracja</title>
    <link rel="shortcut icon" href="{{ asset('public/graphics/icons8-sneakers-64.png') }}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('public/css/structure.css')}}" rel="stylesheet">
    <link href="{{ asset('public/css/client/registration.css')}}" rel="stylesheet">

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

    <!-- registration -->
    <section>
        <div class="container">
            <form method="POST" action="{{URL::to('/register')}}" id="registrationForm">
                {{ csrf_field() }}
                <h1 class="text-center mb-3 mt-0 pt-0"> Rejestracja </h1>

                <div class="form-group">
                    <label for="name">Imię:</label>
                    <input type="text" class="form-control" placeholder="Jan" id="name" name="name" required>
                    <div class="valid" id="nameValid"></div>
                </div>

                <div class="form-group">
                    <label for="surname">Nazwisko:</label>
                    <input type="text" class="form-control" placeholder="Kowalski" id="surname" name="surname" required>
                    <div class="valid" id="surnameValid"></div>
                </div>

                <div class="form-group">
                    <label for="email">Adres email:</label>
                    <input type="email" class="form-control" placeholder="jakowalski@email.pl" id="email" name="email" required>
                    <div class="valid" id="emailValid"></div>
                </div>

                <div class="form-group">
                    <label for="password"> Hasło: </label>
                    <input type="password" class="form-control" placeholder="Podaj hasło" id="password" name="password" required>
                    <div class="valid" id="passwordValid"></div>
                </div>

                <div class="form-group">
                    <label for="repeatPassword"> Powtórz hasło: </label>
                    <input type="password" class="form-control" placeholder="Powtórz hasło" id="repeatPassword" name="repeatPassword" required>
                    <div class="valid" id="repeatPasswordValid"></div>
                </div>

                <div class="form-group">
                    <label for="tel">Numer telefonu komórkowego:</label>
                    <input type="number" class="form-control" placeholder="777854125" id="tel" name="tel" required>
                    <div class="valid" id="telefonValid"></div>
                </div>

                <div class="form-group">
                    <label>Data urodzenia:</label>
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <input type="number" min="1" max="31" class="form-control" placeholder="Dzień" id="day" name="day" required>
                            <div class="valid" id="dayValid"></div>
                        </div>

                        <div class="col-12 col-md-4">
                            <select class="custom-select" id="month" name="month">
                                <option value="" disabled selected hidden class="text-secondary"> Miesiąc </option>
                                <option value="01">Styczeń</option>
                                <option value="02">Luty</option>
                                <option value="03">Marzec</option>
                                <option value="04">Kwiecień</option>
                                <option value="05">Maj</option>
                                <option value="06">Czerwiec</option>
                                <option value="07">Lipiec</option>
                                <option value="08">Sierpień</option>
                                <option value="09">Wrzesień</option>
                                <option value="10">Październik</option>
                                <option value="11">Listopad</option>
                                <option value="12">Grudzień</option>
                            </select>
                            <div class="valid" id="monthValid"></div>
                        </div>

                        <div class="col-12 col-md-4">
                            <input type="number" min="1900" class="form-control" placeholder="Rok" id="year" name="year" required>
                            <div class="valid" id="yearValid"></div>
                        </div>
                    </div>
                </div>

                <div class="form-group form-check">
                    <div class="valid text-center" id="dateValid"></div>
                </div>

                <div class="form-group form-check">
                    <label class="form-check-label" id="policy">
                    <input type="checkbox" class="form-check-input" name="remember"  required> 
                    Oświadczam, że znam i akceptuję <a href="{{url('/polityka_prywatnosci')}}" class="text-decoration-none text-success"> Regulamin sklepu</a>.
                </label>
                </div>

                <div class="form-group form-check">
                    <label class="form-check-label" id="processing">
                    <input type="checkbox" class="form-check-input" name="remember" required> 
                    Wyrażam zgodę na przetwarzanie moich danych osobowych w celach marketingowych oraz na otrzymywanie informacji handlowych od serwisu <strong> New Bou </strong> drogą telefoniczną oraz za pomocą poczty Email.
                </label>
                </div>

                <button type="submit" class="btn btn-danger" id="log" disabled> Zarejestruj </button>
                <p class="text-center mb-0 mt-3"> <a href="{{ url('/logowanie')}}" class="text-body"> Zaloguj </a> </p>
            </form>
        </div>
    </section>

    <script src="public/js/client/registrationValidation.js"></script>

    <!-- Footer -->
    <footer class="pt-4 pb-4 mt-5">
        @include('footer')
    </footer>

    <script src="{{ asset('public/js/indexJs.js')}}"></script>

</body>

</html>