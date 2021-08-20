<?php
session_start();
include_once("conexao.php");

$usu_codigo = $_GET['codigo'];
echo $usu_codigo;

$result_usuario = "DELETE FROM pessoas WHERE cod_pessoa = '$usu_codigo'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if ($result_usuario) {
  echo "
    <script> 
      location.href='pesquisa.php'; 
      alert('Usuário deletado com sucesso!');
    </script>";
} else
  echo "
    <script>
      location.href='pesquisa.php';
      alert('Não foi possível deletar o usuário.'); 
    </script>";
