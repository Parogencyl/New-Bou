<?

    $orders = DB::select("SELECT * FROM clients_order INNER JOIN clients ON clients_order.user_id=clients.id_client 
    INNER JOIN clients_address ON clients_address.User_Id=clients_order.user_id ORDER BY order_id DESC");
    for ($i=0; $i < sizeof($orders); $i++) { 
        $order[$i] = json_decode(json_encode($orders[$i]), true);
    }

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>New Bou | Admin</title>
    <link rel="shortcut icon" href="{{ asset('public/graphics/icons8-sneakers-64.png') }}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('public/css/structure.css')}}" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<style>
    table i {
        font-size: 1em;
    }

</style>

<body>

    <!-- First menu -->
   <nav id="navbar1" class="text-right row pt-2">
    @include('navAdmin')
    </nav>

    <!-- First menu -->
   <nav id="navbar2" class="text-right row pt-2">
    @include('nav2Admin')
    </nav>

<section>
        <div class="container mt-5 mb-5">

            <h2 class="mb-4 text-center">
                <i class="fas fa-minus text-danger"></i> Zamówienia <i class="fas fa-minus text-danger"></i>
            </h2>

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            @if ($message = Session::get('lose'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <table class="table text-center table-striped table-bordered table-responsive" id="data">
                <caption class="text-center"> Realizacja zamówień</caption>
                <thead class="thead-dark">
                    <tr style="cursor: pointer">
                        <th scope="col" class="align-middle" onclick="sortTable('order_number', this)"> Numer zamówienia <i class="fas fa-arrow-down"></i> </th>
                        <th scope="col" class="align-middle" onclick="sortTable('date_of_purchase', this)"> Data </th>
                        <th scope="col" class="align-middle" > Zamówienie </th>
                        <th scope="col" class="align-middle" onclick="sortTable('name', this)"> Osoba </th>
                        <th scope="col" class="align-middle" onclick="sortTable('number', this)"> Telefon </th>
                        <th scope="col" class="align-middle" onclick="sortTable('Street', this)"> Adres </th>
                        <th scope="col" class="align-middle" onclick="sortTable('Zip', this)"> Kod pocztowy </th>
                        <th scope="col" class="align-middle" onclick="sortTable('status', this)"> Status </th>
                        <th scope="col" class="align-middle"> Zmień status </th>
                    </tr>
                </thead>
                <tbody>

            <!-- Funkcja dzielą tabelę na strony oraz peirwsze wyświetlenie tabeli -->

                    <script>
                        function tableNav(){
                            if(document.getElementById('nav')){
                                document.getElementById('nav').remove();
                            }
                            $(document).ready(function(){
                                $('#data').after('<ul id="nav" class="pagination justify-content-center"></ul>');
                                var rowsShown = 5;
                                var rowsTotal = $('#data tbody tr').length;
                                var numPages = rowsTotal/rowsShown;
                                numPages = Math.ceil(numPages);
                                for(i = 0; i < numPages; i++) {
                                    var pageNum = i + 1;
                                    $('#nav').append(' <li class="page-item"><a href="#" class="page-link" rel="'+i+'" onclick="look('+i+')">'+pageNum+'</a> </li>');
                                    if(numPages > 7){
                                        if(i > 2 && i < numPages - 2){
                                            $('#nav').children('li').eq(i).hide();
                                        }
                                    }
                                }
                                if(numPages > 7){
                                    $('#nav').children('li').eq(2).after('<li class="page-item page-link">...</li>');
                                }
                                $('#data tbody tr').hide();
                                $('#data tbody tr').slice(0, rowsShown).show();
                                $('#nav a:first').addClass('active');
                                $('#nav a').bind('click', function(){

                                    $('#nav a').removeClass('active');
                                    $(this).addClass('active');
                                    var number = $(this).text();

                                    if(numPages > 7){
                                        //Przycisk 1
                                        if($(this).text() == 1){
                                            $('#nav').children('li:contains("...")').remove();
                                            for(i = 0; i < numPages; i++) {
                                                $('#nav').children('li').eq(i).hide();
                                            }
                                            $('#nav').children('li').eq(0).show();
                                            $('#nav').children('li').eq(1).show();
                                            $('#nav').children('li').eq(2).show();
                                            $('#nav').children('li').eq(numPages-2).show();
                                            $('#nav').children('li').eq(numPages-1).show();
                                            $('#nav').children('li').eq(2).after('<li class="page-item page-link">...</li>');
                                            
                                            //Przycisk 
                                        }else if($(this).text() == 2){
                                            $('#nav').children('li:contains("...")').remove();
                                            for(i = 0; i < numPages; i++) {
                                                $('#nav').children('li').eq(i).hide();
                                            }
                                            console.log(numPages)
                                            $('#nav').children('li').eq(0).show();
                                            $('#nav').children('li').eq(1).show();
                                            $('#nav').children('li').eq(2).show();
                                            $('#nav').children('li').eq(numPages-2).show();
                                            $('#nav').children('li').eq(numPages-1).show();
                                            $('#nav').children('li').eq(2).after('<li class="page-item page-link">...</li>');
                                        
                                            //Przycisk 3
                                        }else if($(this).text() == 3){
                                            if($('#nav').children('li').eq(number).text().indexOf('...') == 0){
                                                $('#nav').children('li').eq(Math.ceil(numPages)-1).hide();
                                                $('#nav').children('li').eq(number).remove();
                                                $('#nav').children('li').eq(number).show();
                                                $('#nav').children('li').eq(number).after('<li class="page-item page-link">...</li>');
                                            } else {
                                                    //Środkowe przyciski - Poprzedni przycisk
                                                if($('#nav').children('li').eq(number).prev().is(':hidden')){
                                                    $('#nav').children('li').eq(number).prev().show();
                                                    $('#nav').children('li').eq(number).next().next().next().remove();
                                                    $('#nav').children('li').eq(number).next().next().hide();
                                                    $('#nav').children('li').eq(number).next().after('<li class="page-item page-link">...</li>');
                                                    $('#nav').children('li').eq(number).prev().prev().remove();
                                                }
                                            }

                                            //Przycisk 4
                                        }else if($(this).text() == 4){
                                            if($('#nav').children('li').eq(number).text() != 4){
                                                $('#nav').children('li').eq(number).remove();
                                                $('#nav').children('li').eq(number).show();
                                                $('#nav').children('li').eq(number).after('<li class="page-item page-link">...</li>');
                                                $('#nav').children('li').eq(1).hide();
                                                $('#nav').children('li').eq(0).after('<li class="page-item page-link">...</li>');
                                            }
                                                //Środkowe przyciski - Poprzedni przycisk
                                            if($('#nav').children('li').eq(number).prev().is(':hidden')){
                                                $('#nav').children('li').eq(number).prev().show();
                                                $('#nav').children('li').eq(number).next().next().next().remove();
                                                $('#nav').children('li').eq(number).next().next().hide();
                                                $('#nav').children('li').eq(number).next().after('<li class="page-item page-link">...</li>');
                                            }  

                                            //Środkowe przyciski
                                        } else if($(this).text() >= 5 && Math.ceil(numPages)-3 > $(this).text()){
                                            if($('#nav').children('li').eq(number).next().text().indexOf('...') == 0){
                                                $('#nav').children('li').eq(number).next().remove();
                                                $('#nav').children('li').eq(number).next().show();
                                                $('#nav').children('li').eq(number).next().after('<li class="page-item page-link">...</li>');
                                                $('#nav').children('li').eq(number-2).hide();
                                            } 
                                                //Środkowe przyciski - Poprzedni przycisk
                                            if($('#nav').children('li').eq(number).prev().is(':hidden')){
                                                $('#nav').children('li').eq(number).prev().show();
                                                $('#nav').children('li').eq(number).next().next().next().remove();
                                                $('#nav').children('li').eq(number).next().next().hide();
                                                $('#nav').children('li').eq(number).next().after('<li class="page-item page-link">...</li>');
                                            }   

                                             // Czwarty od końca przycisk
                                        } else if($(this).text() >= 5 && Math.ceil(numPages)-3 == $(this).text()){
                                            if($('#nav').children('li').eq(number).next().text().indexOf('...') != 0){
                                                $('#nav').children('li').eq(number).prev().show();
                                                $('#nav').children('li').eq(number).next().next().hide();    
                                                $('#nav').children('li').eq(number).next().after('<li class="page-item page-link">...</li>');
                                            }else {
                                                $('#nav').children('li').eq(number).prev().prev().hide();
                                                $('#nav').children('li').eq(number).next().remove();
                                                $('#nav').children('li').eq(number).next().show();
                                                $('#nav').children('li').eq(number).next().after('<li class="page-item page-link">...</li>');
                                            }                               

                                            // Trzeci od końca przycisk
                                        } else if($(this).text() >= 5 && Math.ceil(numPages)-2 == $(this).text()){
                                            if($('#nav').children('li').eq(number).next().text().indexOf('...') == 0){
                                                $('#nav').children('li').eq(number).next().remove();    
                                                $('#nav').children('li').eq(number).next().show();
                                                $('#nav').children('li').eq(number-2).hide();
                                            } else {
                                                $('#nav').children('li').eq(number).prev().show();
                                            }

                                            // Przedostatni przycisk
                                        } else if($(this).text() >= 5 && Math.ceil(numPages)-1 == $(this).text()){
                                            if(!$('#nav').children('li').eq(number-2).is(':hidden')){
                                                $('#nav').children('li').eq(number-2).hide();
                                            } else if($('#nav').children('li').eq(number-1).is(':hidden')){
                                                $('#nav').children('li').eq(number-1).show();
                                                $('#nav').children('li').eq(3).remove();
                                                $('#nav').children('li').eq(2).hide();
                                                $('#nav').children('li').eq(2).after('<li class="page-item page-link">...</li>');
                                            } 

                                            // Kliknięcie ostatniego przycisku
                                        }else if($(this).text() >= 5 && Math.ceil(numPages) == $(this).text()){
                                            $('#nav').children('li:contains("...")').remove();
                                            for(i = 0; i < numPages; i++) {
                                                $('#nav').children('li').eq(i).hide();
                                            }
                                            $('#nav').children('li').eq(0).show();
                                            $('#nav').children('li').eq(1).show();
                                            $('#nav').children('li').eq(2).show();
                                            $('#nav').children('li').eq(numPages-2).show();
                                            $('#nav').children('li').eq(numPages-1).show();
                                            $('#nav').children('li').eq(2).after('<li class="page-item page-link">...</li>');
                                        }
                                    }

                                    var currPage = $(this).attr('rel');
                                    var startItem = currPage * rowsShown;
                                    var endItem = startItem + rowsShown;
                                    $('#data tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).
                                    css('display','table-row').animate({opacity:1}, 300);
                                });
                                $('#nav li:first').addClass('badge badge-primary');
                                $('#nav').after("<div class='pagination justify-content-center'>"+
                                "<input type='number' min='1' id='numberOfPage' style='width: 70px; text-align: center' placeholder='...'>"+ 
                                "<button type='button' id='toPage' class='btn btn-primary ml-2'> Przejdź do strony </buton> </div>");
                                $('#toPage').click(goToPage);
                            });
                        }

                        // Pierwszewyświetlenie tabeli

                        let array = <?php echo json_encode($orders); ?>;
                        let addArray = [...array];
                        let number = array.length;

                        for(let i=0; i < array.length; i++){
                            document.getElementsByTagName("tbody")[0].innerHTML += '<tr>'+
                            '<td scope="row" class="align-middle font-weight-bold">'+array[i]["order_number"]+'</td>'+
                                '<td class="align-middle">'+array[i]["date_of_purchase"]+'</td>'+
                                '<td class="align-middle">'+array[i]["order_list"]+'</td>'+
                                '<td class="align-middle">'+array[i]["name"]+'</td>'+
                                '<td class="align-middle">'+array[i]["number"]+'</td>'+     
                                '<td class="align-middle">'+array[i]["Street"]+'</td>'+     
                                '<td class="align-middle">'+array[i]["Zip"]+'</td>'+     
                                '<td class="align-middle">'+array[i]["status"]+'</td>'+     
                                '<td class="dropdown"> <form action="{{ url("admin/zamowienia/change") }}" method="POST">'+
                                '@csrf <input type="number" name="number" value="'+(number)+'" class="d-none">'+
                                '<button class="btn btn-secondary dropdown-toggle" id="dropdownMenu'+(number)+'" data-toggle="dropdown" type="button"> Ustaw status </button>'+
                                '<div class="dropdown-menu" aria-labelledby="dropdownMenu'+(number)+'">'+
                                '<button class="dropdown-item" type="submit" name="button" value="Realizacja"> Realizacja </button>'+
                                '<button class="dropdown-item" type="submit" name="button" value="Wysłane"> Wysłane </button>'+
                                '<button class="dropdown-item" type="submit" name="button" value="Dostarczone"> Dostarczone </button>'+
                            '</div> </form> </td></tr>';
                            number--;
                        }

                        tableNav();

                    </script>                 
    
                </tbody>
            </table>
    </div>
</section>

<!-- Sortowanie i ustawianie wyglądu dla przycisków pod tabelą -->
<script> 
    
    function sortTable(column, element){
        if(element.innerHTML.search('<i class="fas fa-arrow-up"></i>') != '-1'){
            document.getElementsByTagName('th')[0].innerHTML = 'Numer zamówienia';
            document.getElementsByTagName('th')[1].innerHTML = 'Data';
            document.getElementsByTagName('th')[3].innerHTML = 'Osoba';
            document.getElementsByTagName('th')[4].innerHTML = 'Telefon';
            document.getElementsByTagName('th')[5].innerHTML = 'Adres';
            document.getElementsByTagName('th')[6].innerHTML = 'Kod pocztowy';
            document.getElementsByTagName('th')[7].innerHTML = 'Status';
            
            element.innerHTML += ' <i class="fas fa-arrow-down"></i>';
            
            addArray = addArray.sort((a,b)=> (a[column] < b[column]) ? 1 : ((b[column] < a[column]) ? -1: 0 ));
        } else {
            document.getElementsByTagName('th')[0].innerHTML = 'Numer zamówienia';
            document.getElementsByTagName('th')[1].innerHTML = 'Data';
            document.getElementsByTagName('th')[3].innerHTML = 'Osoba';
            document.getElementsByTagName('th')[4].innerHTML = 'Telefon';
            document.getElementsByTagName('th')[5].innerHTML = 'Adres';
            document.getElementsByTagName('th')[6].innerHTML = 'Kod pocztowy';
            document.getElementsByTagName('th')[7].innerHTML = 'Status';
            
            element.innerHTML += ' <i class="fas fa-arrow-up"></i>';
        
            addArray = addArray.sort((a,b)=> (a[column] > b[column]) ? 1 : ((b[column] > a[column]) ? -1: 0 ));
        }

        document.getElementsByTagName("tbody")[0].innerHTML = '';

        let number = array.length;
        
        for(let i=0; i < array.length; i++){
        document.getElementsByTagName("tbody")[0].innerHTML += '<tr>'+
        '<td scope="row" class="align-middle font-weight-bold">'+addArray[i]["order_number"]+'</td>'+
            '<td class="align-middle">'+addArray[i]["date_of_purchase"]+'</td>'+
            '<td class="align-middle">'+addArray[i]["order_list"]+'</td>'+
            '<td class="align-middle">'+addArray[i]["name"]+'</td>'+
            '<td class="align-middle">'+addArray[i]["number"]+'</td>'+     
            '<td class="align-middle">'+addArray[i]["Street"]+'</td>'+     
            '<td class="align-middle">'+addArray[i]["Zip"]+'</td>'+     
            '<td class="align-middle">'+addArray[i]["status"]+'</td>'+     
            '<td class="dropdown"> <form action="{{ url("admin/zamowienia/change") }}" method="POST">'+
            '@csrf <input type="number" name="number" value="'+(number)+'" class="d-none">'+
            '<button class="btn btn-secondary dropdown-toggle" id="dropdownMenu'+(number)+'" data-toggle="dropdown" type="button"> Ustaw status </button>'+
            '<div class="dropdown-menu" aria-labelledby="dropdownMenu'+(number)+'">'+
            '<button class="dropdown-item" type="submit" name="button" value="Realizacja"> Realizacja </button>'+
            '<button class="dropdown-item" type="submit" name="button" value="Wysłane"> Wysłane </button>'+
            '<button class="dropdown-item" type="submit" name="button" value="Dostarczone"> Dostarczone </button>'+
        '</div> </form> </td></tr>';
        number--;
        }

        tableNav();
                
    }

    function look(number){
        var rowsShown = 5;
        var rowsTotal = $('#data tbody tr').length;
        var numPages = rowsTotal/rowsShown;
        for (let i = 0; i < Math.ceil(numPages)+1; i++) {
            document.getElementsByTagName('li')[i].classList.remove('badge');
            document.getElementsByTagName('li')[i].classList.remove('badge-primary'); 
        }
        if($('#nav').children('li:contains("...")').length == 2){
            if(number+1 == Math.ceil(numPages)){
                document.getElementsByTagName('li')[number+2].className += ' badge badge-primary ';
            }else {
                document.getElementsByTagName('li')[number+1].className += ' badge badge-primary ';
            }
        }else if($('#nav').children('li:contains("...")').length == 1){
            if(number + 3 >= numPages){
                document.getElementsByTagName('li')[number+1].className += ' badge badge-primary ';
            } else {
                document.getElementsByTagName('li')[number].className += ' badge badge-primary ';
            }
        } else {
            document.getElementsByTagName('li')[number].className += ' badge badge-primary ';
        }
    }

    // Przejście z inputu do podanej strony tabeli
    function goToPage(){
        var rowsShown = 5;
        var rowsTotal = $('#data tbody tr').length;
        var numPages = rowsTotal/rowsShown;
        numPages = Math.ceil(numPages);
        numberSended = $('#numberOfPage').val();
        if( numberSended <= numPages && numberSended >= 1){

            $('#nav a').removeClass('active');
            $('#nav a:contains("'+numberSended+'")').addClass('active');
            var number = numberSended;

        if(numPages > 7){
            //Przycisk 1
            if(number == 1){
                $('#nav').children('li:contains("...")').remove();
                for(i = 0; i < numPages; i++) {
                    $('#nav').children('li').eq(i).hide();
                }
                $('#nav').children('li').eq(0).show();
                $('#nav').children('li').eq(1).show();
                $('#nav').children('li').eq(2).show();
                $('#nav').children('li').eq(numPages-2).show();
                $('#nav').children('li').eq(numPages-1).show();
                $('#nav').children('li').eq(2).after('<li class="page-item page-link">...</li>');
                
                //Przycisk 
            }else if(number == 2){
                $('#nav').children('li:contains("...")').remove();
                for(i = 0; i < numPages; i++) {
                    $('#nav').children('li').eq(i).hide();
                }
                $('#nav').children('li').eq(0).show();
                $('#nav').children('li').eq(1).show();
                $('#nav').children('li').eq(2).show();
                $('#nav').children('li').eq(numPages-2).show();
                $('#nav').children('li').eq(numPages-1).show();
                $('#nav').children('li').eq(2).after('<li class="page-item page-link">...</li>');
            
                //Przycisk 3
            }else if(number == 3){
                $('#nav').children('li:contains("...")').remove();
                for(i = 0; i < numPages; i++) {
                    $('#nav').children('li').eq(i).hide();
                }
                $('#nav').children('li').eq(0).show();
                $('#nav').children('li').eq(1).show();
                $('#nav').children('li').eq(2).show();
                $('#nav').children('li').eq(3).show();
                $('#nav').children('li').eq(3).after('<li class="page-item page-link">...</li>');
                $('#nav').children('li').eq(numPages).show();

                //Przycisk 4
            }else if(number >= 4 && number <= numPages-3){
                $('#nav').children('li:contains("...")').remove();
                for(i = 0; i < numPages; i++) {
                    $('#nav').children('li').eq(i).hide();
                }
                $('#nav').children('li').eq(0).show();
                $('#nav').children('li').eq(0).after('<li class="page-item page-link">...</li>');
                $('#nav').children('li').eq(numPages).show();
                $('#nav').children('li').eq(number).next().show();
                $('#nav').children('li').eq(number).prev().show();
                $('#nav').children('li').eq(number).show();
                $('#nav').children('li').eq(number).next().next().after('<li class="page-item page-link">...</li>');
                
            } else if( number == numPages -2){
                $('#nav').children('li:contains("...")').remove();
                for(i = 0; i < numPages; i++) {
                    $('#nav').children('li').eq(i).hide();
                }
                $('#nav').children('li').eq(0).show();
                $('#nav').children('li').eq(0).after('<li class="page-item page-link">...</li>');
                $('#nav').children('li').eq(numPages).show();
                $('#nav').children('li').eq(numPages-1).show();
                $('#nav').children('li').eq(numPages-2).show();
                $('#nav').children('li').eq(numPages-3).show();
            } else if( number == numPages -1){
                $('#nav').children('li:contains("...")').remove();
                for(i = 0; i < numPages; i++) {
                    $('#nav').children('li').eq(i).hide();
                }
                $('#nav').children('li').eq(0).show();
                $('#nav').children('li').eq(1).show();
                $('#nav').children('li').eq(1).after('<li class="page-item page-link">...</li>');
                $('#nav').children('li').eq(numPages).show();
                $('#nav').children('li').eq(numPages-1).show();
                $('#nav').children('li').eq(numPages-2).show();
            } else if( number == numPages){
                console.log(number +' - '+numPages)
                $('#nav').children('li:contains("...")').remove();
                for(i = 0; i < numPages; i++) {
                    $('#nav').children('li').eq(i).hide();
                }
                $('#nav').children('li').eq(0).show();
                $('#nav').children('li').eq(1).show();
                $('#nav').children('li').eq(2).show();
                $('#nav').children('li').eq(numPages-2).show();
                $('#nav').children('li').eq(numPages-1).show();
                $('#nav').children('li').eq(2).after('<li class="page-item page-link">...</li>');
            }
        }

        var currPage = $('#nav a:contains("'+numberSended+'")').attr('rel');
        var startItem = currPage * rowsShown;
        var endItem = startItem + rowsShown;
        $('#data tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).
        css('display','table-row').animate({opacity:1}, 300);

        look(number-1);
                }
            }

    
 </script>


    <script src="{{ asset('public/js/indexJs.js')}}"></script>

</body>

</html>