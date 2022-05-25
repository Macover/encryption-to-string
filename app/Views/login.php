<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/login_styles.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="container__login-card">
            <h1 class="container__title">Iniciar sesión</h1>
            <?php
                if(isset($estatus)){
                    echo $estatus;
                }
            ?>            
            <form method="POST" action="index.php?controller=Usuario&action=verificaDatosLogin" class="container__form">
                <input 
                    class="form__input-usuario"
                    type="text" 
                    placeholder="Usuario"
                    name="nombreUsuario"
                    require
                    />
                <input 
                    class="form__input-password"
                    type="password"
                    placeholder="Contraseña"
                    name="pass"  
                    require                  
                    />
                <button class="form__submit" type="submit">Entrar</button>
                <span class="container__span">Para crear una nueva cuenta click <a href="registro.php" class="span__a">aquí</a></span>
            </form>
        </div>
    </div>
</body>
</html>