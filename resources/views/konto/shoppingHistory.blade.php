<?

    $email = session()->get('email');

    $user = DB::select("SELECT * FROM clients WHERE email=?", [$email]);
    $user = json_decode(json_encode($user[0]), true);

    $user_shop_history = DB::select("SELECT * FROM clients_shop_history WHERE User_Id=?", [$user['id_client']]);

    if($user_shop_history != null){
        for($i=0; $i<sizeof($user_shop_history); $i++){
            ${'user_shop_history'.$i} = json_decode(json_encode($user_shop_history[$i]), true);
        }
    } else {
        $user_shop_history = null;
    }

    

    //jeśli jest tylko jeden produkt w koszyku
    //$user_shop_history = json_decode(json_encode($user_shop_history[0]), true);

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>New Bou | Moje konto</title>
    <link rel="shortcut icon" href="{{ asset('public/graphics/icons8-sneakers-64.png')}}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('public/css/structure.css')}}" rel="stylesheet">
    <link href="{{ asset('public/css/account/content.css')}}" rel="stylesheet">
    <link href="{{ asset('public/css/account/shoppingHistory.css')}}" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
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
                <h3> Historia zakupów </h3>

                @if (!$user_shop_history)
                <div class="blockData">
                    <p> Do tej pory nie został wykonany żaden zakup. W celu zakupienia produktu należy przejść do strony z obuwiem, dodać produkt do koszyka, a następnie przechodząc do zawartości koszyka dokonać zakupu. </p>
                </div>
                @else

                @for ($i = 0; $i < sizeof($user_shop_history); $i++)

                <div class="blockData">
                    <p class="dateOfBuy">Data zakupu: <span class="buyDate"> {{${'user_shop_history'.$i}['Date_of_purchase']}} </span> </p>
                    <!--<p class="status"> Przesyłka w drodze </p>-->
                    <div class="boughtProduct">
                    <img src="{{asset(${'user_shop_history'.$i}['Image'])}}" alt="{{${'user_shop_history'.$i}['Series']}}">
                        <p class="nameOfProduct"> New Bou {{${'user_shop_history'.$i}['Series']}} </p>
                        <p class="price"> <span class="priceSpan"> {{${'user_shop_history'.$i}['Price']}} </span> zł </p>
                    </div>
                    
                    <div class="infoBlock">
                        <div class="detailsInfo">
                            <p class="title">Wysyłka na adres</p>
                            <p class="address">
                                <span> {{${'user_shop_history'.$i}['Street']." ".${'user_shop_history'.$i}['Local_number']}}</span><br>
                                <span> {{${'user_shop_history'.$i}['Zip']}} {{${'user_shop_history'.$i}['Location']}}</span><br>
                                <span> {{${'user_shop_history'.$i}['Voivodeship']}}</span><br>
                                <span> {{${'user_shop_history'.$i}['Country']}}</span><br>
                            </p>
                        </div>
                        <div class="detailsNumber">
                            <p class="title">Numer telefonu</p>
                            <p class="phoneNumber">
                                <span> {{${'user_shop_history'.$i}['Number']}}</span><br>
                            </p>
                        </div>
                    </div>
    
                    <div class="opinion">
                        @if ( !${'user_shop_history'.$i}['Opinion'] )

                        <p class="title"> Jak podoba ci się ten produkt? </p>
                        <span class="opinionStars"> <i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star">
                        </i><i class="far fa-star"></i><i class="far fa-star"></i> </span>
                        <form method="POST" action="{{url('/panel/opinion')}}">
                            @csrf
                            <input type="text" name="stars" style="display: none;">
                            <input type="text" name="element" value="{{$i+1}}" style="display: none;">
                            <textarea placeholder="Komentarz do produktu" name="text" id="text"></textarea>
                            <button id="submit" type="submit" name="submit"> Dodaj opinie </button>
                        </form>
                            
                        @else

                        <p class="title"> Twoja opinia: </p>
                        @csrf
                        <input type="text" name="stars" style="display: none;">
                        <input type="text" name="element" value="{{$i+1}}" style="display: none;">
                        @if (${'user_shop_history'.$i}['Opinion_stars'] == 1)
                        <span class="opinionStars"> <i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star">
                        </i><i class="far fa-star"></i><i class="far fa-star"></i> </span>
                        @endif

                        @if (${'user_shop_history'.$i}['Opinion_stars'] == 2)
                        <span class="opinionStars"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star">
                        </i><i class="far fa-star"></i><i class="far fa-star"></i> </span>
                        @endif

                        @if (${'user_shop_history'.$i}['Opinion_stars'] == 3)
                        <span class="opinionStars"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star">
                        </i><i class="far fa-star"></i><i class="far fa-star"></i> </span>
                        @endif

                        @if (${'user_shop_history'.$i}['Opinion_stars'] == 4)
                        <span class="opinionStars"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star">
                        </i><i class="fas fa-star"></i><i class="far fa-star"></i> </span>
                        @endif

                        @if (${'user_shop_history'.$i}['Opinion_stars'] == 5)
                        <span class="opinionStars"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star">
                        </i><i class="fas fa-star"></i><i class="fas fa-star"></i> </span>
                        @endif
                        
                        <p class='mt-2 mb-3'> {{${'user_shop_history'.$i}['Opinion_description']}} </p>

                        @endif
                        
                    </div>
    
                    <div style="clear: both;"></div>
                    <a class="details" onclick="details({{$i+1}})"> Szczegóły </a>
                    <a class="rateProduct" onclick="rate({{$i+1}})"> Oceń produkt </a>
                </div>
          
                @endfor

                @endif

        </section>
    </div>
    <!-- Footer -->
    <footer class="pt-4 pb-4" id="footer">
        @include('footer')
    </footer>

</body>
<script src="{{ asset('public/js/account/shoppingHistory.js')}}"></script>

<script src="{{ asset('public/js/account/main.js')}}"></script>

</html>