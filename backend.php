<?php
//require_once 'config.php';
//CONFIGURAÇÕS DE CREDENCIAIS
$server = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'carros_forsale';

//CONEXAO COM BANCO DE DADOS 
$conn = new mysqli($server, $usuario, $senha, $banco);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
//PEGANDO OS DADOS VINDOS DO FORMULÁRIO
$titulo = $_POST['titulo'];
$valor = $_POST['valor'];
$descricao = $_POST['descricao'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$kilometragem = $_POST['kilometragem'];
//$data_compra = $_POST['data-compra'];
$cambio = $_POST['type-cambio'];
$opcoes_extra = $_POST['options-extra'];
//$data_atual = date('d/m/Y'); 
//$hora_atual = date('H:i:s');  

//PREPARAR COMANDO PARA TABELA
$smtp = $conn->prepare("INSERT INTO anuncios (_titulo, _valor, _descricao, _marca, _modelo, _kilometragem, _cambio, _opcoes_extra) VALUES (?,?,?,?,?,?,?,?)");
$smtp->bind_param("ssssssss", $titulo, $valor, $descricao, $marca, $modelo, $kilometragem, $cambio, $opcoes_extra);
//SE EXECUTAR CORRETAMENTE
if($smtp->execute()){
  echo "dados salvos com sucesso!";
}else{
  echo "Erro no envio dos dados: ".$smtp->error;
}
$smtp->close();
//$conn->clone();
?>
