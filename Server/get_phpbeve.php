<?php
include('connect.php');

$connect->prepare("SELECT * FROM products");

$store->execute();

$beverages = $store->get_result();
