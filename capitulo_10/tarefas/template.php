<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Gerenciador de tarefas</title>
        <style>


        </style>
    </head>
    <body>
        <h1>Gerenciador de tarefas</h1>
        
        <?php require './formulario.php' ?>
        
        <?php if ($exibir_tabela) :?>
        <?php require './tabela.php'?>
        <?php endif ?>
    </body>
</html>