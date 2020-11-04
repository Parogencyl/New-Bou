<!DOCTYPE html>
<html lang="pl">
    <head>
        <title>New Bou | Moje konto</title>
        <link rel="shortcut icon" href="{{ asset('public/graphics/icons8-sneakers-64.png')}}" />
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="{{ asset('public/css/structure.css')}}" rel="stylesheet" />
        <link href="{{ asset('public/css/account/main.css')}}" rel="stylesheet" />

        <!-- Icons -->
        <link
            rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
            integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
            crossorigin="anonymous"
        />

        <!-- Bootstrap -->
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div id="content">
            <!-- First menu -->
        <nav id="navbar1" class="text-right row pt-2">
            @include('nav1')
        </nav>

        <!-- Second menu -->
        <nav id="navbar2" class="text-center row bg-light text-center">
            @include('nav2')
        </nav>

            <section>
                <nav id="accountMenu">
                <ul class="nav flex-column">

                    <li class="nav-item dropdown">
                        <a class="nav-link text-body" onclick="openAccount()" style="cursor: pointer"> Konto <span style="display: block; float: right;" id="iOne"> <i class="fas fa-caret-down"></i> </span> </a>
                        <div class="dropMenu" id="accountDrop">
                            <a href="{{ url('/panel/dane_konta')}}" class="nav-link"> Dane konta  </a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link text-body" onclick="openShopping()" style="cursor: pointer"> Zakupy <span style="display: block; float: right;" id="iTwo"> <i class="fas fa-caret-down"></i> </span> </a>
                        <div class="dropMenu" id="shoppingDrop">
                            <a href="{{ url('/panel/historia_zakupow')}}" class="nav-link"> Historia </a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link text-body" onclick="openSecurity()" style="cursor: pointer"> Bezpieczeństwo <span style="display: block; float: right;" id="iThree"> <i class="fas fa-caret-down"></i> </span> </a>
                        <div class="dropMenu" id="securityDrop">
                            <a href="{{ url('/panel/zmiana_hasla')}}" class="nav-link"> Zmiana hasła  </a>
                            <a href="{{ url('/panel/adres_pomocniczy')}}" class="nav-link"> Email pomocniczy </a>
                        </div>
                    </li>

                    <div id="logout">
                        <a class="nav-link" id="logoutButton" href="{{ url('/logout') }}">Wyloguj</a>
                    </div>
                </ul>
                </nav>
                <div id="center">
                    <div class="block">
                        <div class="blockLeft">
                            <h4>Konto</h4>
                            <p>
                                <a
                                    href="{{ url('/panel/dane_konta')}}"
                                    class="text-decoration-none"
                                >
                                    Dane konta
                                </a>
                        <a class="nav-link" id="logoutButton2" href="{{ url('/logout') }}">Wyloguj</a>

                            </p>
                        </div>
                        <div class="blockRight">
                            <i class="fas fa-user-circle"></i>
                        </div>
                    </div>

                    <div class="block">
                        <div class="blockLeft">
                            <h4>Zakupy</h4>
                            <p>
                                <a
                                    href="{{ url('/panel/historia_zakupow')}}"
                                    class="text-decoration-none"
                                >
                                    Historia
                                </a>
                            </p>
                        </div>
                        <div class="blockRight">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>

                    <div class="block">
                        <div class="blockLeft">
                            <h4>Bezpieczeństwo</h4>
                            <p>
                                <a
                                    href="{{ url('/panel/zmiana_hasla')}}"
                                    class="text-decoration-none"
                                >
                                    Zmiana hasła
                                </a>
                            </p>
                            <p>
                                <a
                                    href="{{ url('/panel/adres_pomocniczy')}}"
                                    class="text-decoration-none"
                                >
                                    Email pomocniczy
                                </a>
                            </p>
                        </div>
                        <div class="blockRight">
                            <i class="fas fa-user-shield"></i>
                        </div>
                    </div>

                    <div class="block">
                        <div class="blockLeft">
                            <h4>Inne</h4>
                            <p>
                                <a href="{{ url('/ulubione')}}" class="text-decoration-none">
                                    Ulubione
                                </a>
                            </p>
                            <p>
                                <a
                                    href="{{ url('/oceny')}}"
                                    class="text-decoration-none"
                                >
                                    Oceny produktów
                                </a>
                            </p>
                            <p>
                                <a href="{{ url('/koszyk')}}" class="text-decoration-none">
                                    Koszyk
                                </a>
                            </p>
                        </div>
                        <div class="blockRight">
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- Footer -->
        <footer class="pt-4 pb-4" id="footer">@include('footer')</footer>
    </body>

    <script src="{{ asset('public/js/account/main.js')}}"></script>

</html>
