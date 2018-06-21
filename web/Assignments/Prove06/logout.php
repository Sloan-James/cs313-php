<?php
unset($_COOKIE["user"]);
setcookie("user","",time() - 3600);
header("Location: Prove06.php");

