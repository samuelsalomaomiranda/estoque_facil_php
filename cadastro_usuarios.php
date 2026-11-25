<?php

include "config/conexao.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$senha = password_hash($senha, PASSWORD_DEFAULT);

$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$resultado = $conexao->query($sql);

if ($resultado->rowCount() > 0){
    echo "E-mail já cadastrado!";
} else {
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
    }
    
if ($conexao->query($sql)) {
    echo "Usuário cadastrado com sucesso!";
    echo "<br><a href='login.html'>Clique aqui para fazer login</a></br>";
} else {
    echo "Erro ao cadastrar usuário: ";
}
?>

