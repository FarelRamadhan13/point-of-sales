<?php 

require '../../../system/action.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
     useQuery("admin.php");

     create();
}

redirect('/master/admin/index');