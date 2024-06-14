<html>
    <head>
        <title>Criar Crusos</title>
    </head>
    <body>
        <h1>Criar Curso</h1>

        <form action="POST">
            Nome: <input type="text" name="nome"><br>

            <input type="submit" value="Criar curso">

            <?php 
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                   $data = ['nome' => $_POST['nome']];

                   $option = [
                        'http' => [
                            'header' => "Content-type:application/json\r\n",
                            'method' => 'POST',
                            'content' => json_encode($data),
                        ],
                    ];

                    $context = stream_context_create($option);

                    $result = file_get_contents('http://127.0.0.1:5000/cursos', false, $context);

                    if($result === FALSE){
                        echo 'erro ao criar curso!';
                    }else{
                        header('location: cursos.php');
                    }
                }
            ?>
        </form>

    </body>
</html>