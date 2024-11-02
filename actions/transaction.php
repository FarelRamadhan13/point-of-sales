<?php  

require '../system/action.php';

if($_SERVER['REQUEST_METHOD']=='POST' && count($_POST) != 4){
    var_dump($_POST);
     useQuery("transaction.php");

     insertOrder($_POST);

     $_POST['order_id'] = db->lastInsertId();

     for ($i=0; $i < count($_POST['product_id']); $i++) { 
        $data = [
            'order_id' => $_POST['order_id'],
            'product_id' => $_POST['product_id'][$i],
            'quantity' => $_POST['quantity'][$i],
            'price' => $_POST['price'][$i],
            'total' => $_POST['price'][$i] * $_POST['quantity'][$i]
        ];
         insertOrderDetail($data);
     }
}

redirect('/transaction/laporan');