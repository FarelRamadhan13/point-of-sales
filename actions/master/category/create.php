<?php 

require '../../../system/action.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
     useQuery("category.php");

     Category\create();
}

redirect('/master/category/index');