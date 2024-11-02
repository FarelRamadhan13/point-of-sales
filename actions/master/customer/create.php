<?php 

require '../../../system/action.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
     useQuery("customer.php");

     create();
}

redirect('/master/customer/index');