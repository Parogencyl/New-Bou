<? 
    $shoesTable = DB::select("SELECT * FROM Shoes");

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>New Bou | Obuwie</title>
    <link rel="shortcut icon" href="{{ asset('public/graphics/icons8-sneakers-64.png')}}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('public/css/structure.css')}}" rel="stylesheet">
    <link href="{{ asset('public/css/wyszukiwanie/shoes.css')}}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<style>
    #empty {
        font-size: 22px;
        text-align: justify;
        background-color: rgb(251, 255, 249);
        box-shadow: 0 0 6px 1px rgb(201, 218, 193);
        border-radius: 5px;
        margin-bottom: 30px;
        padding: 30px;
        width: 100%;
        overflow: hidden;
        position: relative;
        float: left;
    }
    #empty i {
        font-size: 50px;
    }
</style>
<body>

    <!-- First menu -->
   <nav id="navbar1" class="text-right row pt-2">
    @include('nav1')
    </nav>

    <!-- Second menu -->
    <nav id="navbar2" class="text-center row bg-light text-center">
        @include('nav2')
    </nav>

    <!-- Center -->
    <section>
        <h1 class="mt-5 mb-4 text-center "> OBUWIE NEW BOU </h1>
        <!-- Aside menu -->
        <aside>
            <div class="configuration" id="firstOption">
                <h5 class="font-weight-bold mt-2"> Cena: </h5>
                <div>
                    <p class="mb-0"> 
                        Od <input type="number" min="0" onchange="priceFunction(0, this.value)" id="minPrice" name="minPrice" class="w-50 pl-2 mb-2 mt-1">
                    </p>
                    <p class="mb-0"> 
                        Do <input type="number" min="1" onchange="priceFunction(1, this.value)" id="maxPrice" name="maxPrice" class="w-50 pl-2"> 
                    </p>
                </div>
            </div>

            <div class="configuration">
                <h5 class="font-weight-bold mt-2"> Dla kogo: </h5>
                <div>
                    <p class="mb-0" id="Man" onclick="focusConfiguration(this); sexFunction(1)"> Męskie </p>
                    <p class="mb-0" id="Woman" onclick="focusConfiguration(this); sexFunction(2)"> Damskie </p>
                </div>
            </div>

            <div class="configuration">
                <h5 class="font-weight-bold mt-2"> Rodzaj: </h5>
                <div>
                    <p class="mb-0" id="Classic" onclick="focusConfigurationType('Classic'); clasicFun()"> Klasyczne </p>
                    <p class="mb-0" id="Sport" onclick="focusConfigurationType('Sport'); sportFun()"> Sportowe </p>
                    <p class="mb-0" id="Winter" onclick="focusConfigurationType('Winter'); trampkiFun()"> Trampki </p>
                    <p class="mb-0" id="Slippers" onclick="focusConfigurationType('Slippers'); klapkiFun()"> Klapki </p>
                </div>
            </div>

            <div class="configuration" id="thirdOption">
                <h5 class="font-weight-bold mt-2"> Sortuj według: </h5>
                <div>
                    <p class="mb-0" id="mostExpensive" onclick="focusConfigurationSort('exp'); priceExp()"> Najdroższe </p>
                    <p class="mb-0" id="mostCheapest" onclick="focusConfigurationSort('cheap'); priceCheap()"> Najtańsze </p>
                </div>
            </div>

            
            <div class="configuration">
                <h5 class="font-weight-bold mt-2"> Rozmiar: </h5>
                <div class="row">
                    <p class="mb-0 sizeShoes col-4 text-center" id="size34" onclick="focusConfigurationSize(this), sizeFunction(this)"> 34 </p>
                    <p class="mb-0 sizeShoes col-4 text-center" id="size35" onclick="focusConfigurationSize(this), sizeFunction(this)"> 35 </p>
                    <p class="mb-0 sizeShoes col-4 text-center" id="size36" onclick="focusConfigurationSize(this), sizeFunction(this)"> 36 </p>
                    <p class="mb-0 sizeShoes col-4 text-center" id="size37" onclick="focusConfigurationSize(this), sizeFunction(this)"> 37 </p>
                    <p class="mb-0 sizeShoes col-4 text-center" id="size38" onclick="focusConfigurationSize(this), sizeFunction(this)"> 38 </p>
                    <p class="mb-0 sizeShoes col-4 text-center" id="size39" onclick="focusConfigurationSize(this), sizeFunction(this)"> 39 </p>
                    <p class="mb-0 sizeShoes col-4 text-center" id="size40" onclick="focusConfigurationSize(this), sizeFunction(this)"> 40 </p>
                    <p class="mb-0 sizeShoes col-4 text-center" id="size41" onclick="focusConfigurationSize(this), sizeFunction(this)"> 41 </p>
                    <p class="mb-0 sizeShoes col-4 text-center" id="size42" onclick="focusConfigurationSize(this), sizeFunction(this)"> 42 </p>
                    <p class="mb-0 sizeShoes col-4 text-center" id="size43" onclick="focusConfigurationSize(this), sizeFunction(this)"> 43 </p>
                    <p class="mb-0 sizeShoes col-4 text-center" id="size44" onclick="focusConfigurationSize(this), sizeFunction(this)"> 44 </p>
                    <p class="mb-0 sizeShoes col-4 text-center" id="size45" onclick="focusConfigurationSize(this), sizeFunction(this)"> 45 </p>
                    <p class="mb-0 sizeShoes col-4 text-center" id="size46" onclick="focusConfigurationSize(this), sizeFunction(this)"> 46 </p>
                    <p class="mb-0 sizeShoes col-4 text-center" id="size47" onclick="focusConfigurationSize(this), sizeFunction(this)"> 47 </p>
                </div>
            </div>
        
        </aside>

        <script type="text/javascript">
            
        </script>

        <!-- Shoes -->
        <article class="row" id="items">

            <div id="empty" class=" text-center">
                <p><i class="fas fa-eye-slash"></i></p>
                <p> Niestety żaden produkt nie spełnia podanych kryteriów. </p>
            </div>

        <script>
            let category = "<?php echo session()->get('category') ?>";
            let array = <?php echo json_encode($shoesTable); ?>;
            let addArray = [...array];
            let man = woman = sex = exp = cheap = clasic = sport = trampki = klapki = minPrice = maxPrice = size = 0;

            if( category ){
                if(category == "Klasyczne"){
                    clasic = 1;
                    display();
                    document.getElementById("Classic").innerHTML =
                    "Klasyczne <i class='fas fa-check text-success '></i>";
            document.getElementById("Classic").style.color = "black";
                } else if(category == "Sportowe"){
                    sport = 1;
                    display();
                    document.getElementById("Sport").innerHTML =
                    "Sportowe <i class='fas fa-check text-success '></i>";
            document.getElementById("Sport").style.color = "black";
                }else if (category == "Trampki"){
                    trampki = 1;
                    display();
                    document.getElementById("Winter").innerHTML =
                    "Trampki <i class='fas fa-check text-success '></i>";
            document.getElementById("Winter").style.color = "black";
                } else if (category == "Klapki"){
                    klapki = 1;
                    display();
                    document.getElementById("Slippers").innerHTML =
                    "Klapki <i class='fas fa-check text-success '></i>";
            document.getElementById("Slippers").style.color = "black";
                } else if (category == "Meskie"){
                    man = 1;
                    sex = 1;
                    display();
                    document.getElementById("Man").innerHTML =
                    "Męskie <i class='fas fa-check text-success '></i>";
            document.getElementById("Man").style.color = "black";
                } else if (category == "Damskie"){
                    woman = 1;
                    sex = 2;
                    display();
                    document.getElementById("Woman").innerHTML =
                    "Damskie <i class='fas fa-check text-success '></i>";
            document.getElementById("Woman").style.color = "black";
                }
            } else {

            for(let i=0; i < array.length; i++){
                if(array[i]["Price_new"] != 0){
                    document.getElementById("items").innerHTML += "<div class='col-xl-3 col-md-4 col-6 card border-0'>"+
                        "<a href='obuwie/"+array[i]['Series']+"' class='text-decoration-none'>"+
                            "<img class='card-img-top' src='"+array[i]['Image']+"' alt='New bou "+array[i]['Image']+"'>"+
                            "<div class='card-body p-1 pt-2'>"+
                            "<p class='card-text text-success text-center font-weight-bold'>"+array[i]['Price_new']+" zł &nbsp; <del class='font-weight-normal text-dark'>"+array[i]['Price']+" zł </del></p>"+
                            "<h6 class='card-title text-center text-secondary font-weight-bold'> New Bou "+array[i]['Series']+" </h6>"+
                        "</div>"+
                        "</a>"+
                    "</div>"
                } else {
                    document.getElementById("items").innerHTML += "<div class='col-xl-3 col-md-4 col-6 card border-0'>"+
                        "<a href='obuwie/"+array[i]['Series']+"' class='text-decoration-none'>"+
                            "<img class='card-img-top' src='"+array[i]['Image']+"' alt='New bou "+array[i]['Image']+"'>"+
                            "<div class='card-body p-1 pt-2'>"+
                            "<p class='card-text text-success text-center font-weight-bold'>"+array[i]['Price']+" zł </p>"+
                            "<h6 class='card-title text-center text-secondary font-weight-bold'> New Bou "+array[i]['Series']+" </h6>"+
                        "</div>"+
                        "</a>"+
                    "</div>"
                }
            }

            }

            function display(){
                let addArray = [...array];

                if(minPrice != 0){
                    addArray = addArray.filter(function( obj ) {
                            return obj.Price >= minPrice;
                    });
                }

                if(maxPrice != 0){
                    addArray = addArray.filter(function( obj ) {
                            return obj.Price <= maxPrice;
                    });
                }

                if(size != 0){
                    addArray = addArray.filter(function( obj ) {
                            return obj.Size_Min <= size && obj.Size_Max >= size;
                    });
                }

                if(sex == 1){
                    addArray = addArray.filter(function( obj ) {
                            return obj.For_who === 1;
                    });
                }

                if(sex == 2){
                    addArray = addArray.filter(function( obj ) {
                            return obj.For_who !== 1;
                    });
                }

                if(clasic == 1){
                    addArray = addArray.filter(function( obj ) {
                            return obj.Category === 'Klasyczne';
                    });
                }

                if(sport == 1){
                    addArray = addArray.filter(function( obj ) {
                            return obj.Category === 'Sportowe';
                    });
                }

                if(klapki == 1){
                    addArray = addArray.filter(function( obj ) {
                            return obj.Category === 'Klapki';
                    });
                }

                if(trampki == 1){
                    addArray = addArray.filter(function( obj ) {
                            return obj.Category === 'Trampki';
                    });
                }

                if(exp == 1){
                    addArray = addArray.sort((a,b)=> (a['Price'] < b['Price']) ? 1 : ((b['Price'] < a['Price']) ? -1: 0 ));
                }

                if(cheap == 1){
                    addArray = addArray.sort((a,b)=> (a['Price'] > b['Price']) ? 1 : ((b['Price'] > a['Price']) ? -1: 0 ));
                }
                
                document.getElementById("items").innerHTML = "";
                for(let i=0; i < addArray.length; i++){
                    if(addArray[i]["Price_new"] != 0){
                        document.getElementById("items").innerHTML += "<div class='col-xl-3 col-md-4 col-6 card border-0'>"+
                            "<a href='obuwie/"+addArray[i]['Series']+"' class='text-decoration-none'>"+
                                "<img class='card-img-top' src='"+addArray[i]['Image']+"' alt='New bou "+addArray[i]['Image']+"'>"+
                                "<div class='card-body p-1 pt-2'>"+
                                "<p class='card-text text-success text-center font-weight-bold'>"+addArray[i]['Price_new']+" zł &nbsp; <del class='font-weight-normal text-dark'>"+addArray[i]['Price']+" zł </del></p>"+
                                "<h6 class='card-title text-center text-secondary font-weight-bold'> New Bou "+addArray[i]['Series']+" </h6>"+
                            "</div>"+
                            "</a>"+
                        "</div>"
                    } else {
                        document.getElementById("items").innerHTML += "<div class='col-xl-3 col-md-4 col-6 card border-0'>"+
                            "<a href='obuwie/"+addArray[i]['Series']+"' class='text-decoration-none'>"+
                                "<img class='card-img-top' src='"+addArray[i]['Image']+"' alt='New bou "+addArray[i]['Image']+"'>"+
                                "<div class='card-body p-1 pt-2'>"+
                                "<p class='card-text text-success text-center font-weight-bold'>"+addArray[i]['Price']+" zł </p>"+
                                "<h6 class='card-title text-center text-secondary font-weight-bold'> New Bou "+addArray[i]['Series']+" </h6>"+
                            "</div>"+
                            "</a>"+
                        "</div>"
                    }
                }

                
                
                if(document.getElementById('items').innerHTML == ""){
                    document.getElementById("items").innerHTML =
                '<div id="empty" class=" text-center"><p><i class="fas fa-eye-slash"></i></p>'+
                '<p> Niestety żaden produkt nie spełnia podanych kryteriów. </p></div>'; 
                }
            }

            // ustawienie ceny
            function priceFunction(element, value){
                if(element == 0){
                    minPrice = value;
                    if((Number(minPrice) >= Number(maxPrice)) && (maxPrice != "")){
                        minPrice = 0;
                        document.getElementById('minPrice').value = 0;
                    }

                    if(minPrice < 0){
                        document.getElementById('minPrice').value = 0;
                        minPrice = 0;
                    } else if(minPrice > 9998){
                        minPrice = 9998;
                        document.getElementById('minPrice').value = 9998;
                    }
                    if(value == ""){
                        minPrice = 0;
                        document.getElementById('minPrice').value = '';
                    }

                } else {
                    maxPrice = value;
                    if(minPrice >= maxPrice && maxPrice != ""){
                        minPrice = 0;
                        document.getElementById('minPrice').value = 0;
                    }
                    if(maxPrice < 1){
                        maxPrice = 1;
                        document.getElementById('maxPrice').value = 1;
                    }else if(maxPrice > 9999){
                        maxPrice = 9999;
                        document.getElementById('maxPrice').value = 9999;
                    }

                    if(value == ""){
                        maxPrice = 0;
                        document.getElementById('maxPrice').value = '';
                    }
                }
                display();
            }

            // ustawienie rozmiaru

            function sizeFunction(element){
                if(Number(element.innerText) != size){
                    size = Number(element.innerText);
                } else {
                    size = 0;
                }
                display();
            }

            // ustawianie płci
            function sexFunction(number){
                if(number == 1){
                    if(man == 0){
                        man = 1;
                        if(woman == 0){
                            sex = 1;
                        } else {
                            sex = 0;
                        }
                    }else{
                        man = 0;
                        if(woman == 0){
                            sex = 0;
                        } else {
                            sex = 2;
                        }
                    }
                } else {
                    if(woman == 0){
                        woman = 1;
                        if(man == 0){
                            sex = 2;
                        } else {
                            sex = 0;
                        }
                    }else{
                        woman = 0;
                        if(man == 0){
                            sex = 0;
                        } else {
                            sex = 1;
                        }
                    }
                }
                display();
            }

            // ustawianie od najdroższych
            function priceExp(){
                if(exp == 0){
                    if(cheap == 1){
                        cheap = 0;
                    }
                    exp = 1;
                } else {
                    exp = 0;
                }
                display();
            }

            // ustawianie od najtańszych
            function priceCheap(){
                if(cheap == 0){
                    if(exp == 1){
                        exp = 0;
                    }
                    cheap = 1;
                } else {
                    cheap = 0;
                }
                display();
            }

            // ustawianie rodzaju "klasyczne"
            function clasicFun(){
                if(clasic == 0){
                    clasic = 1;
                        sport = 0;
                        klapki = 0;
                        trampki = 0;
                } else {
                    clasic = 0;
                }
                display();
            }

            // ustawianie rodzaju "sportowe"
            function sportFun(){
                if(sport == 0){
                    sport = 1;
                        clasic = 0;
                        klapki = 0;
                        trampki = 0;
                } else {
                    sport = 0;
                }
                display();
            }

            // ustawianie rodzaju "trampki"
            function trampkiFun(){
                if(trampki == 0){
                    trampki = 1;
                        sport = 0;
                        klapki = 0;
                        clasic = 0;
                } else {
                    trampki = 0;
                }
                display();
            }

            // ustawianie rodzaju "klapki"
            function klapkiFun(){
                if(klapki == 0){
                    klapki = 1;
                        sport = 0;
                        clasic = 0;
                        trampki = 0;
                } else {
                    klapki = 0;
                }
                display();
            }

        </script>

        </article>

    </section>

    <!-- Footer -->
    <footer class="pt-4 pb-4 mt-5">
        @include('footer')
    </footer>

    

    <script src="{{ asset('public/js/searching/aside.js')}}"></script>
</body>

</html>