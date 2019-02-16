<?php session_start(); ?>
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
        <form>
            <fieldset>
                <legend>Nova tarefa</legend>
                <label>Tarefa:
                    <input type="text" name="nome">
                </label>
                <input type="submit" value="Cadastrar">
            </fieldset>
        </form>

        <?php
        if (array_key_exists('nome', $_GET)) {

            $_SESSION['lista_tarefas'][] = $_GET['nome'];
        }
        $lista_tarefas = [];
        if (array_key_exists('lista_tarefas', $_SESSION)) {

            $lista_tarefas = $_SESSION['lista_tarefas'];
        }
        ?>

        <table>
            <tr>
                <th>Tarefas</th>
            </tr>

<?php foreach ($lista_tarefas as $tarefa) : ?>

                <tr>
                    <th><?php echo $tarefa; ?></th>
                </tr>

<?php endforeach; ?>

        </table>
    </body>
</html>