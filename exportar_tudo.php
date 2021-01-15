<?php
# ---------------------------------------------------------------- #
# Script:        exportar_tudo.php
# Description:   responsavel por fazer um select na tabela tabela
# Written by	 vanderson.lima/antonio.silva
# Date:			 12.01.2021
#            	 Grupo Vicoa Brasil
# ---------------------------------------------------------------- #


#DECLARANDO OS TIPOS DE CABECALHOS DO ARQUIVO
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=export_all.csv');

#CRIANDO O CONTROLE DE SAIDA PARA O ARQUIVO DE EXPORTACAO
$output = fopen('php://output', 'w');

#DECLARANDO AS COLUNAS DO ARQUIVO
fputcsv($output, array('Nome', 'Telefone1', 'Email', 'RG', 'CPF', 'CTPS', 'PIS', 'Nascimento', 
					   'Nome da Mãe', 'Nome do Pai', 'Banco', 'Cod Agencia', 'Num Conta', 'Salario Familia', 
					   'Nacionalidade', 'Naturalidade', 'Logradouro', 'Bairro', 'Numero', 'CEP'), ';');

#IMPORTA O ARQUIVO DE CONFIGURACAO
require_once "config.php";

#CRIA A STRING DE CONEXAO
$sql = "SELECT nome, telefone1, email, rg, cpf, ctps,
       pis, nascimento, nome_mae, nome_pai, 
       banco, cod_agencia, num_conta, salario_familia,
       nacionalidade, naturalidade, logradouro, bairro, numero,
       cep  
	   FROM tabela";

#EXECUTA A STRING DE CONEXAO
$result = mysqli_query($conn, $sql);

#SE O NUMERO DE LINHAS FOR MAIOR QUE ZERO...PERCORRE
if (mysqli_num_rows($result) > 0) {

  #ENQUANTO TIVER REGISTRO, VAI PEGANDO E IMPRIMINDO
  while($row = mysqli_fetch_assoc($result)) 
  { 
	#COLOCA OS DADOS NUM ARQUIVO CSV
	fputcsv($output, $row, ';');
  }
} else {
	
	#EMITE UM ALERT 
	echo "<script>window.alert('Dados Não Encontrados');</script>";
}

#FECHA A CONEXAO
mysqli_close($conn);
?>