<DOCTYPE html>
<html>
    <head>

    </head>

    <body>
    <?php
    $month = "06";
    $date = "04";
    $year = "2002";

    echo $month." / ".$date." / ".$year;
    echo "<br>";

    if($date % 2 == 0){
        echo "even";    
    }
    else{
        echo "odd";
    }
?>
   </body>
</html>