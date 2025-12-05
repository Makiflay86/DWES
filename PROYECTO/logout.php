<?php

include "establecer-sesion.php";
$_SESSION = [];
session_destroy();

/* Habría que destruir explicitamente la cookie de sesión y otras cookies potencialmente peligrosas */

header("Location:./index.php");