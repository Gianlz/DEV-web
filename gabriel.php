<?php
session_start();
if ($_SERVER ['REQUEST_METHOD'] == 'POST') 
{

    if(empty($_POST['nome'])) {
        $_SESSION['vazio_nome'] = "Campo nome é obrigatório";
        $url = 'http://localhost/';
        echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>";
    }

    if(empty($_POST['idade'])) {
        $_SESSION['vazio_idade'] = "Campo idade é obrigatório";
        $url = 'http://localhost/';
        echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>";
    }


    if(empty($_POST['email'])) {
        $_SESSION['vazio_email'] = "Campo email é obrigatório";
        $url = 'http://localhost/';
        echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>";
    }

    if(empty($_POST['telefone'])) {
        $_SESSION['vazio_telefone'] = "Campo telefone é obrigatório";
        $url = 'http://localhost/';
        echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>";
    }

    if(empty($_POST['rede_social'])) {
        $_SESSION['vazio_social'] = "Campo rede é obrigatório";
        $url = 'http://localhost/';
        echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>";
    }

    if(empty($_POST['data_nascimento'])) {
        $_SESSION['vazio_nascimento'] = "Campo data de nascimento é obrigatório";
        $url = 'http://localhost/';
        echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>";
    }

    function get_data() {
        $file_name='Contatos'. '.json';
    
        if(file_exists("$file_name")) { 
            $current_data=file_get_contents("$file_name");
            $array_data=json_decode($current_data, true);
                               
            $extra=array(
    
            'familiar' => $_POST['tipo'],
            'genero' => $_POST['se'],
            'instituicao' => $_POST['Escola'],
            'nome' => filter_input(INPUT_POST,'nome', FILTER_SANITIZE_SPECIAL_CHARS) ,
            'idade' => filter_input(INPUT_POST,'idade', FILTER_SANITIZE_NUMBER_INT) ,
            'email' => filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL) ,
            'telefone' => filter_input(INPUT_POST,'telefone', FILTER_SANITIZE_NUMBER_INT) ,
            'rede' => $_POST['rede'],
            'nascimento' => $_POST['Nascimento']
    
            );
            $array_data[]=$extra;
            return json_encode($array_data);

        }
        else {
            $datae=array();
            $datae[]=array(
    
                'familiar' => $_POST['familiar'],
                'genero' => $_POST['genero'],
                'instituicao' => $_POST['instituicao'],
                'nome' => $_POST['nome'],
                'idade' => $_POST['idade'],
                'email' => $_POST['email'],
                'telefone' => $_POST['telefone'],
                'rede' => $_POST['rede'],
                'nascimento' => $_POST['Nascimento']
    
            );
            return json_encode($datae);   

        }
    }
    
    $file_name='Contatos'. '.json';

    if(file_put_contents("$file_name", get_data())) {
        echo 'pass';
    }                
    else {
        echo 'Error';                
    }

}
?>