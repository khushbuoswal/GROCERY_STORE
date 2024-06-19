<?php
include('connect.php');

$connect->prepare("SELECT * FROM products Where category = 'Pet Food'");

$store->execute();

$canned = $store->get_result();
