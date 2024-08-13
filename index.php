

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-9 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h4>Php  Code</h4>
                    </div>
                    <div class="card-body">
                    <center>
                    <?php
$array = [1, 2, 3, 4, 5];
$newArray = [];
// for ($i = 0; $i < count($array) - 2; $i++) {
//     $newArray[] = $array[$i];
// }
for($i=2; $i<count($array); $i++){
    $newArray[]=$array[$i]; 
}

$cars=array("Volvo","BMW","Toyota","Honda","Mercedes","Opel");
echo '<pre>'; 
print_r(array_chunk($cars,2));


echo '</pre>'; 
?>
                    </center>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <?php
    
    
   
    
    
    
    ?>


    <script type="text/javascript">
       
    </script>
</body>
</html>