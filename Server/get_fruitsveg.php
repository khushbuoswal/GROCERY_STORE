<?php
include('connect.php');

$connect->prepare("SELECT * FROM  products Where category = 'Fresh'");

$store->execute();

$fruitsveg = $store->get_result();