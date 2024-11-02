<?php  

function findAllProduct()
{
     return db->query("SELECT p.id, p.name, c.name as category, p.price, p.quantity 
                        FROM products p 
                        JOIN categories c ON p.category_id = c.id");
}

function findAllCustomer() {
    return db->query('SELECT * FROM customers');
}

function findAdmin ($name) {
    $single = db->prepare("SELECT * FROM admins WHERE name = :name");
    $single->execute([
        'name' => $name
    ]);
    return $single->fetch(PDO::FETCH_ASSOC);
}

function insertOrder ($data) {
    $customer_id = $data['customer'];
    $admin_id = $data['admin'];
    $total = $data['total'];

    $order = db->prepare("INSERT INTO orders(customer_id, admin_id, total)
                VALUES(:customer_id, :admin_id, :total)");

    $order->execute([
        'customer_id' => $customer_id,
        'admin_id' => $admin_id,
        'total' => $total
    ]);
}

function insertOrderDetail ($data) {
    $order_id = $data['order_id'];
    $product_id = $data['product_id'];
    $quantity = intval($data['quantity']);
    $price = $data['price'];
    $total = $data['total'];

    $order = db->prepare("INSERT INTO orders_detail(order_id, product_id, quantity, price, total)
                VALUES(:order_id, :product_id, :quantity, :price,  :total)");

    $product = db->prepare("UPDATE products SET quantity = quantity - :quantity WHERE id = :product_id");

    $product->execute([
        'product_id' => $product_id,
        'quantity' => $quantity
    ]);

    $order->execute([
        'order_id' => $order_id,
        'product_id' => $product_id,
        'quantity' => $quantity,
        'price' => $price,
        'total' => $total
    ]);
}

function reports () {
    return db->query("SELECT DISTINCT DATE(o.created_at) as date, a.name, SUM(od.total) as total, COUNT(DISTINCT od.order_id) as transaction, SUM(od.quantity) as quantity
                        FROM orders_detail od
                        JOIN orders o ON od.order_id = o.id
                        JOIN admins a ON o.admin_id = a.id
                        GROUP BY date, a.name
                        ORDER BY date ASC");
}

function reportDetail ($date) {
    $report = db->prepare("SELECT DISTINCT DATE(o.created_at) as date, a.name, SUM(od.total) as total, COUNT(distinct od.order_id) as transaction, SUM(od.quantity) as quantity
                        FROM orders_detail od
                        JOIN orders o ON od.order_id = o.id
                        JOIN admins a ON o.admin_id = a.id
                        WHERE DATE(o.created_at) = :date
                        GROUP BY date, a.name");
    $report->execute([
        'date' => $date
    ]);

    return $report->fetch(PDO::FETCH_ASSOC);
}

function orderDetail ($date) {
    $orderDetail = db->prepare("SELECT p.name, od.price, SUM(od.quantity) as quantity, SUM(od.total) as total
                            FROM orders_detail od
                            JOIN products p ON od.product_id = p.id
                            JOIN orders o ON od.order_id = o.id
                            WHERE DATE(o.created_at) = '$date'
                            GROUP BY DATE(o.created_at), p.name, od.price");
    $orderDetail->execute();

    return $orderDetail->fetchAll(PDO::FETCH_ASSOC);
}




// funtion totalRevenue() {

// }