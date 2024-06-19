<?php
include('connect.php');

$connect->prepare("SELECT * FROM products Where category = 'Pet Food'");

$store->execute();

$dry = $store->get_result();