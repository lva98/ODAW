<?php
    //Conexão
    $conexao = mysqli_connect('mysql', 'default', 'secret', 'default');
    if (!$conexao) {
        die('Erro de conexão: '.mysql_error());
    }
    //Fim Conexão

    //Criação tabela
    $query = 
    'CREATE TABLE funcionario (
            id INTEGER AUTO_INCREMENT,
            nome CHAR(30) NOT NULL,
            telefone CHAR(13) NOT NULL,
            genero SMALLINT NOT NULL,
            data_nasc DATE NOT NULL,
            funcao VARCHAR(50) NOT NULL,
            salario REAL NOT NULL,
            PRIMARY KEY (id)
        )';
    $res = mysqli_query($conexao, $query);
    //Fim Criação tabela

    echo("Tabelas criadas");

?>