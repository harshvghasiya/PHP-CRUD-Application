<?php
session_start();
session_destroy();
header("Location:/p2/politics.php?page=1");

?>