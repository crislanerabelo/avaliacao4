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
            
            if(isset($_SESSION["cadastros"])){
        ?>
                <form action="editar.php" method="post">
                    <label>Selecione a pessoa que deseja editar:</label><br/>
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
                    
                    <?php require_once('campos_pessoa.php'); ?>
                </form>
        <?php
            }
            else{
                echo 'Não existem pessoas para editar';
            }
        ?>        
    </body>
</html>
