<?php 

require '../../../system/action.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
     useQuery("product.php");

     create();
}

redirect('/master/product/index');