<?php
if(
   isset($_POST['matricula']) && 
   isset($_POST['nome'])      && 
   isset($_POST['endereco'])  && 
   isset($_POST['cep'])       && 
   isset($_POST['nascimento'])) {

    $data = 'matricula: '  . $_POST['matricula'] . "\n"
	    'nome: '       . $_POST['nome'] . "\n"
	    'endereço: '   . $_POST['endereco'] . "\n"
	    'cep: '        . $_POST['cep'] . "\n"
	    'nascimento: ' . $_POST['nascimento'] . "\n";

    $filename = date('YmdHis').".txt";

    if (!file_exists($filename)) {
        $fh = fopen($filename, 'w') or die("não foi possível salvar o arquivo");
    }

    $ret = file_put_contents($filename, $data, FILE_APPEND | LOCK_EX);

    if($ret === false) {
        die('ocorreu um erro ao gravar esse arquivo');
    } else {
        echo "$ret bytes escritos no arquivo";
    }
 } else {
   die('sem dados para gravar');
 }
?>

