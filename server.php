<?php
    try {
        $con = new PDO("mysql:host=localhost;dbname=lixdb");
    } catch (\Throwable $th) {
        //throw $th;
    }
?>