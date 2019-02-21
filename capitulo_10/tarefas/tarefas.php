<?php

session_start();

require './banco.php';
require './ajudantes.php';

$exibir_tabela = TRUE;
//var_dump($_POST);die;
//if (array_key_exists('nome', $_POST) && $_POST['nome'] != '') {

$tem_erros = FALSE;
$erros_validacao = [];

if (tem_post()) {

    $tarefa = [];

    if (array_key_exists('nome', $_POST) && strlen($_POST['nome']) > 0) {

        $tarefa['nome'] = $_POST['nome'];
    } else {
        $tem_erros = TRUE;
        $erros_validacao ['nome'] = 'O nome da tarefa é obrigatório';
    }

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

    if (!$tem_erros) {

        gravar_tarefa($conexao, $tarefa);
        header('Location:tarefa.php');
        die();
    }
}


$lista_tarefas = [];

$lista_tarefas = buscar_tarefas($conexao);

//var_dump($lista_tarefas);die;

$tarefa = [
    'id' => 0,
    'nome' => (array_key_exists('nome', $_POST)) ? $_POST['nome'] : '',
    'descricao' => (array_key_exists('descricao', $_POST)) ? $_POST['descricao'] : '',
    'prazo' => (array_key_exists('prazo', $_POST)) ? traduz_data_para_banco($_POST['prazo']) : '',
    'prioridade' => (array_key_exists('prioridade', $_POST)) ? $_POST['prioridade'] : 1,
    'concluida' => (array_key_exists('concluida', $_POST)) ? $_POST['concluida'] :'',
    'id' => '',
];
require './template.php';
