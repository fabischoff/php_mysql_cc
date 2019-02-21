<?php

session_start();

require "./banco.php";
require "./ajudantes.php";

$exibir_tabela = FALSE;

if (array_key_exists('nome', $_GET) && $_GET['nome'] != '') {

    $tarefa = [];
    $tarefa['id'] = $_GET['id'];
    $tarefa['nome'] = $_GET['nome'];

    if (array_key_exists('descricao', $_GET)) {
        $tarefa['descricao'] = $_GET['descricao'];
    } else {
        $tarefa['descricao'] = '';
    }

    if (array_key_exists('prazo', $_GET)) {
        $tarefa['prazo'] = $_GET['prazo'];
    } else {
        $tarefa['prazo'] = '';
    }

    $tarefa['prioridade'] = $_GET['prioridade'];

    if (array_key_exists('concluida', $_GET)) {
        $tarefa['concluida'] = 1;
    } else {
        $tarefa['concluida'] = 0;
    }

    if (array_key_exists('prazo', $_GET) && $_GET['prazo'] != '') {
        $tarefa['prazo'] = traduz_data_para_banco($_GET['prazo']);
    } else {
        $tarefa['prazo'] = NULL;
    }


    editar_tarefa($conexao, $tarefa);
    
    header('Location:tarefas.php');die;
    
}

$tarefa = buscar_tarefa($conexao, $_GET['id']);
//var_dump($tarefa);die;

require "template.php";


