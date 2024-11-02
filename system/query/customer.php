<?php  


function findAll()
{
     return db->query('SELECT * FROM customers');
}

function single ($id) {
    $single = db->prepare("SELECT * FROM customers WHERE id = :id");
    $single->execute([
        'id' => $id
    ]);
    return $single->fetch(PDO::FETCH_ASSOC);
}

function create()
{
     $create = db->prepare("INSERT INTO customers (name,email) values (:name,:email)");
     $create->execute([
          "name" => $_POST['name'],
          "email" => $_POST['email'],
     ]);
}

function delete ($id) {
    $delete = db->prepare("DELETE FROM customers WHERE id = :id");
    $delete->execute([
        'id' => $id
    ]);
}

function update ($data) {
    $id = $data['id'];
    $name = $data['name'];
    $email = $data['email'];

    $update = db->prepare("UPDATE customers SET name = :name, email = :email WHERE id = :id");
    $update->execute([
        'id' => $id,
        'name' => $name,
        'email' => $email
    ]); 
}
