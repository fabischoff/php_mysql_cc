<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            echo "Hoje é dia " . date('d/m/Y');
            echo "<br>";
            echo "Hoje é dia " . date('d/m/y');
            echo " agora são " . date('H:i:s');
            echo "<hr>";
            echo date('g:i:s A');
            echo "<br>";
            $hoje = date('w');
            $sabado = 6 - $hoje;
            $sabado == 1 ? $verbo = 'falta' : $verbo = 'faltam';
            echo $verbo . " " . $sabado . " dias para sábado.";
            echo "Estamos no mês de " . date('F');
        ?>
    </body>
</html>
