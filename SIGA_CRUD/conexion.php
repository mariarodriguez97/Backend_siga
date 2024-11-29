<?php

try{
    $dsn='mysql:host=localhost;dbname=siga;port=3306';
    $username= 'root';
    $password= '';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,  
        PDO::ATTR_EMULATE_PREPARES => false,  
    ];

    $pdo=new PDO($dsn, $username, $password, $options);
    echo "Felicitaciones. Conexión Exitosa";
} catch(PDOException $e){
    echo "Error de Conexión, por favor reintente". $e->getMessage();
    exit;
}
?>