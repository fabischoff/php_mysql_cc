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
                <label>Descrição (Opcional):
                    <textarea name="descricao" id="descricao"></textarea>
                </label>
                <label>
                    Prazo (Opcional):
                    <input type="text" name="prazo">
                </label>
                <fielset>
                    <legend>Prioridade</legend>
                    <label>
                        <input type="radio" name="prioridade" value="1" checked> Baixa
                        <input type="radio" name="prioridade" value="2" > Média
                        <input type="radio" name="prioridade" value="3" > Alta
                    </label>
                </fielset>
                <label>
                    Tarefa concluída:
                    <input type="checkbox" name="concluida" value="1">
                </label>
                <input type="submit" value="Cadastrar">
            </fieldset>
        </form>

        <table>
            <tr>
                <th>Tarefas</th>
                <th>Descrição</th>
                <th>Prazo</th>
                <th>Prioridade</th>
                <th>Concluída</th>
            </tr>
            <?php foreach ($lista_tarefas as $tarefa) : ?>

                <tr>
                    <th><?php echo $tarefa['nome']; ?></th>
                    <th><?php echo $tarefa['descricao']; ?></th>
                    <th><?php echo traduz_data_para_exibir ($tarefa['prazo']);     ?></th>
                    <th><?php echo traduz_prioridade       ($tarefa['prioridade']); ?></th>
                    <th><?php echo traduz_concluida($tarefa['concluida']); ?></th>
                </tr>

            <?php endforeach; ?>

        </table>
    </body>
</html>