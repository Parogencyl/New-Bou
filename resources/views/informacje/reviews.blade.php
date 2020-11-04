<?

    $opinions = DB::select("SELECT User_Id, Series, Opinion_stars, Opinion_description, Opinion_date, clients.email 
    FROM clients_shop_history INNER JOIN clients ON clients.id_client=User_Id WHERE Opinion='1' ORDER BY Opinion_date DESC LIMIT 50");
    for ($i=0; $i < sizeof($opinions); $i++) { 
        ${'opinion'.$i} = json_decode(json_encode($opinions[$i]), true);
    }
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>New Bou | Informacje</title>
    <link rel="shortcut icon" href="{{ asset('public/graphics/icons8-sneakers-64.png')}}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('public/css/structure.css')}}" rel="stylesheet">
    <link href="{{ asset('public/css/informacje/reviews.css')}}" rel="stylesheet">

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

    <h2 class="mt-4 mb-3 text-center"> <i class="fas fa-minus text-danger"></i> OPINIE KLIENTÓW <i class="fas fa-minus text-danger"></i> </h2>

    <section>


        @for ($i = 0; $i < sizeof($opinions); $i++)



            <div class="clientOpinion">
                <p class="opinionTitle"> <span class="userName"> 
                    {{ substr(${'opinion'.$i}['email'], 0, strpos (${'opinion'.$i}['email'], '@')) }}
                </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="opinionDate"> {{${'opinion'.$i}['Opinion_date']}} </span></p>
                <p class="opinionProduct"> <span class="shoesName"> New Bou {{${'opinion'.$i}['Series']}} </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="opinionStars">
                    @if (${'opinion'.$i}['Opinion_stars'] == 1)
                    <span class="opinionStars"> <i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star">
                    </i><i class="far fa-star"></i><i class="far fa-star"></i> </span>
                    @endif

                    @if (${'opinion'.$i}['Opinion_stars'] == 2)
                    <span class="opinionStars"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star">
                    </i><i class="far fa-star"></i><i class="far fa-star"></i> </span>
                    @endif

                    @if (${'opinion'.$i}['Opinion_stars'] == 3)
                    <span class="opinionStars"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star">
                    </i><i class="far fa-star"></i><i class="far fa-star"></i> </span>
                    @endif

                    @if (${'opinion'.$i}['Opinion_stars'] == 4)
                    <span class="opinionStars"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star">
                    </i><i class="fas fa-star"></i><i class="far fa-star"></i> </span>
                    @endif

                    @if (${'opinion'.$i}['Opinion_stars'] == 5)
                    <span class="opinionStars"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star">
                    </i><i class="fas fa-star"></i><i class="fas fa-star"></i> </span>
                    @endif
                </span></p>
                <p class="opinionText">
                    {{${'opinion'.$i}['Opinion_description']}}
                </p>
            </div>

        @endfor
        

    </section>

    <!-- Footer -->
    <footer class="pt-4 pb-4 mt-5">
        @include('footer')
    </footer>

</body>
<script src="{{ asset('public/js/information/reviews.js')}}"></script>


</html>