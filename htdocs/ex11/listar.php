<style>
    table, th, td {
        border: 1px solid black;
    }
</style>

<html>
    <table>
        <tr>
            <td> <a href="index.html">Cadastro Registro</a> </td>
            <td> <a href="listar.php">Listar Banco</a> </td>
        </tr>
    </table>
    <br>

    <table border="1px">
        <tr>
            <th> # </th>
            <th> Nome </th>
            <th> Telefone </th>
            <th> Gênero </th>
            <th> Data Nasc. </th>
            <th> Função </th>
            <th> Salário </th>
            <th> Ação </th>
        </tr>

        <?php
            $conexao = mysqli_connect('mysql', 'default', 'secret', 'default');
            $query = 'SELECT * FROM funcionario';
            $res = mysqli_query($conexao, $query);
            $a = array('Masculino', 'Feminino', 'Outro');
            $cont = 1;
            while($row = mysqli_fetch_row($res)) {
                echo('
                    <tr>
                        <td>'.strval($cont++).'</td>
                        <td>'.$row[1].'</td>
                        <td>'.$row[2].'</td>
                        <td>'.$a[intval($row[3])].'</td>
                        <td>'.$row[4].'</td>
                        <td>'.$row[5].'</td>
                        <td> R$ '.strval($row[6]).'</td>
                        <td> <a href="alterar.php?id='.$row[0].'">Alterar</a>  <a href="deletar.php?id='.$row[0].'">Deletar</a></td>
                    <tr>
                ');
            }
        ?>
    </table>
</html>