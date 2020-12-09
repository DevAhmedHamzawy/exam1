<?php 

// Init Required Arrays
$fruit = array('Apple', 'Papaya', 'Banana', 'Orange', 'Mango', 'Watermelon', 'Kiwi', 'Cherry', 'Mandarin');
$weight = array(500, 750, 500, 1000, 250, 600, 900, 1000, 800);
$price = array(1, 1.50, 1.20, 1.40, 2, 1.70, 1.30, 2.10, 2.50);


// Generate Pagination Links & Pages
function paginate($totalPages, $page){


    // get By Sort
    !isset($_GET['bySort']) ? $link = 'index.php?page=%d' : $link = 'index.php?page=%d&bySort='.$_GET['bySort'] ;

    // open pagination link
    $pagerContainer = '<ul class="pagination">';
    if($totalPages != 0) {
        // create the next , previous and current page

        // previous page link
        if($page == 1) { $pagerContainer .= ''; } 
        else { $pagerContainer .= sprintf( '<li><a href="' . $link . '"> &#171; prev page</a></li>', $page - 1 ); }

        // current page
        $pagerContainer .= ' <span> page <strong>' . $page . '</strong> from ' . $totalPages . '</span>'; 

        // next page link
        if($page == $totalPages) { $pagerContainer .= ''; }
        else { $pagerContainer .= sprintf( '<li><a href="' . $link . '"> next page &#187; </a></li>', $page + 1 ); }           
    }                   


    // create all pages
    for ($i=1; $i <= $totalPages ; $i++) {
        // check if current page to activate or not 
        if($i == $page){ $pagerContainer .= sprintf( '<li><a href="' . $link . '" class="active">'. $i .'</a></li>', $i ); }
        else{$pagerContainer .= sprintf( '<li><a href="' . $link . '" style="color: #c00">'. $i .'</a></li>', $i ); }
    }


    // close pagination class
    $pagerContainer .= '</ul>';


    // generate in index
    echo $pagerContainer;
}




function sortBy($theSort)
{
    // get By Sort Name then sort the 3 arrays
    switch ($theSort) {
        case 'name':
            $array = array_multisort($GLOBALS['fruit'], $GLOBALS['weight'], $GLOBALS['price']);
            var_dump($array);
            break;

        case 'price':
            $array = array_multisort($GLOBALS['price'], $GLOBALS['fruit'], $GLOBALS['weight']);
            var_dump($array);
            break;

        case 'weight':
            $array = array_multisort($GLOBALS['weight'], $GLOBALS['fruit'], $GLOBALS['price']);
            var_dump($array);
            break;
    }
}
