<?php

$servidor = '127.0.0.1';
$usario = 'sistematarefas';
$senha = 'sistema';
$banco = 'tarefas';

$conexao = mysqli_connect($servidor, $usario, $senha, $banco);

//echo $conexao ? 'Sim' : die();
//if($conexao){
//    echo 'Conectou ';
//}
//else echo 'Não conectou';


function buscar_tarefas($conexao) {
    $sqlBusca = 'SELECT * FROM tarefas';
    $resultado = mysqli_query($conexao, $sqlBusca);

    $tarefas = [];

    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        $tarefas [] = $tarefa;
    }

    return $tarefas;
}

function gravar_tarefa($conexao, $tarefa) {

    $sqlGravar = "INSERT INTO tarefas (nome, descricao, prioridade, prazo, concluida)
                 VALUES 
                 ('{$tarefa['nome']}', '{$tarefa['descricao']}',{$tarefa['prioridade']} , '{$tarefa['prazo']}' , {$tarefa['concluida']})";
    echo $sqlGravar;
//    die;
    mysqli_query($conexao, $sqlGravar);
}

function buscar_tarefa($conexao, $id) {
    $sqlBusca = "SELECT * FROM tarefas WHERE id = {$id}";
    $resultado = mysqli_query($conexao, $sqlBusca);

    return mysqli_fetch_assoc($resultado);
}

function editar_tarefa($conexao, $tarefa) {
    $sql = "UPDATE tarefas SET 
            nome = '{$tarefa['nome']}', 
            descricao = '{$tarefa['descricao']}',
            prioridade = {$tarefa['prioridade']}, 
            prazo = '{$tarefa['prazo']}',
            concluida = {$tarefa['concluida']}
            WHERE ID = {$tarefa['id']} ";
    mysqli_query($conexao, $sql);
}

function remover_tarefa($conexao, $id) {
    $sqlRemover = "DELETE FROM tarefas WHERE id = {$id}";
    mysqli_query($conexao, $sqlRemover);
}
