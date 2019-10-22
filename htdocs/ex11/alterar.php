<html>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
    <body>
        <?php
            $conexao = mysqli_connect('mysql', 'default', 'secret', 'default');

            $query = 'SELECT * from funcionario where id = ' . $_GET['id'];
            $res = mysqli_query($conexao, $query);
            $row = mysqli_fetch_row($res);
            

            $genero = intval($row[3]);

            $radios = 
                '<input type="radio" name="genero" value="masculino" '. (($genero == 0) ? 'checked' : '') .'> Masculino'
                .'<input type="radio" name="genero" value="feminino" '. (($genero == 1) ? 'checked' : '' ) .'> Feminino'
                .'<input type="radio" name="genero" value="outros" '. (($genero == 2) ? 'checked' : '' ) .'> Masculino';

            $options = 
                '<option value="pedreiro" '.(($row[5] == 'pedreiro') ? 'selected="selected"' : '').'>Pedreiro</option>'
                .'<option value="servente" '.(($row[5] == 'servente') ? 'selected="selected"' : '').'>Servente</option>'
                .'<option value="engenheiro"'.(($row[5] == 'engenheiro') ? 'selected="selected"' : '').'>Engenheiro(a)</option>'
                .'<option value="secretária"'.(($row[5] == 'secretária') ? 'selected="selected"' : '').'>Secretário(a)</option>';
        ?>

        <form action="alteracao.php" method="post">
            <input type="hidden" name="id" value="<?php echo($row[0]); ?>">
            <table>
                <tr>
                    <td colspan="4" style="text-align: center;"> Alteração </td>
                </tr>

                <tr>
                    <td>
                        Nome
                    </td>
                    <td>
                        <input type="text" name="nome" placeholder="Jeferson Souza" required value="<?php echo($row[1]); ?>"><br>
                    </td>
                    <td>
                        Telefone
                    </td>
                    <td>
                        <input name="telefone" type="text" pattern="[0-9]{2} [0-9]{4,5}-[0-9]{4}" placeholder="99 12345-1234" required value="<?php echo($row[2]); ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Genero
                    </td>
                    <td>
                        <?php echo($radios); ?>
                    </td>
                    <td>
                        Data Nasc.
                    </td>
                    <td>
                        <input type="date" name="data" required value="<?php echo($row[4]); ?>">
                    </td>
                </tr>

                <tr>
                    <td>
                        Função
                    </td>
                    <td>
                        <select name="funcao">
                            <?php echo($options); ?>
                        </select>
                    </td>
                    <td>
                        Salário
                    </td>
                    <td>
                        <input type="number" placeholder=1000 required name="salario" value="<?php echo($row[6]); ?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: right;">
                        <input type="submit">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>