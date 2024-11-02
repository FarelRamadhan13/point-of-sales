<?php  

require '../../../system/action.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    useQuery("customer.php");

    update($_POST);
}

redirect('/master/customer/index');