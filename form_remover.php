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
            
            if(isset($_SESSION["cadastros"])){
        ?>
                <form action="remover.php" method="post">
                    <label>Selecione a pessoa que deseja remover:</label><br/>
                    <select name="id">
                        <?php
                            foreach($_SESSION["cadastros"] as $id => $pessoa){
                                if ($pessoa != NULL) {
                                    echo "<option value='$id'>" . $pessoa["nome"] . '</option>';
                                }
                            }
                        ?>
                    </select>
                    <br/><br/>
                    <input type="submit" value="Enviar" />
                </form>
        <?php
            }
            else{
                echo 'Não existem pessoas para remover';
            }
        ?>        
    </body>
</html>
