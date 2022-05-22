<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/login_styles.css">
    <title>Registro</title>
</head>
<body>
    <div class="container">
        <div class="container__login-card">
            <h1 class="container__title">Crear una nueva cuenta.</h1>
            <form action="#" class="container__form">
                <input 
                    class="form__input-usuario"
                    type="text"
                    placeholder="Nombre de usuario"/
                    name="usuarioReg"
                    >
                <input 
                    class="form__input-usuario" 
                    type="email"
                    placeholder="Correo" 
                    name="correoReg"
                    />                
                <input 
                    class="form__input-password"
                    type="password"
                    placeholder="Contraseña"
                    name="passReg"
                    />
                <button class="form__submit" type="submit">Registrarse</button>
                <span class="container__span">Para iniciar sesion haga click <a href="login.php" class="span__a">aquí</a></span>
            </form>
        </div>
    </div>
</body>
</html>