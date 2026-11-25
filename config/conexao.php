<?php

try{

  $conexao = new PDO("mysql:host=127.0.0.1;dbname=db_estoquefacil; charset=utf8", "root", "");

}catch(PDOException $erro){

  die("Erro na conexão");

}



?>