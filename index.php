<?php

include_once 'product_functions.php';
include 'preparing.php';

?>

<html>
    <head>
        <title>Pagination</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    </head>
    <body>


        <a href="index.php?page=1&bySort=name">name</a>
        <a href="index.php?page=1&bySort=weight">weight</a>
        <a href="index.php?page=1&bySort=price">price</a>


        <div class="table-responsive" style="width: 600px; border: 1px solid black; margin: 10px;">
            <table class="table table-striped" class="table table-hover">
                <thead class="table-info">
                 <th scope="col" class="bg-primary">Fruit</th>
                 <th scope="col" class="bg-primary">Weight</th>
                 <th scope="col" class="bg-primary">Price</th>
                </thead>
                <tbody>
                <?php 
                    for($i = 0; $i < count($fruit); $i++) { 
                        echo '<tr>';
                        echo '<td>'.$fruit[$i].'</td>';
                        echo '<td>'.$weight[$i].'</td>';
                        echo '<td>'.$price[$i].'</td>';
                        echo '</tr>';
                    }
                 ?>
                </tbody>
            </table>

           <center><?php paginate($totalPages, $page); ?></center> 


        </div> 


     
    

 
    </body>
</html>