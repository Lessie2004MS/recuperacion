<?php
error_reporting(0);
include'includes/conecta.php';
if (isset($_POST['enviar'])) {
//$user = 'montselessie05@gmail.com';
//$pass = 'contraseña';
// $ruser = $_POST['usuario'];
//$rpass = $_POST['contraseña'];

 if($user == $ruser && $pass == $rpass){
  $mensaje.="<div class='alert alert-warning alert-dismissible fade show' role='alert'>
             <strong>Bien hecho</strong> tus datos son correctos.
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          </button>
            </div>";
            header("location:index1.php");
          }

 else {
   $mensaje.="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
             <strong>Error</strong> por favor vuelva a intentarlo.
             <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
             </button>
            </div>";
 }


}
$ruser = $conecta->real_escape_string($_POST['usuario']);
$rpass = $conecta->real_escape_string(md5($_POST['contraseña']));
echo $ruser. $rpass;
$consulta = "SELECT * FROM usuario WHERE correo = '$ruser' and contraseña = ´$rpass";
if ($user == $ruser && $pass == $rpass) {
  while($row = $resultado->fetch_array()){
    $userok = $row['correo'];
    $passwordok = $row['contraseña'];
  }
$resultado->close();
}
$conecta->close();
if (isset($ruser) && isset($rpass)) {
  if ($ruser == $userok && $rpas == $passwordok) {
  $_SESSION['login'] = TRUE;
  $_SESSION['usuario'] = $usuario;
  header("location:index1.php");
  }
  else {
    $mensaje.="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
               <strong>Error,</strong> por favor vuelve a intentarlo.
             <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
             <span aria-hidden='true'>&times;</span>
            </button>
              </div>";
  }
}
else {
  $mensaje.="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
             <strong>Error,</strong> por favor vuelve a intentarlo.
           <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
           <span aria-hidden='true'>&times;</span>
          </button>
            </div>";
}
}
 ?>

<!DOCTYPE html>
 <html lang="e" dir="ltr">
  <head>
    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/fontello.css">
    <link rel="stylesheet" type="text/css" href="/css/preloader.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="js/query-3.5.1.min.js">  </script>
      <title>BellaLess</title>
  </head>
  <body>


    <div class="row justify-content-center h-100 py-4">
      <img src="img/logo1.png" alt="logo de la compania" class="rounded mx-auto d-blck" style="width:350px">
    </div>
    <div class="row justify-content-center h-100 py-4">
      <div class="col-sm-8 col-md-6 col-lg-6 rounded">
        <div class="row">
          <div class="col-sm-10 col-md-12 col-lg-12">




    <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="input-group mb-3">
        <span class="input-group-text" id="perfil">
          <svg class="bi" width="15" height="15" fill="currentColor">
<use xlink:href="main/icons/bootstrap-icons.svg#person-fill"/>
</svg>
</span>
        <input class="form-control" type="text" name="usuario" class="from-control" placeholder="user or e-mail" aria-label="username" aria-describedaby="usuario" required>
                  <div class="valid-feedback">tu usurio es valido</div>
                  <div class="invalid-feedback">no es valido, favor de volver a intentar</div>
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text" id="perfil">
          <svg class="bi" width="15" height="15" fill="currentColor">
<use xlink:href="main/icons/bootstrap-icons.svg#lock-fill"/>
</svg>
</span>
        <input class="form-control" type="password" name="contraseña" class="from-control" placeholder="password" aria-label="password" aria-describedaby="contrseña" required>
        <div class="valid-feedback">Tu cotraseña es valida</div>
        <div class="invalid-feedback">Tu contraseña no es valida, favor de volver a intentar</div>
        </div>
        <div class="d-grid gap-2">
          <input type="submit" name="enviar" value="enviar"  class="btn btn-outline-primary">
        <!--  <button class="btn btn-outline-primary"  type="submit">Iniciar sesion</button> -->
        </div>
    </form>
<p> <a href="registrarme.html">Registrarme</a></p>

<?php echo $mensaje; ?>
  </body>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/preloader.js"></script>
  <script src="js/main.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</html>
