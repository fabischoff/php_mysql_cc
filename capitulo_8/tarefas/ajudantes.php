<?php

function traduz_prioridade($codigo) {
    $prioridade = '';

    switch ($codigo) {
        case 1:
            $prioridade = 'baixa';
            break;

        case 2:
            $prioridade = 'média';
            break;
        case 3:
            $prioridade = 'alta';
            break;
    }

    return $prioridade;
}

function traduz_data_para_banco($data) {


    $dados = explode('/', $data);
    $data_banco = "{$dados[2]}-{$dados[1]}-{$dados[0]}";

    return $data_banco;
}

function traduz_data_para_exibir($data) {
    
//    echo $data;die;

    if ($data == "" or $data == "0000-00-00") {
        return "";
    }

    $dados = explode("-", $data);
    return $data_exibir = "{$dados[2]}/{$dados[1]}/{$dados[0]}";
}

function traduz_concluida ($concluida){
    
    return $concluida == 1 ? "Sim" : 'Não';
}