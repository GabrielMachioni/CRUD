<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Aviso</title>
</head>

<body>

  <?php
  include "conexao.php";

  $nome = $_POST['nome'];
  $endereco = $_POST['endereco'];
  $telefone = $_POST['telefone'];
  $email = $_POST['email'];
  $data_nascimento = $_POST['data_nascimento'];

  $sql = "INSERT INTO `pessoas`(`nome`, `endereco`, `telefone`, `email`, `data_nascimento`) VALUES ('$nome','$endereco','$telefone','$email','$data_nascimento')";

  if (mysqli_query($conn, $sql)) {
    echo "
    <div class='box-aviso'>
      <span class='aviso' >$nome cadastrado com sucesso!</span>
    </div>";
  } else
    echo "
    <div class='box-aviso-2'>
      <span class='aviso-2' >$nome NÃO foi cadastrado!</span>
    </div>";

  ?>
  <div class="btn-2">
    <button class="botao_voltar">
      <a href="index.html">voltar</a>
    </button>
  </div>
  
</body>

</html>