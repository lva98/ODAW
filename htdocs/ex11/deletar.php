<html>
    <?php
        $conexao = mysqli_connect('mysql', 'default', 'secret', 'default');

        $query = 
        'DELETE FROM funcionario
        WHERE id = '.$_GET['id'].';';
        
        $res = mysqli_query($conexao, $query);

        if(!$res) {
            echo("Erro ao deletar registro");
        } else {
            echo("Registro deletado com sucesso");
        }
    ?>

    <br><br>
    <a href="index.html"> Voltar </a>
</html>