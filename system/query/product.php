<?php  


function findAll()
{
     return db->query('SELECT p.id, p.name, c.name as category, p.price, p.quantity 
                        FROM products p 
                        JOIN categories c ON p.category_id = c.id');
}

function single ($id) {
    $single = db->prepare("SELECT * FROM products WHERE id = :id");
    $single->execute([
        'id' => $id
    ]);
    return $single->fetch(PDO::FETCH_ASSOC);
}

function create()
{
     $create = db->prepare("INSERT INTO products (id, category_id, name, price, quantity)
                                VALUES (:id, :category_id, :name, :price, :quantity)");
     $create->execute([
         "id" => $_POST['id'],
         "category_id" => $_POST['category_id'],
         "name" => $_POST['name'],
         "price" => $_POST['price'],
         "quantity" => $_POST['quantity']
     ]);
}

function delete ($id) {
    $delete = db->prepare("DELETE FROM products WHERE id = :id");
    $delete->execute([
        'id' => $id
    ]);
}

function update ($data) {
    $idOri = $data['id'];
    $id = $data['edit_id'];
    $name = $data['name'];
    $category = $_POST['category_id'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $update = db->prepare("UPDATE products 
                            SET id = :id, 
                                category_id = :category_id,
                                name = :name,
                                price = :price,
                                quantity = :quantity
                           WHERE id = '$idOri'");
    $update->execute([
        'id' => $id,
        'category_id' => $category,
        'name' => $name,
        'price' => $price,
        'quantity' => $quantity
    ]); 
}
