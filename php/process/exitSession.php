<?php
session_destroy();
unset($_SESSION['id']);
unset($_SESSION['tp']);
header('Location: ../../index.php');
exit;

