<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Adicionar Usuário</h1>
    <form method="POST" action="adicionar_action.php">
        <label>
            Nome:<br/>
            <input type="text" name="name" />
        </label><br/><br/>

        <label>
            E-mail:<br/>
            <input type="email" name="email" />
        </label><br/><br/>

        <input type="submit" value="Adicionar" />

    </form>    

</body>
</html>