<?php

include "banco.php";
include "ajudantes.php";

$tem_erros = FALSE;
$erros_validacao = [];

if (tem_post()) {

    $tarefa['id'] = $_POST['tarefa_id'];
    
    if ($_FILES['anexo']['name'] == '') {
        
        $tem_erros = TRUE;
        $erros_validacao['anexo'] = 'Você deve selecionar um arquivo para anexar';
        
    } else {

//        var_dump($_POST);die;

        if (tratar_anexo($_FILES['anexo'])) {

//            var_dump($_FILES['anexo']);die;

            $nome = $_FILES['anexo']['name'];
            $anexo = [
                'tarefa_id' => $tarefa['id'],
                'nome' => substr($nome, 0, -4),
                'arquivo' => $nome,
            ];
        } else {
            $tem_erros = TRUE;
            $erros_validacao['anexo'] = 'Envie anexos nos formatos zip ou pdf';
        }

        if (!$tem_erros) {
//            var_dump($anexo);die;
            gravar_anexo($conexao, $anexo);
        }
    }
}

$tarefa = buscar_tarefa($conexao, $_GET['id']);
$anexos = buscar_anexos($conexao, $_GET['id']);

include "template_tarefa.php";
