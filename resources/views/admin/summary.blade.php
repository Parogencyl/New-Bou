<?php

    $orders = DB::select("SELECT * FROM clients_order");

    for ($i=0; $i < 7; $i++) { 
        ${'order'.$i} = DB::select("SELECT SUM(price) as price FROM clients_order WHERE date_of_purchase LIKE ?", ['%'.date('Y-m-d', strtotime( "-".$i." days" )).'%']);
        ${'order'.$i} = json_decode(json_encode(${'order'.$i}[0]), true);
        if(!${'order'.$i}['price'] ){
            ${'order'.$i}['price'] = 0;
        }
    }

    for ($i=0; $i < 12; $i++) { 
        ${'orderMonth'.$i} = DB::select("SELECT SUM(price) as price FROM clients_order WHERE date_of_purchase LIKE ?", ['%'.date('Y-m', strtotime( "-".$i." month" )).'%']);
        ${'orderMonth'.$i} = json_decode(json_encode(${'orderMonth'.$i}[0]), true);
        if(!${'orderMonth'.$i}['price'] ){
            ${'orderMonth'.$i}['price'] = 0;
        }
    }

    $dataPoints = array( 
        array("y" => $order0['price'],"label" => date('Y-m-d') ),
        array("y" => $order1['price'],"label" => date('Y-m-d', strtotime( "-1 days" )) ),
        array("y" => $order2['price'],"label" => date('Y-m-d', strtotime( "-2 days" )) ),
        array("y" => $order3['price'],"label" => date('Y-m-d', strtotime( "-3 days" )) ),
        array("y" => $order4['price'],"label" => date('Y-m-d', strtotime( "-4 days" )) ),
        array("y" => $order5['price'],"label" => date('Y-m-d', strtotime( "-5 days" )) ),
        array("y" => $order6['price'],"label" => date('Y-m-d', strtotime( "-6 days" )) ),
    );

    switch(date('m')){
        case '1':
            $dataPointsMonths = array(
                array("label"=> 'Luty', "y"=> $orderMonth11['price']),
                array("label"=> 'Marzec', "y"=> $orderMonth10['price']),
                array("label"=> 'Kwiecień', "y"=> $orderMonth9['price']),
                array("label"=> 'Maj', "y"=> $orderMonth8['price']),
                array("label"=> 'Czerwiec', "y"=> $orderMonth7['price']),
                array("label"=> 'Lipiec', "y"=> $orderMonth6['price']),
                array("label"=> 'Sierpień', "y"=> $orderMonth5['price']),
                array("label"=> 'Wrzesień', "y"=> $orderMonth4['price']),
                array("label"=> 'Październik', "y"=> $orderMonth3['price']),
                array("label"=> 'Listopad', "y"=> $orderMonth2['price']),
                array("label"=> 'Grudzień', "y"=> $orderMonth1['price']),
                array("label"=> 'Styczeń', "y"=> $orderMonth0['price']),
            );
        break;
        case '2':
            $dataPointsMonths = array(
                array("label"=> 'Marzec', "y"=> $orderMonth11['price']),
                array("label"=> 'Kwiecień', "y"=> $orderMonth10['price']),
                array("label"=> 'Maj', "y"=> $orderMonth9['price']),
                array("label"=> 'Czerwiec', "y"=> $orderMonth8['price']),
                array("label"=> 'Lipiec', "y"=> $orderMonth7['price']),
                array("label"=> 'Sierpień', "y"=> $orderMonth6['price']),
                array("label"=> 'Wrzesień', "y"=> $orderMonth5['price']),
                array("label"=> 'Październik', "y"=> $orderMonth4['price']),
                array("label"=> 'Listopad', "y"=> $orderMonth3['price']),
                array("label"=> 'Grudzień', "y"=> $orderMonth2['price']),
                array("label"=> 'Styczeń', "y"=> $orderMonth1['price']),
                array("label"=> 'Luty', "y"=> $orderMonth0['price']),
            );
        break;
        case '3':
            $dataPointsMonths = array(
                array("label"=> 'Kwiecień', "y"=> $orderMonth11['price']),
                array("label"=> 'Maj', "y"=> $orderMonth10['price']),
                array("label"=> 'Czerwiec', "y"=> $orderMonth9['price']),
                array("label"=> 'Lipiec', "y"=> $orderMonth8['price']),
                array("label"=> 'Sierpień', "y"=> $orderMonth7['price']),
                array("label"=> 'Wrzesień', "y"=> $orderMonth6['price']),
                array("label"=> 'Październik', "y"=> $orderMonth5['price']),
                array("label"=> 'Listopad', "y"=> $orderMonth4['price']),
                array("label"=> 'Grudzień', "y"=> $orderMonth3['price']),
                array("label"=> 'Styczeń', "y"=> $orderMonth2['price']),
                array("label"=> 'Luty', "y"=> $orderMonth1['price']),
                array("label"=> 'Marzec', "y"=> $orderMonth0['price']),
            );
        break;
        case '4':
            $dataPointsMonths = array(
                array("label"=> 'Maj', "y"=> $orderMonts11['price']),
                array("label"=> 'Czerwiec', "y"=> $orderMonth10['price']),
                array("label"=> 'Lipiec', "y"=> $orderMonth9['price']),
                array("label"=> 'Sierpień', "y"=> $orderMonth8['price']),
                array("label"=> 'Wrzesień', "y"=> $orderMonth7['price']),
                array("label"=> 'Październik', "y"=> $orderMonth6['price']),
                array("label"=> 'Listopad', "y"=> $orderMonth5['price']),
                array("label"=> 'Grudzień', "y"=> $orderMonth4['price']),
                array("label"=> 'Styczeń', "y"=> $orderMonth3['price']),
                array("label"=> 'Luty', "y"=> $orderMonth2['price']),
                array("label"=> 'Marzec', "y"=> $orderMonth1['price']),
                array("label"=> 'Kwiecień', "y"=> $orderMonth0['price']),
            );
        break;
        case '5':
            $dataPointsMonths = array(
                array("label"=> 'Czerwiec', "y"=> $orderMonth11['price']),
                array("label"=> 'Lipiec', "y"=> $orderMonth10['price']),
                array("label"=> 'Sierpień', "y"=> $orderMonth9['price']),
                array("label"=> 'Wrzesień', "y"=> $orderMonth8['price']),
                array("label"=> 'Październik', "y"=> $orderMonth7['price']),
                array("label"=> 'Listopad', "y"=> $orderMonth6['price']),
                array("label"=> 'Grudzień', "y"=> $orderMonth5['price']),
                array("label"=> 'Styczeń', "y"=> $orderMonth4['price']),
                array("label"=> 'Luty', "y"=> $orderMonth3['price']),
                array("label"=> 'Marzec', "y"=> $orderMonth2['price']),
                array("label"=> 'Kwiecień', "y"=> $orderMonth1['price']),
                array("label"=> 'Maj', "y"=> $orderMonth0['price']),
            );
        break;
        case '6':
            $dataPointsMonths = array(
                array("label"=> 'Lipiec', "y"=> $orderMonth11['price']),
                array("label"=> 'Sierpień', "y"=> $orderMonth10['price']),
                array("label"=> 'Wrzesień', "y"=> $orderMonth9['price']),
                array("label"=> 'Październik', "y"=> $orderMonth8['price']),
                array("label"=> 'Listopad', "y"=> $orderMonth7['price']),
                array("label"=> 'Grudzień', "y"=> $orderMonth6['price']),
                array("label"=> 'Styczeń', "y"=> $orderMonth5['price']),
                array("label"=> 'Luty', "y"=> $orderMonth4['price']),
                array("label"=> 'Marzec', "y"=> $orderMonth3['price']),
                array("label"=> 'Kwiecień', "y"=> $orderMonth2['price']),
                array("label"=> 'Maj', "y"=> $orderMonth1['price']),
                array("label"=> 'Czerwiec', "y"=> $orderMonth0['price']),
            );
        break;
        case '7':
            $dataPointsMonths = array(
                array("label"=> 'Sierpień', "y"=> $orderMonth11['price']),
                array("label"=> 'Wrzesień', "y"=> $orderMonth10['price']),
                array("label"=> 'Październik', "y"=> $orderMonth9['price']),
                array("label"=> 'Listopad', "y"=> $orderMonth8['price']),
                array("label"=> 'Grudzień', "y"=> $orderMonth7['price']),
                array("label"=> 'Styczeń', "y"=> $orderMonth6['price']),
                array("label"=> 'Luty', "y"=> $orderMonth5['price']),
                array("label"=> 'Marzec', "y"=> $orderMonth4['price']),
                array("label"=> 'Kwiecień', "y"=> $orderMonth3['price']),
                array("label"=> 'Maj', "y"=> $orderMonth2['price']),
                array("label"=> 'Czerwiec', "y"=> $orderMonth1['price']),
                array("label"=> 'Lipiec', "y"=> $orderMonth0['price']),
            );
        break;
        case '8':
            $dataPointsMonths = array(
                array("label"=> 'Wrzesień', "y"=> $orderMonth11['price']),
                array("label"=> 'Październik', "y"=> $orderMonth10['price']),
                array("label"=> 'Listopad', "y"=> $orderMonth9['price']),
                array("label"=> 'Grudzień', "y"=> $orderMonth8['price']),
                array("label"=> 'Styczeń', "y"=> $orderMonth7['price']),
                array("label"=> 'Luty', "y"=> $orderMonth6['price']),
                array("label"=> 'Marzec', "y"=> $orderMonth5['price']),
                array("label"=> 'Kwiecień', "y"=> $orderMonth4['price']),
                array("label"=> 'Maj', "y"=> $orderMonth3['price']),
                array("label"=> 'Czerwiec', "y"=> $orderMonth2['price']),
                array("label"=> 'Lipiec', "y"=> $orderMonth1['price']),
                array("label"=> 'Sierpień', "y"=> $orderMonth0['price']),
            );
        break;
        case '9':
            $dataPointsMonths = array(
                array("label"=> 'Październik', "y"=> $orderMonth11['price']),
                array("label"=> 'Listopad', "y"=> $orderMonth10['price']),
                array("label"=> 'Grudzień', "y"=> $orderMonth9['price']),
                array("label"=> 'Styczeń', "y"=> $orderMonth8['price']),
                array("label"=> 'Luty', "y"=> $orderMonth7['price']),
                array("label"=> 'Marzec', "y"=> $orderMonth6['price']),
                array("label"=> 'Kwiecień', "y"=> $orderMonth5['price']),
                array("label"=> 'Maj', "y"=> $orderMonth4['price']),
                array("label"=> 'Czerwiec', "y"=> $orderMonth3['price']),
                array("label"=> 'Lipiec', "y"=> $orderMonth2['price']),
                array("label"=> 'Sierpień', "y"=> $orderMonth1['price']),
                array("label"=> 'Wrzesień', "y"=> $orderMonth0['price']),
            );
        break;
        case '10':
            $dataPointsMonths = array(
                array("label"=> 'Listopad', "y"=> $orderMonth11['price']),
                array("label"=> 'Grudzień', "y"=> $orderMonth10['price']),
                array("label"=> 'Styczeń', "y"=> $orderMonth9['price']),
                array("label"=> 'Luty', "y"=> $orderMonth8['price']),
                array("label"=> 'Marzec', "y"=> $orderMonth7['price']),
                array("label"=> 'Kwiecień', "y"=> $orderMonth6['price']),
                array("label"=> 'Maj', "y"=> $orderMonth5['price']),
                array("label"=> 'Czerwiec', "y"=> $orderMonth4['price']),
                array("label"=> 'Lipiec', "y"=> $orderMonth3['price']),
                array("label"=> 'Sierpień', "y"=> $orderMonth2['price']),
                array("label"=> 'Wrzesień', "y"=> $orderMonth1['price']),
                array("label"=> 'Październik', "y"=> $orderMonth0['price']),
            );
        break;
        case '11':
            $dataPointsMonths = array(
                array("label"=> 'Grudzień', "y"=> $orderMonth11['price']),
                array("label"=> 'Styczeń', "y"=> $orderMonth10['price']),
                array("label"=> 'Luty', "y"=> $orderMonth9['price']),
                array("label"=> 'Marzec', "y"=> $orderMonth8['price']),
                array("label"=> 'Kwiecień', "y"=> $orderMonth7['price']),
                array("label"=> 'Maj', "y"=> $orderMonth6['price']),
                array("label"=> 'Czerwiec', "y"=> $orderMonth5['price']),
                array("label"=> 'Lipiec', "y"=> $orderMonth4['price']),
                array("label"=> 'Sierpień', "y"=> $orderMonth3['price']),
                array("label"=> 'Wrzesień', "y"=> $orderMonth2['price']),
                array("label"=> 'Październik', "y"=> $orderMonth1['price']),
                array("label"=> 'Listopad', "y"=> $orderMonth0['price']),
            );
        break;
        case '12':
            $dataPointsMonths = array(
                array("label"=> 'Styczeń', "y"=> $orderMonth11['price']),
                array("label"=> 'Luty', "y"=> $orderMonth10['price']),
                array("label"=> 'Marzec', "y"=> $orderMonth9['price']),
                array("label"=> 'Kwiecień', "y"=> $orderMonth8['price']),
                array("label"=> 'Maj', "y"=> $orderMonth7['price']),
                array("label"=> 'Czerwiec', "y"=> $orderMonth6['price']),
                array("label"=> 'Lipiec', "y"=> $orderMonth5['price']),
                array("label"=> 'Sierpień', "y"=> $orderMonth4['price']),
                array("label"=> 'Wrzesień', "y"=> $orderMonth3['price']),
                array("label"=> 'Październik', "y"=> $orderMonth2['price']),
                array("label"=> 'Listopad', "y"=> $orderMonth1['price']),
                array("label"=> 'Grudzień', "y"=> $orderMonth0['price']),
            );
        break;
    }

