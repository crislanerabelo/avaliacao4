<?php

function validaPessoa($nome, $cpf, $nascimento, $sexo, $estado, $telefone, $observacoes){

    $formValido = true;
    
    if($estado ==-1){
        echo "Por favor, selecione um estado";
        $formValido = false;
    }
    
    $telefone = trim($telefone);
    if(!preg_match("/^(\d{3}\s)?\d{4}\\-\d{4}$/",$telefone)){
        echo"Formato invalido para o  campo <b>Telefone</b> <br/>";
        $formValido = false;
    }
    
    if (!preg_match("/^\d{3}\\.\d{3}\\.\d{3}\\-\d{2}$/", $cpf)){
        echo "Formato de CPF invalido";
        $formValido = false;
        
    }
    
    
    //NASCIMENTO
    $nascimento = trim($nascimento);
    if(empty($nascimento)){
        echo "Por Favor,preencha o campo <b>NASCIMENTO</b> <br/>";
        $formValido = false;
    }
    else if(!preg_match("/^\d{2}\\/\d{2}\\/\d{4}$/",$nascimento)){
        echo "Formato invalido do <b>NASCIMENTO</b> Utilize o formato dd/mm/aaaa <br/>";
        $formValido = false;
    }
    else{
        $pedacos = explode('/',$nascimento);
        $dia = $pedacos[0];
        $mes = $pedacos[1];
        $ano = $pedacos[2];
        
        if(!checkdate($mes, $dia, $ano)){
            echo "<b>data invalida<b>";
            $formValido = false;                           
        }
       
        else{
            $nascimentoYmd = $ano.$mes.$dia;
            $dataAtual = date('Ymd');
        }
        if($dataAtual < $nascimentoYmd){
            echo "<b>Data de Nascimento no Futuro!!<b><br>" ;
            $formValido = false;
        }
       
    }

    
    if (!preg_match("/^[a-zA-ZãÃáÁàÀêÊéÉèÈíÍìÌôÔõÕóÓòÒúÚùÙûÛçÇ\s\\.\\,]+$/", $observacoes)){
        echo "Observações: somente letras, letras acentuadas, espaco, pontos e vírgulas";
        $formValido = false;
    }
    
    if (!preg_match("/^[a-zA-ZãÃáÁàÀêÊéÉèÈíÍìÌôÔõÕóÓòÒúÚùÙûÛçÇ\s]+$/", $nome)){
        echo "Nome: somente letras, letras acentuadas e espaco";
        $formValido = false;
    }
    
    
    
    if($sexo = null);
        if(isset($_REQUEST["sexo"])){
        $sexo = $_REQUEST["sexo"];
    }
    else{
        echo "Selecione uam opçao sexual";
        $formValido = false;
    }
    
    
    
    return $formValido;
    }

?>
