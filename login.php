<?php 
/*
Feito por André Aparecido Pereira Silva.
Contatos:
Email:andreaparecido892@gmail.com
Facebook:https://www.facebook.com/andre.aparecido.501
            -----versions:----

PHP Version 7.4.8
Apache Version:Apache/2.4.43
*/
ini_set('default_charset','UTF-8');
include_once("valida.php");
if (session_status() == PHP_SESSION_NONE) {
  session_start();
   // inicia
}else{
 
}
?>
<!DOCTYPE HTML>
<html lang="pt-br">
 <head>
  <meta charset="utf-8">
  <title>Login</title>  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css.css">
  <meta name="author" content="André Aparecido">
  <meta name="description" content="Logar,Login">
  <script> 
     function ShowPassword(){
       $senha = document.getElementById('senha');
       $button =  document.getElementById('button');
       
   if(button.onclick){
     if($senha.type == "password"){
      $senha.type = 'text';
      $button.innerHTML = "Esconder Senha";
      return false;
     }
      else {
        $senha.type = 'password';
        $button.innerHTML = "Mostrar Senha";
        return false;
     
      }
    return false;
     }
     }
  </script>
 </head>
<body>
 
<?php
?>

<form method="POST" action="login.php">
<div class="login">
  <h2>Login</h2>
</div>
<div class="h3">
  <h3>Email</h3>
</div>
<div class="error">
  <?php 
     $valida ->ValidaEmai();
  ?>
</div>
<div> 
 <input type="email" name="Email" placeholder="Email"  value="<?php $valida -> ValueEmail(); ?>">
</div>

<div class="h3">
 <h3>Senha</h3>
</div>
 <div class="error">
  <?php
    $valida ->ValidaSenha();
  ?>
 </div>
 <div>
  <input type="password" name="senha"  placeholder="Sua Senha" id="senha" value="asss55">
  <p onclick="return ShowPassword();"  id='button'>Mostrar Senha</p>
 </div>
 
 <div>
  <input type="submit" name="submit" value="Logar" >
 </div>
</form>
<?php
$valida -> Loga();

?>
</body>
</html>
