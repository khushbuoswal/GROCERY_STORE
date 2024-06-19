<?php
include('connect.php');

$connect->prepare("SELECT * FROM products Where category = 'Fresh'");

$store->execute();

$protein = $store->get_result();