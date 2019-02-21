<?php

session_start();

require "./banco.php";
require "./ajudantes.php";

$exibir_tabela = FALSE;

if (array_key_exists('nome', $_POST) && $_POST['nome'] != '') {

    $tarefa = [];
    $tarefa['id'] = $_POST['id'];
    $tarefa['nome'] = $_POST['nome'];

    if (array_key_exists('descricao', $_POST)) {
        $tarefa['descricao'] = $_POST['descricao'];
    } else {
        $tarefa['descricao'] = '';
    }

    if (array_key_exists('prazo', $_POST)) {
        $tarefa['prazo'] = $_POST['prazo'];
    } else {
        $tarefa['prazo'] = '';
    }

    $tarefa['prioridade'] = $_POST['prioridade'];

    if (array_key_exists('concluida', $_POST)) {
        $tarefa['concluida'] = 1;
    } else {
        $tarefa['concluida'] = 0;
    }

    if (array_key_exists('prazo', $_POST) && $_POST['prazo'] != '') {
        $tarefa['prazo'] = traduz_data_para_banco($_POST['prazo']);
    } else {
        $tarefa['prazo'] = NULL;
    }


    editar_tarefa($conexao, $tarefa);
    
    header('Location:tarefas.php');die;
    
}

$tarefa = buscar_tarefa($conexao, $_POST['id']);
//var_dump($tarefa);die;

require "template.php";


