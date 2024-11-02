<?php  

require '../../../system/action.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    useQuery("admin.php");

    update($_POST);
}

redirect('/master/admin/index');