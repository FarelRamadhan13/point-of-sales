<?php  
require '../../../system/action.php';

$id = $_GET['id'];

if (isset($id)) {

    useQuery('customer.php');
    delete($id);

}

redirect('/master/customer/index');
