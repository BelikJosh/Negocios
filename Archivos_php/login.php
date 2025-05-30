<style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  background: #ffffff;
}
input {
  border: none;
  outline: none;
}

input:focus::-webkit-input-placeholder {
  color: transparent;
}

.contenedor {
  width: 70%;
  display: grid;
  margin: 125px auto;
  background: #ffffff;
  box-shadow: 0px 0px 12px 15px #9da5a5;
  border-radius: 15px;
  grid-template-columns: repeat(2, 1fr);
  grid-template-areas: "img formulario";
}

.formulario {
  grid-area: formulario;
  padding: 20px 10px 20px 0;
}

h2 {
  text-align: center;
  color: #0e8a8a;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
    Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
  padding: 30px 0;
}

img {
  width: 445px;
  height: 550px;
  border-top-left-radius: 15px;
  border-bottom-left-radius: 15px;
}

.email {
  padding: 30px 10px 30px 0;
}

.email label {
  color: #343049;
  font-family: inherit;
  padding-right: 10px;
}

.email input {
  background-color: #f3f3f3;
  width: 60%;
  height: 45px;
}

.pass {
  padding: 30px 20px 30px 0;
}

.pass label {
  color: #343049;
  font-family: inherit;
  padding-right: 70px;
}

.pass input {
  background-color: #f3f3f3;
  width: 60%;
  height: 45px;
}

.btn {
  text-align: center;
  padding: 20px 0;
}

.btn input {
  color: #ffffff;
  background: #a5ecec;
  font-size: 14px;
  font-family: inherit;
  border-radius: 6px;
  padding: 15px 20px;
}

.btn input:hover {
  cursor: pointer;
}

.btn input:active {
  box-shadow: 2px 2px 0 0px #f1630f;
}

.enlace {
  text-align: center;
  padding-top: 20px;
}

.enlace a {
  text-decoration-line: none;
  font-family: inherit;
  padding-top: 20px;
  padding-left: 3px;
}
.enlace img {
  width: 30px;
  height: 20px;
}

/* .error {
  padding: 0 20px;
  color: rgb(190, 10, 10);
  text-align: center;
} */
</style>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Css/estilos.css">
  <title>Login</title>
</head>
<body>
  <div class="contenedor">
    <!-- <div class="imagen"> -->
      <img src="../img/fondo.avif" alt="">
    <!-- </div>  -->
    <div class="formulario">
      <h2>Iniciar sesión</h2>
      <div class="email">
        <label>Correo Electronico</label>
        <input type="text" name="email" id="email" placeholder="Email">
      </div>    
      <div class="pass">
        <label>Contraseña</label>
        <input type="password" name="pass" id="pass" placeholder="Password">
      </div>    

      <div class="btn">
        <input type="submit" value="Iniciar Sesión" id="boton" disabled>
      </div>
      <div class="enlace">
         <img src="../img/logo_google..jpg">
         <?php require ('autentication.php')?>
        <a href="<?php echo $client->createAuthUrl() ?>">Iniciar sesión con Google</a>
      </div>
    </div>  
  </div>
  <script src="validar.js"></script>
</body>
</html>