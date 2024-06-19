<?php
include('connect.php');

$connect->prepare("SELECT * FROM products Where category = 'Fresh'");

$store->execute();

$dairy = $store->get_result();