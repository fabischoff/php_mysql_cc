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
    if ($data == "") {
        return "";
    }

    $dados = explode('/', $data);

    if (count($dados) != 3) {
        return $data;
    }

    $data_banco = "{$dados[2]}-{$dados[1]}-{$dados[0]}";

    return $data_banco;
}

function traduz_data_para_exibir($data) {

    if ($data == "" or $data == "0000-00-00") {
        return "";
    }

    $dados = explode("-", $data);

    if (count($dados) != 3) {
        return $data;
    }
    return $data_exibir = "{$dados[2]}/{$dados[1]}/{$dados[0]}";
}

function traduz_concluida($concluida) {

    return $concluida == 1 ? "Sim" : 'Não';
}

function tem_post() {
    if (count($_POST) > 0) {
        return TRUE;
    }
    return FALSE;
}

function validar_data($data) {

    $padrao = '/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/';
    $resultado = preg_match($padrao, $data);

    if ($resultado == 0) {
        return FALSE;
    }

    $dados = explode('/', $data);
//    var_dump($dados);die;

    $resultado = checkdate($dados[1], $dados[0], $dados[2]);

    return $resultado;
}

function tratar_anexo($anexo) {
//    var_dump($anexo);die;

    $padrao = '/^.+(\.pdf|\.zip)$/';
//              '/^.+(\.pdf|\.zip)$/'

    $resultado = preg_match($padrao, $anexo['name']);
//    var_dump($resultado);die;

    if ($resultado == 0) {
        return FALSE;
    }

    move_uploaded_file($anexo['tmp_name'], "anexos/{$anexo['name']}");
    return TRUE;
}
