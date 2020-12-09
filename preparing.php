<?php

    // get sort if selected
    !isset($_GET['bySort']) ? : sortBy($_GET['bySort']);


    $page = ! empty( $_GET['page'] ) ? (int) $_GET['page'] : 1;
    $total = count( $fruit ); //total items in array    
    $limit = 3; //per page    
    $totalPages = ceil( $total/ $limit ); //calculate total pages
    $page = max($page, 1); //get 1 page when $_GET['page'] <= 0
    $page = min($page, $totalPages); //get last page when $_GET['page'] > $totalPages
    $offset = ($page - 1) * $limit;
    if( $offset < 0 ) $offset = 0;

    // generate array values based on limit per page
    $fruit = array_slice( $fruit, $offset, $limit );
    $weight = array_slice( $weight, $offset, $limit );
    $price = array_slice( $price, $offset, $limit );

?>