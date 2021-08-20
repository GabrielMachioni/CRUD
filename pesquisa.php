<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Pesquisar</title>

</head>


<body>

  <?php

  $pesquisa = $_POST['busca'] ?? '';

  include "conexao.php";

  $sql = "SELECT * FROM pessoas WHERE nome LIKE '%$pesquisa%'";

  $dados = mysqli_query($conn, $sql);
  ?>

  <div class="content-pesquisar">
    <h1 class="titulo-pesquisar">Pesquisar</h1>
    <form action="pesquisa.php" method="POST">
      <input class="input-pesquisar" type="search" placeholder="Nome" aria-label="Search" name="busca" autofocus>
      <button class="btn-pesquisar" type="submit">Pesquisar</button>
    </form>
    <br>
    <table class="table" border="1">
      <thead>
        <tr>
          <th class="space-content" scope="col">Nome</th>
          <th scope="col">Endereço</th>
          <th scope="col">Telefone</th>
          <th scope="col">Email</th>
          <th scope="col">Data de Nascimento</th>
          <th scope="col">Funçoes</th>
        </tr>
      </thead>

      <tbody>
        <?php
        while ($linha = mysqli_fetch_assoc($dados)) {
          $cod_pessoa = $linha['cod_pessoa'];
          $nome = $linha['nome'];
          $endereco = $linha['endereco'];
          $telefone = $linha['telefone'];
          $email = $linha['email'];
          $data_nascimento = $linha['data_nascimento'];
          $data_nascimento = mostra_data($data_nascimento);

          echo  "<tr>
                  <th scope='row'>$nome</th>
                  <td class='space-content-2'>$endereco</td>
                  <td >$telefone</td>
                  <td >$email</td>
                  <td >$data_nascimento</td>
                  <td>
                    <button class='btn_excluir'><a href='excluir.php?codigo=$cod_pessoa'>Excluir</a></button>
                  </td>
              </tr>";
        }
        ?>

      </tbody>
    </table>
  </div>

  <div class="btn-2">
    <button class="botao_voltar">
      <a href="index.html">Voltar</a>
    </button>
  </div>

</body>

</html>