/*
    $dataPointsMonths = array(
        array("label"=> 'Styczeń', "y"=> $orderMonth0['price']),
        array("label"=> 'Luty', "y"=> $orderMonth1['price']),
        array("label"=> 'Marzec', "y"=> $orderMonth2['price']),
        array("label"=> 'Kwiecień', "y"=> $orderMonth3['price']),
        array("label"=> 'Maj', "y"=> $orderMonth4['price']),
        array("label"=> 'Czerwiec', "y"=> $orderMonth5['price']),
        array("label"=> 'Lipiec', "y"=> $orderMonth6['price']),
        array("label"=> 'Sierpień', "y"=> $orderMonth7['price']),
        array("label"=> 'Wrzesień', "y"=> $orderMonth8['price']),
        array("label"=> 'Październik', "y"=> $orderMonth9['price']),
        array("label"=> 'Listopad', "y"=> $orderMonth10['price']),
        array("label"=> 'Grudzień', "y"=> $orderMonth11['price']),
    );
 */
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

<script>
    window.onload = function() {
     
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2", // "light1", "light2", "dark1", "dark2"
        title:{
            text: "Sprzedaż w ciągu ostatnich 7 dni"
        },
        axisY: {
            includeZero: true,
            prefix: "",
            suffix:  "zł"
        },
        data: [{
            type: "bar",
            yValueFormatString: "## ### ###zł",
            indexLabel: "{y}",
            indexLabelPlacement: "inside",
            indexLabelFontColor: "black",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
    var chartMonths = new CanvasJS.Chart("chartContainerMonths", {
        animationEnabled: true,
        theme: "light2", // "light1", "light2", "dark1", "dark2"
        title:{
            text: "Sprzedaż w ciągu ostatnich 12 miesięcy"
        },
        axisY:{
            includeZero: true
        },
        data: [{
            type: "column", //change type to bar, line, area, pie, etc
            indexLabel: "{y}", //Shows y value on all Data Points
            yValueFormatString: "## ### ###zł",
            indexLabelFontColor: "black",
            indexLabelPlacement: "inside",   
            dataPoints: <?php echo json_encode($dataPointsMonths, JSON_NUMERIC_CHECK); ?>
        }]
    });

    chart.render(); 
    chartMonths.render();
     
    }
</script>

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
            
            <h2 class="mt-3 mb-5 text-center">
            <i class="fas fa-minus text-danger"></i> Zestawienie sprzedaży <i class="fas fa-minus text-danger"></i>
            </h2>

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
               
               <!-- Ostatnie 7 dni -->
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

            <div id="chartContainerMonths" style="height: 370px; width: 100%;" class="mt-5"></div>
    
    </div>
</section>

    <script src="{{ asset('public/js/indexJs.js')}}"></script>

</body>

</html>