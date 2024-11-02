<?php  


function findByEmail($email) {
    $admin = db->prepare("SELECT * FROM admins WHERE email = :email");
    $admin->execute([
        'email' => $email
    ]);
    return $admin->fetch(PDO::FETCH_ASSOC);
}

function findAll()
{
     return db->query('SELECT * FROM admins');
}

function single ($id) {
    $single = db->prepare("SELECT * FROM admins WHERE id = :id");
    $single->execute([
        'id' => $id
    ]);
    return $single->fetch(PDO::FETCH_ASSOC);
}

function create()
{
     $create = db->prepare("INSERT INTO admins (name,email,password) values (:name,:email,:password)");
     $create->execute([
          "name" => $_POST['name'],
          "email" => $_POST['email'],
          "password" => md5($_POST['password']),
     ]);
}

function delete ($id) {
    $delete = db->prepare("DELETE FROM admins WHERE id = :id");
    $delete->execute([
        'id' => $id
    ]);
}

function update ($data) {
    $id = $data['id'];
    $name = $data['name'];
    $email = $data['email'];

    $update = db->prepare("UPDATE admins SET name = :name, email = :email WHERE id = :id");
    $update->execute([
        'id' => $id,
        'name' => $name,
        'email' => $email
    ]);
}
