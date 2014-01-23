<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro de Pessoas - Editar</title>
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
                $pessoa = compact("nome", "cpf", "nascimento", "sexo", "estado", "telefone", "observacoes");
                $_SESSION["cadastros"][$id] = $pessoa;
                
                echo "Edição efetuada com sucesso!"
                     ,"<br/>"
                     ,"<a href='form_editar.php'>Editar outra pessoa</a>";                
            }
            else{
                echo "<br/> Clique em \"Voltar\", verifique os erros no cadastro e tente novamente."
                    ,"<br/><br/>"
                    ,"<input type='button' value='Voltar' onclick='history.go(-1)' />";
            }
        ?>
    </body>
</html>
