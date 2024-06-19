<?php
include('connect.php');

$connect->prepare("SELECT * FROM products Where category = 'Frozen'");

$store->execute();

$nonplantable = $store->get_result();