<?php
    $conexao = mysqli_connect('mysql', 'default', 'secret', 'default');
    //Fim Conexão
    
    var_dump($_POST);
    $arr = array(
        'masculino' => '0', 
        'feminino'  => '1',
        'outro'    => '2'
    );

    //Inserção    
    $query = '
    UPDATE funcionario
    SET
        nome = "'.$_POST['nome'].'",
        telefone = "'.$_POST['telefone'].'",
        genero = "'.$arr[$_POST['genero']].'",
        data_nasc = "'.$_POST['data'].'",
        funcao = "'.$_POST['funcao'].'",
        salario = '.$_POST['salario'] .'
    WHERE
        id = '.$_POST['id'];

    if(!mysqli_query($conexao, $query)) {
        echo("Erro ao atualizar no banco de dados!");
    } else {
        echo("Dados inseridos ao banco de dados com sucesso! <br>");
        echo("Query executada: <br>");
        echo($query);
    }
?>

<html>
    <br>
    <a href="index.html"> Voltar </a>
</html>