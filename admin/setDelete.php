<?php

include "../Classes/database.php";
include "../Classes/set.php";
include "../Classes/session.php";


$Session = Session::findActiveSession();

if ($Session == null) {

    header("Location: ../index.php");
    exit;
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $set = set::getSet($id);
}

if ($set == null) {
    echo "Geen gevonden";
}
set::delete($set->id);
header("Location: admin.php");
exit;
?>