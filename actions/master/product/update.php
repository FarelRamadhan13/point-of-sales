<?php  

require '../../../system/action.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    useQuery("product.php");

    update($_POST);
}

redirect('/master/product/index');
