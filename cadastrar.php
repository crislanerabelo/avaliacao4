<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro de Pessoas - Cadastrar</title>
    </head>
    <body>
        <?php
            require_once('menu.php');
            session_start();
            
            //Inicializando a variável sexo, pois o campo radio, quando fica desmarcado, não envia valor
            $sexo = NULL;
            
            extract($_REQUEST);
            
            require_once('validacao_pessoa.php');
            $formValido = validaPessoa($nome, $cpf, $nascimento, $sexo, $estado, $telefone, $observacoes);
            
            if($formValido){
                if(!isset($_SESSION["cadastros"])){
                    $_SESSION["cadastros"] = array();
                }
                
                $pessoa = compact("nome", "cpf", "nascimento", "sexo", "estado", "telefone", "observacoes");
                $_SESSION["cadastros"][] = $pessoa;
                
                echo "Cadastro efetuado com sucesso!"
                     ,"<br/>"
                     ,"<a href='form_cadastrar.php'>Cadastrar outra pessoa</a>";
            }
            else{
                echo "<br/> Clique em \"Voltar\", verifique os erros no cadastro e tente novamente."
                    ,"<br/><br/>"
                    ,"<input type='button' value='Voltar' onclick='history.go(-1)' />";
            }
        ?>
    </body>
</html>
