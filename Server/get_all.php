<?php
include('connect.php');

$connect->prepare("SELECT * FROM products");

$store->execute();

$all = $store->get_result();
