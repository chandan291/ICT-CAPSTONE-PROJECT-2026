<?php
$host = "db.harqxvgoeokhlepiaonz.supabase.co";
$port = "5432";
$dbname = "postgres";
$user = "postgres";
$password = "KIT300SESProject";


try {

    $pdo = new PDO(
        "pgsql:host=$host;port=$port;dbname=$dbname;sslmode=require",
        $user,
        $password
    );


    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );


    echo "Database Connected";


} catch (PDOException $e) {

    die("Database connection failed: " . $e->getMessage());

}

?>