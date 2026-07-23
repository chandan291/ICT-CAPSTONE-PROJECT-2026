<?php

$host = "db.harqxvgoeokhlepiaonz.supabase.co";
$port = "5432";
$dbname = "postgres";
$user = "postgres";
$password = "KIT300SESProject";


try {

    $conn = new PDO(
        "pgsql:host=$host;port=$port;dbname=$dbname",
        $user,
        $password
    );

    $conn->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );


    echo "Database Connected";


} catch(PDOException $e){

    echo "Connection failed: " . $e->getMessage();

}

?>