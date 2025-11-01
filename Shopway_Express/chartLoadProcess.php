<?php

session_start();

require "connection.php";

$rs = Database::search("SELECT product.product_id, product.title,SUM(invoice.qty) AS total_sold FROM `invoice` INNER JOIN `product` ON invoice.product_product_id = product.product_id
GROUP BY product.product_id,product.title ORDER BY total_sold DESC LIMIT 5");

$num = $rs->num_rows;

$labels = array();
$data = array();

for($i = 0; $i < $num; $i++){
$d = $rs->fetch_assoc();

$labels[] = $d["title"];
$data[] = $d["total_sold"];
}

$json = array();
$json["labels"] = $labels;
$json["data"] = $data;

echo json_encode($json);

?>