<?php
    if($_POST["salario"] < 1000){
        echo("Salário deve ser maior que R$1000");
        die();
    }

    //Conexão
    $conexao = mysqli_connect('mysql', 'default', 'secret', 'default');
    if (!$conexao) {
        die('Erro de conexão: '.mysql_error());
    }

    //Fim Conexão
    $arr = array(
        'masculino' => '0', 
        'feminino'  => '1',
        'outro'    => '2'
    );

    //Inserção    
    $query = '
    INSERT INTO funcionario(
        nome, 
        telefone, 
        genero, 
        data_nasc, 
        funcao, 
        salario)
    VALUES
        ("'.$_POST['nome'].'",
         "'.$_POST['telefone'].'",
         '.$arr[$_POST['genero']].',
         "'.$_POST['data'].'",
         "'.$_POST['funcao'].'",
         '.$_POST['salario'] .'
        )';

    if(!mysqli_query($conexao, $query)) {
        echo("Erro ao inserir no banco de dados!");
    } else {
        echo("Dados inseridos ao banco de dados com sucesso! <br>");
        echo("Query executada: <br>");
        echo($query);
    }
    //Fim Inserção
?>

<html>
    <br>
    <a href="index.html"> Voltar </a>
</html>