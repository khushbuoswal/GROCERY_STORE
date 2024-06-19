<?php
include('connect.php');

$connect->prepare("SELECT * FROM products Where category = 'Frozen'");

$store->execute();

$plantable = $store->get_result();