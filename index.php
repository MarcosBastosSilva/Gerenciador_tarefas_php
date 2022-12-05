<?php
session_start();

if (!isset($_SESSION['tasks']) ) {
    $_SESSION['tasks'] = array();
}


if (isset($_GET['clear']) ){
    unset($_SESSION['tasks']);
}


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Gerenciador de Tarefas</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Gerenciador de Tarefas</h1>
        </div>
        <div class="form">
            <form action="task.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="insert" value="insert">
                <label for="task_name">Tarefa:</label>
                <input  type="text" minlength=3  name="task_name"  placeholder="Nome da Tarefa" required>
                <label for="task_description">Descrição:</label>
                <input type="text" name="task_description" placeholder="Descrição da Tarefa" required>
                <label for="task_date">Data</label>
                <input type="date" name="task_date" required> 
                <label for="task_image">Imagem:</label>
                <input type="file" name="task_image">
                <button type="submit">Cadastrar</button>
            </form>
        </div>
        <div class="separetor"></div>
        <div class="list-tasks">
            <?php
                if (isset($_SESSION['tasks'])){
                    echo "<ul>";

                    foreach ($_SESSION['tasks'] as $key => $task){
                        echo "<li>
                                <a href='details.php?key=$key'>". $task['task_name'] ."</a>
                                <button type='button' class='btn-clear' onclick='deletar$key()'>Remover</button>
                                <script>
                                    function deletar$key(){
                                        if(confirm('Confirmar remoção?') ) {
                                            window.location = 'http://localhost/task.php?key=$key';
                                        }
                                        return false;
                                     }
                                </script>
                            </li>";
                    }
                    echo "</ul>";
                }
            ?>
        </div>
        <div class="footer">
            <p>Desenvolvido por Marcos Vinicius</p>
            <div class="links">
                <a href="https://www.linkedin.com/in/marcos-vinicius-silva-68b203158/" target="_blank"><img src="img/linkedin.png" alt="linkedin" ></a>
                <a href="https://github.com/MarcosBastosSilva" target="_blank"><img src="img/github.png" alt="github" ></a>
            </div>
        </div>
    </div>
</body>
</html>