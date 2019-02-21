<table>
    <tr>
        <th>Tarefas</th>
        <th>Descrição</th>
        <th>Prazo</th>
        <th>Prioridade</th>
        <th>Concluída</th>
        <th>Opções</th>
    </tr>
    <?php foreach ($lista_tarefas as $tarefa) : ?>

        <tr>
            <th><?php echo $tarefa['nome']; ?></th>
            <th><?php echo $tarefa['descricao']; ?></th>
            <th><?php echo traduz_data_para_exibir($tarefa['prazo']); ?></th>
            <th><?php echo traduz_prioridade($tarefa['prioridade']); ?></th>
            <th><?php echo traduz_concluida($tarefa['concluida']); ?></th>
            <th><a href=editar.php?id=<?php echo $tarefa['id'] ?> >Editar</a></th>
            <th><a href=remover.php?id=<?php echo $tarefa['id'] ?> >Remover</a></th>
        </tr>

    <?php endforeach; ?>

</table>
