<?php

include "../Classes/database.php";
include "../Classes/set.php";
include "../Classes/session.php";


$Session = Session::findActiveSession();

//checkt voor sessie
if ($Session == null) {

    header("Location: ../index.php");
    exit;
}

//checkt of er een ID is en haalt gegevens van set op
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $set = set::getSet($id);
}
else if ($set == null) {
    header("Location:admin.php?message= Geen set gevonden");
    exit;
}

//verwijdert de set
set::delete($set->id);
header("Location: admin.php?message= Product successvol verwijderd");
exit;
?>