<?php 

function revenue () {
    return db->query("SELECT SUM(total) as revenue FROM orders_detail")->fetch(PDO::FETCH_ASSOC);
}

function topProduct () {
    return db->query("SELECT p.name as product, SUM(od.quantity) as quantity
                        FROM orders_detail od
                        JOIN products p ON od.product_id = p.id
                        GROUP BY p.name
                        HAVING SUM(od.quantity) = (
                            SELECT MAX(q)
                            FROM (
                                SELECT SUM(quantity) q
                                FROM orders_detail
                                GROUP BY product_id
                                ) q
                        )")->fetch(PDO::FETCH_ASSOC);
}

function soldProduct () {
    return db->query("SELECT SUM(quantity) as amount FROM orders_detail")->fetch(PDO::FETCH_ASSOC);
}

function soldPerProducts () {
    return db->query("SELECT p.name, SUM(od.total) as total, SUM(od.quantity) as quantity 
                        FROM orders_detail od
                        JOIN products p ON od.product_id = p.id
                        GROUP BY p.name")->fetchAll(PDO::FETCH_ASSOC);
}


function maxTransaction () {
    return db->query("SELECT COUNT(id) as total, DATE(created_at) as date
                        FROM orders
                        GROUP BY date
                        HAVING total = (SELECT MAX(totransa) 
                                            FROM (SELECT COUNT(id) as totransa 
                                                    FROM orders GROUP BY DATE(created_at)) as totransa)"
                    )->fetch(PDO::FETCH_ASSOC);
}


function todayTransaction () {
    return db->query("SELECT COUNT(id) as total, DATE(created_at) as date
                        FROM orders
                        GROUP BY date
                        HAVING date = CURRENT_DATE")->fetch(PDO::FETCH_ASSOC);
}


function maxProduct () {
    return db->query("SELECT DATE(o.created_at) as date, sum(od.quantity) as total
                        FROM orders_detail od
                        JOIN orders o ON od.order_id = o.id
                        GROUP BY date
                        HAVING total = (SELECT MAX(qty) 
                                            FROM (SELECT SUM(od.quantity) as qty
                                                    FROM orders_detail od 
                                                    JOIN orders o ON od.order_id = o.id
                                                    GROUP BY DATE(o.created_at)) as qty)")->fetch(PDO::FETCH_ASSOC);
}

function todayProduct () {
    return db->query("SELECT DATE(o.created_at) as date, sum(od.quantity) as total
                        FROM orders_detail od
                        JOIN orders o ON od.order_id = o.id
                        GROUP BY date
                        HAVING date = CURRENT_DATE")->fetch(PDO::FETCH_ASSOC);
}