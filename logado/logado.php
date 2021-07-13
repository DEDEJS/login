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
include_once("../session.php");
$session -> ValidaSession();
 class usuario{
   public function UsuarioEstado(){
 
      if(isset($_SESSION['EmailUser']) && isset($_SESSION['IdUser']) && isset($_SESSION['UserEstado'])){
          //    echo "Usuário logado";
      }else{
        header("location:../login.php");
      }
   }
 }
 $usuario = new usuario();
 $usuario ->UsuarioEstado();
?>
<!DOCTYPE HTML>
<html lang="pt-br">
 <head>
  <meta charset="utf-8">
  <title>Usuário Logado:</title>  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css.css">
  <meta name="author" content="André Aparecido">
  <style>
    body{
      background-color:gray;
    }
    nav{
      background-color:white;
      min-width:280px;
      max-width:100%;

    }
  
nav li{
 display:inline-block;
 background-color:#A9A9A9	; 
 margin-left:2%; 
}

nav a{
	padding:20px;
	display:inline-block;
	color:#fff;
	
}
nav a:hover{
color:#fff;
text-shadow:0px 0px 5px #fff;
}
nav li ul{
position:absolute;
display: none;
}
nav li:hover ul, nav li.over ul{display:block;}

nav li ul li{
display:block;
width:125px;
}
nav li:last-child{
	float:right; 
}
  </style>
  </head>

<body>
  <nav>
  <ul>
   <li><a href="">Seus Dados</a></li>  
 
   <li><a href="deslogar.php">Deslogar</a></li>
  </ul>
  </nav>
</body>
</html>