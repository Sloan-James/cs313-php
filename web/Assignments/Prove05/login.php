<?php

$user = $_POST["username"];

$statement = $db->query('SELECT username, password FROM users');

