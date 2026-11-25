<?php

include "config/conexao.php";

$nome = $_POST['nome'];
$categoria = $_POST['categoria'];
$preco = $_POST['preco'];
$qtd = $_POST['quantidade'];

$nomeImagem = null;

  if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
  $extensoesPermitidas = ['jpg', 'jpeg', 'png', 'webp'];
  $extensao = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));

  if (!in_array($extensao, $extensoesPermitidas)) {
        die("Erro: Extensão de arquivo não permitida. Apenas JPG, JPEG, PNG e WEBP são aceitos.");
    }

  if ($_FILES['imagem']['size'] > 2 * 1024 * 1024) {
        die("Erro: imagem muito grande. O tamanho máximo é de 2MB.");
    }
  

    $nomeImagem = uniqid("produto_"). "." . $extensao;
    if (!move_uploaded_file($_FILES['imagem']['tmp_name'], "uploads/" . $nomeImagem)) {
          die("Erro ao fazer upload da imagem.");
      }

}

$sql = "INSERT INTO tb_produtos (nome, qtd, categoria, preco, imagem) VALUES ('$nome', '$qtd', '$categoria', '$preco', '$nomeImagem')";

if($conexao->query($sql)) {
  echo "Produto cadastrado com sucesso!";
}
else {
  echo "Erro ao cadastrar produto: ";
}
echo "<a href='cadastrar.html'>Voltar</a>";

?>