<?php  
require '../../../system/action.php';

$id = $_GET['id'];

if (isset($id)) {

    useQuery('category.php');
    Category\delete($id);

}

redirect('/master/category/index');
