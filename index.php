<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro de Pessoas</title>
    </head>
    <body>
        <?php 
            require_once('menu.php');
            session_start();
            
            if(isset($_SESSION["cadastros"])){
                echo "<dl>";
                foreach($_SESSION["cadastros"] as $pessoa){
                    if ($pessoa != NULL) {
                        echo '<fieldset>';
                        echo '<dt>' . $pessoa["nome"] . '</dt>';
                        echo '<dd>CPF: ' . $pessoa["cpf"] . '</dd>';
                        echo '<dd>Nascimento: ' . $pessoa["nascimento"] . '</dd>';
                        echo '<dd>Sexo: ' . $pessoa["sexo"] . '</dd>';
                        echo '<dd>Estado: ' . $pessoa["estado"] . '</dd>';
                        echo '<dd>Telefone: ' . $pessoa["telefone"] . '</dd>';
                        echo '<dd>Observações: ' . $pessoa["observacoes"] . '</dd>';
                        echo '</fieldset>';
                    }
                }
                echo "</dl>";
            }
            else{
                echo 'Não existem pessoas cadastradas';
            }
        ?>
    </body>
</html>
