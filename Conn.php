<?php
    define("DB_SERVER",  'localhost:3306') ;
    define("DB_DATABASE",  'tour') ;
    define("DB_USER",  'suman') ;
    define("DB_PASSWORD",  'Suman@9040') ; 
    
    // Create connection
    $conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
?>