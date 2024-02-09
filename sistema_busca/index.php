<?php

include('conexao.php');


?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de classificação</title>
</head>


<body>
    <h1>Lista de classes</h1>


    <form method="GET">
        <input name="busca" type="text" placeholder="Digite o ramo de atuação">
        <button type="submit">Pesquisar</button>
    </form>
    <br>

    <table width="600px" border="1" >
        <tr>
            <th>Tipo da Classe</th>
            <th>NCL</th>
            <th>Descrição</th>
        </tr>

        <?php
            if(!isset($_GET['busca'])){

        ?>      
        <tr>
            <td colspan="3">Digite algo para pesquisar</td>
        </tr>


        <?php 
        } else{
        
        $pesquisa = $mysqli->real_escape_string ($_GET['busca']);
        $sql_code = "SELECT * FROM classes where numb_class LIKE '%$pesquisa%' or desc_class like'%$pesquisa%'";
        $sql_query = $mysqli->query($sql_code) or die($mysqli->error);

        if ($sql_query->num_rows == 0) {
        ?>
        <tr>
            <td colspan="3">Nenhum resultado encontrado</td>
        </tr>
        <?php
        } else{
            while($dados = $sql_query->fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $dados['tipo_class'];?></td>
                <td><?php echo $dados['numb_class'];?></td>
                <td><?php echo $dados['desc_class'];?></td>
            </tr>
        <?php
            }
        }
        ?>




        <?php 
    } ?>
        

    </table>
</body>
</html>