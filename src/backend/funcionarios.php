<?php

    //incluindo banco de dados
    include "db.php";

    include "connection.php";

    //ações de erro em cada value
    $res_output = array('nome'=> false, 'error' => false, 'email'=> false, 'cpf' => false, 'senha' => false);
 
    //ler dados do back-end
    $acao = 'ler_dados';

    if (isset($_GET['acao'])) {
        $acao = $_GET['acao'];
    }

    if ($acao == 'ler_dados') {
        $sql = 'SELECT * FROM funcionarios';
        $query = $db_conn->query($sql);
        $funcionarios = array();
 
         while($row = $query->fetch_array()){
             array_push($funcionarios, $row);
         }
 
         $res_output['funcionarios'] = $funcionarios;
     }

     //cadastrar funcionários
     if ($acao == 'cadastrar') {
        function checkStr($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $nome = checkStr($_POST['nome']);
        $email = checkStr($_POST['email']);
        $cpf = checkStr($_POST['cpf']);
        $senha = checkStr($_POST['senha']);

        if ($nome == '') {

            $res_output['nome'] = true;
            $res_output['mensagem'] = 'Informe seu nome!';

        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $res_output['email'] = true;
            $res_output['mensagem'] = 'Informe seu e-mail!';

        } else if (!$cpf) {

            $res_output['cpf'] = true;
            $res_output['mensagem'] = 'Informe seu CPF!';

        } else if (!$senha) {

            $res_output['senha'] = true;
            $res_output['mensagem'] = 'Informe sua senha!';

        } else {

            $sql = "SELECT * FROM funcionarios WHERE email='$email'";
            $query = $db_conn->query($sql);

            if ($query->num_rows > 0) {

                $res_output['email'] = true;
                $res_output['mensagem'] = 'Funcionário já cadastrado';

            } else {

                $sql = "INSERT INTO funcionarios (nome, email, cpf, senha) values ('$nome', '$email', '$cpf', '$senha')"; 
                $query = $db_conn->query($sql);

                if ($query) {
                    $res_output['mensagem'] = 'Funcionário cadastrado com sucesso :)';
                } else {
                    $res_output['error'] = true;
                    $res_output['mensagem'] = 'Não foi possível cadastrar o funcionário :(';
                }

            }

        }

     }


     //login de funcionarios
     if ($acao == 'login') {

        function checkStr($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);

            return $data;
        }

        $email = checkStr($_POST['email']);
        $senha = checkStr($_POST['senha']);

        $sql = "SELECT * FROM funcionarios WHERE email='$email' AND senha='$senha'";

        $result = $db_conn -> query($sql);
        $num = mysqli_num_rows($result);

        if ($num > 0) {
            $result = mysql_fetch_assoc($query);
        } else {
            $res_output['error'] = true;
            $res_output['mensagem'] = "E-mail ou senha incorretos!";
        }
     }
 
     $db_conn->close();
    //simple pass a json format data in php 
    header("Content-type: application/json");
    echo json_encode($res_output);
    die();

?>