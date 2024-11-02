<?php  

require '../../../system/action.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    useQuery("category.php");

    Category\update($_POST);
}

redirect('/master/category/index');
