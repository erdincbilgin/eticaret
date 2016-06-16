<?php

include 'db.php';


include 'classes.php';

$obj = new Functions() ;
$obj -> $_GET['prs']($db);



?>