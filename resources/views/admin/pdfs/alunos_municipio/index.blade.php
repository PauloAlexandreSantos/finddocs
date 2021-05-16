<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <meta charset="UTF-8">
    <title>Alunos Por Município</title>

    <style>
        <?php echo $bootstrap;
        echo $css; ?>
    </style>
</head>

<body>

    
<div class="text-center">
        <p>
            <img src="images/insignia/logo.jpg" class="" width="50" height="50">
            <br>
            <?php echo $cabecalho->vc_republica; ?>
            <br>
            <?php echo $cabecalho->vc_ministerio; ?>
            <br>
        </p>

    </div>
    <br>
    <h4 class="text-center"> Relatório Estatístico do Total de Alunos <?php  if($data1 != 'Todos')
    {
        echo 'do Município de '.$data1;
    }
    else{
        echo 'de Todos os Municípios ';
    }
    ?> <br><br> <?php  if($data != 'Todos')
    {
        echo 'Ano Lectivo de '.$totalGeral2->ya_inicio.' - '.$totalGeral2->ya_fim;
    }
    else{
        echo 'de Todos os Anos Lectivos ';
    }
    ?> </h4>
    <br>
    <table class="table table-striped  table-bodered table-hover">
        <thead>
            <tr>
                <th width="1px">Nº</th>
                <th>Municipio</th>
                <th>Total de Alunos</th>
            </tr>
        </thead>
        <tbody>

            <?php $contador = 1; ?>
            <?php foreach ($totalGeral as $totalGeral) : ?>

                <tr>
                    <td><?php echo $contador++; ?></td>
                    <td><?php echo $totalGeral->m ?></td>
                    <td><?php echo $totalGeral->total ?></td>
                </tr>

            <?php endforeach; ?>

            <br>
        </tbody>
    </table>


</body>

</html>