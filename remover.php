<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro de Pessoas - Remover</title>
    </head>
    <body>
        <?php
            require_once('menu.php');
            session_start();
            
            extract($_REQUEST);            
                        
            $_SESSION["cadastros"][$id] = NULL;

            echo "Remoção efetuada com sucesso!"
                 ,"<br/>"
                 ,"<a href='form_remover.php'>Remover outra pessoa</a>";                
        ?>
    </body>
</html>
