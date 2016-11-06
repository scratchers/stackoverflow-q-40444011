<?php
return (function(){
    $hostname = 'localhost';
    $database = 'mei_DV59j8';
    $username = 'mei_DV59j8_A';
    $password = '[2,q3k{$cwdeavhp_niJR`1F9M5YZ~ai';

    $pdo = new PDO("mysql:host=$hostname;
        charset=UTF8;
        dbname=$database",
        $username,
        $password
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
})();
