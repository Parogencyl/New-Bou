<?

    $email = session()->get('email');

    if($email){
        $user = DB::select("SELECT * FROM clients WHERE email=?", [$email]);
        $user = json_decode(json_encode($user[0]), true);

        $client_cart = DB::select("SELECT * FROM clients_cart WHERE User_Id=?", [$user['id_client']]);
        if($client_cart){
            for ($i=0; $i < sizeof($client_cart); $i++) { 
                ${'client_cart'.$i} = json_decode(json_encode($client_cart[$i]), true); 
            }
            
            $price = 0;
            for ($i=0; $i < sizeof($client_cart); $i++) { 
                $price += ${'client_cart'.$i}['Price'];
            }
        }

    }


?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>New Bou | Logowanie</title>
    <link rel="shortcut icon" href="{{ asset('public/graphics/icons8-sneakers-64.png') }}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('public/css/structure.css')}}" rel="stylesheet">
    <link href="{{ asset('public/css/client/shoppingCart.css')}}" rel="stylesheet">

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

        <!-- login -->
        <section>
            <h1> Koszyk z zakupami <i class="fas fa-shopping-basket text-secondary"></i></h1>

            @if (session()->get('email'))

                @if ($client_cart)

                <div id="products">

                    @for ($i = 0; $i < sizeof($client_cart); $i++)
                        
                    <div class="blockData">
    
                        <div class="photo"><img class="shoesPhoto" src="{{asset(${'client_cart'.$i}['Image'])}}"> </div>
    
                        <div class="info">
                            <p>Model: <span class="name"> {{ ${'client_cart'.$i}['Series']}} </span> </p>
                            <p>Rozmiar: <span class="size">{{ ${'client_cart'.$i}['Size']}}</span> </p>
                            <p>Cena: <span class="prize">{{ ${'client_cart'.$i}['Price']}}</span> zł </p>
                        </div>
    
                        <div class="modified">
                            <div class="changeSize">
                            
                                <form action="{{url('/koszyk/zmiana_rozmiaru')}}" method="POST">
                                    @csrf
                                <input type="number" class="inputSize" name="sizeOfBoots" min="34" max="47">
                                <input type="text" name="element" value="{{${'client_cart'.$i}['Shopping_Cart']}}" style="display: none">
                                <button class="mod" type="button" name="submit" onclick="change(this)">Zmień rozmiar <i class="fas fa-exchange-alt"></i></button>
                                
                                </form>

                            </div>
                            <form action="{{url('/koszyk/usuniecie_obuwia')}}" method="POST">
                                @csrf
                            <input type="text" name="element" value="{{${'client_cart'.$i}['Shopping_Cart']}}" style="display: none">
                            <button class="submit" onclick="del()" name="submit">
                                Usuń <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>

                        </div>
                    </div>

                    @endfor
    
                </div>
    
                <div id="summary">
                    <h2> Podsumowanie </h2>
                    <div id="line"></div>
                    <p id="text1">Darmowa przesyłka</p>
                    <hr>
                    <p> Całkowity koszt <span id="prizeOfAll">{{$price}} zł</span> </p>
                    <hr>
    
                    <a href="{{ url('/zamowienie')}}"> <button id="buy">Przejdź do zamówienia</button> </a>
                </div>

                @else

                <div id="empty">
                    <p><i class="fas fa-shopping-bag"></i></p>
                    <p> Aktualnie żadne produkt nie znajduje się w Twoim koszyku. </p>
                </div>

                @endif

            @else

            <div id="empty">
                <p><i class="fas fa-shopping-bag"></i></p>
                <p> W celu sprawdzenia zawartości koszyka, należy być zalogowanym. </p>
            </div>

            @endif
            

            

        </section>
    </div>

    <!-- Footer -->
    <footer class="pt-4 pb-4" id="footer">
        @include('footer')
    </footer>

    <script src="{{ asset('public/js/client/shoppingCart.js')}}">
    </script>

</body>

</html>