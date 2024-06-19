<?php
include('connect.php');

$connect->prepare("SELECT * FROM products Where category = 'Household Goods'");

$store->execute();

$cooking = $store->get_result();
