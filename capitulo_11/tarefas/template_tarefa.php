<html>
    <head>
        <meta charser="utf-8">
        <title>Gerenciador de Tarefas</title>
    </head>
    <body>
        <div id="bloco_principal">
            <h1>Tarefa: <?php echo $tarefa['nome'] ?></h1>

            <p><a href="tarefas.php">Voltar para a lista de tarefas</a></p>
            <p><strong>Concluída: <?php echo traduz_concluida($tarefa['concluida']) ?></strong></p>
            <p><strong>Descrição:<?php nl2br($tarefa['descricao']) ?></strong></p>
            <p><strong>Prazo:<?php traduz_data_para_exibir($tarefa['prazo']) ?></strong></p>
            <p><strong>Prioridade:<?php traduz_prioridade($tarefa['prioridade']) ?></strong></p>
            <h2>Anexos</h2>

            <!--lista de anexos-->
            <?php if (count($anexos) > 0) : ?>
                <table>
                    <tr>
                        <th>Arquivo</th>
                        <th>Opções</th>
                    </tr>

                    <?php foreach ($anexos as $anexo) : ?>
                        <tr>
                            <td><?php echo $anexo['nome'] ?></td>
                            <td><a href="anexos/<?php echo $anexo['arquivo'] ?>">Download</a></td>
                        </tr>

                    <?php endforeach ?>

                </table>
            <?php else : ?>
            <p>Não há anexos para esta tarefa</p>
            
            <?php endif; ?>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Novo anexo</legend>
                <input type="hidden" name="tarefa_id" value="<?php echo $tarefa['id'] ?>"> <label> <?php if ($tem_erros && array_key_exists('anexo', $erros_validacao)) : ?>
                        <span><?php echo $erros_validacao['anexo'] ?></span> <?php endif ?><input type="file" name="anexo"></label>
                <input type="submit" value="Cadastrar">
            </fieldset>
        </form>
    </body>
</html>


