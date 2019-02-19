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
                 echo $sqlGravar; die;
    mysqli_query($conexao, $sqlGravar);
}
