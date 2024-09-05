<?php

include "../Classes/database.php";
include "../Classes/blog.php";
include "../Classes/sessie.php";


$Sessie = Session::findActiveSession();

if ($Session = null) {

    header("../index.php");
    exit;
}

$id = $_GET['id'];



$set = set::getSet($id);

if ($set == null) {
    echo "Geen gevonden";
}


$set->delete();
header("Location: admin.php");
