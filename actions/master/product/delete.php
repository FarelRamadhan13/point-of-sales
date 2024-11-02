<?php  
require '../../../system/action.php';

$id = $_GET['id'];

if (isset($id)) {

    useQuery('product.php');
    delete($id);

}

redirect('/master/product/index');
