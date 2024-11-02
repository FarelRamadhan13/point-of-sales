<?php  
namespace Category;

function findAll()
{
     return db->query('SELECT * FROM categories');
}

function single ($id) {
    $single = db->prepare("SELECT * FROM categories WHERE id = :id");
    $single->execute([
        'id' => $id
    ]);
    return $single->fetch(\PDO::FETCH_ASSOC);
}

function create()
{
     $create = db->prepare("INSERT INTO categories (id,name) values (:id,:name)");
     $create->execute([
         "id" => $_POST['id'],
          "name" => $_POST['name'],
     ]);
}

function delete ($id) {
    $delete = db->prepare("DELETE FROM categories WHERE id = :id");
    $delete->execute([
        'id' => $id
    ]);
}

function update ($data) {
    $idOri = $data['id'];
    $id = $data['edit_id'];
    $name = $data['name'];

    $update = db->prepare("UPDATE categories SET id = :id, name = :name WHERE id = '$idOri'");
    $update->execute([
        'id' => $id,
        'name' => $name
    ]); 
}
