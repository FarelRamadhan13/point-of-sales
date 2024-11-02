<?php  
require '../../../system/action.php';

$id = $_GET['id'];

if (isset($id)) {

    useQuery('admin.php');
    delete($id);

}

redirect('/master/admin/index');
