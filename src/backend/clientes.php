<?php

    //incluindo banco de dados
    include "db.php";

    include "connection.php";

    //ações de erro em cada value
    $res_output = array( 
        'error' => false, 
        'nome'=> false, 
        'email'=> false, 
        'telefone' => false, 
        'sabor_pizza' => false,
        'borda_pizza' => false, 
        'rua' => false, 
        'numero' => false, 
        'complemento' => false, 
        'bairro' => false
    );
 
    //ler dados do back-end
    $acao = 'ler_dados';

    if (isset($_GET['acao'])) {
        $acao = $_GET['acao'];
    }

    if ($acao == 'ler_dados') {
        $sql = 'SELECT * FROM clientes';
        $query = $db_conn->query($sql);
        $clientes = array();
 
         while($row = $query->fetch_array()){
             array_push($clientes, $row);
         }
 
         $res_output['clientes'] = $clientes;
     }

     //finalizar pedido
     if ($acao == 'finalizar_pedido') {
        function checkStr($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $nome = checkStr($_POST['nome']);
        $email = checkStr($_POST['email']);
        $telefone = checkStr($_POST['telefone']);
        $sabor_pizza = checkStr($_POST['sabor_pizza']);
        $borda_pizza = checkStr($_POST['borda_pizza']);
        $rua = checkStr($_POST['rua']);
        $numero = checkStr($_POST['numero']);
        $complemento = checkStr($_POST['complemento']);
        $bairro = checkStr($_POST['bairro']);

        if ($nome == '') {

            $res_output['nome'] = true;
            $res_output['mensagem'] = 'Informe seu nome!';

        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $res_output['email'] = true;
            $res_output['mensagem'] = 'Informe seu e-mail!';

        } else if (!$telefone) {

            $res_output['telefone'] = true;
            $res_output['mensagem'] = 'Informe seu telefone!';

        } else if (!$sabor_pizza) {

            $res_output['sabor_pizza'] = true;
            $res_output['mensagem'] = 'Escolha um sabor de pizza!';

        } else if (!$borda_pizza) {

            $res_output['borda_pizza'] = true;
            $res_output['mensagem'] = 'Escolha um tipo de borda de pizza!';

        } else if (!$rua) {

            $res_output['rua'] = true;
            $res_output['mensagem'] = 'Informe sua rua!';

        } else if (!$numero) {

            $res_output['numero'] = true;
            $res_output['mensagem'] = 'Informe o número de sua rua!';

        } else if (!$complemento) {

            $res_output['complemento'] = true;
            $res_output['mensagem'] = 'Informe seu endereço completo!';

        } else if (!$bairro) {

            $res_output['bairro'] = true;
            $res_output['mensagem'] = 'Informe seu bairro!';

        } else {

            $sql = "SELECT * FROM clientes WHERE email='$email'";
            $query = $db_conn->query($sql);

            if ($query->num_rows > 0) {

                $res_output['email'] = true;
                $res_output['mensagem'] = 'Pedido já adicionado!';

            } else {

                $sql = "INSERT INTO clientes (
                            nome, 
                            email, 
                            telefone, 
                            sabor_pizza, 
                            borda_pizza, 
                            rua, 
                            numero, 
                            complemento, 
                            bairro) 
                        values 
                            ('$nome', 
                            '$email', 
                            '$telefone', 
                            '$sabor_pizza', 
                            '$borda_pizza', 
                            '$rua', 
                            '$numero', 
                            '$complemento', 
                            '$bairro')"; 
                $query = $db_conn->query($sql);

                if ($query) {
                    $res_output['mensagem'] = 'Pedido adicionado com sucesso :)';
                } else {
                    $res_output['error'] = true;
                    $res_output['mensagem'] = 'Não foi possível adicionar o pedido :(';
                }

            }

        }

     }

    include "db_close.php";

?>