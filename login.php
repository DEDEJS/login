<?php 
/*
Feito por André Aparecido Pereira Silva.
Contatos:
Email:andreaparecido892@gmail.com
Facebook:https://www.facebook.com/andre.aparecido.501
versions:

Versão do MySQL:
5.7.19 -

Versão do Apache :
2.4.27  - 
Versão do PHP :
5.6.31  - 
*/
//classe de validação
class valida{
 public function valida_input(){
 if(isset($_POST['nome']) && isset($_POST['email'])){
$name = $_POST['nome'];
$email = $_POST['email'];
 if(strlen($name)<=0 && strlen($email)<=0){
 	echo "Nenhum resultado foi encontrado.";
 }else if(strlen($name)>=21){
    echo "Nenhum resultado foi encontrado.";
 }else if(preg_match("/([0-9])/", $name)){
 	echo "Nenhum resultado foi encontrado.";
 }else if(!preg_match("/([a-zA-Z])/", $name)){
    echo "Nenhum resultado foi encontrado.";
 }else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
     echo "Nenhum resultado foi encontrado.";  
 }else{
  include_once"banco.php";
  $sql = "SELECT * FROM login";
  $sql_query = mysqli_query($conecta,$sql);
  while($sql_linha = mysqli_fetch_array($sql_query)){
  	$sql_id = $sql_linha['id'];
  	$sql_name = $sql_linha['nome'];
  	$sql_pass = $sql_linha['senha'];
  	$sql_email = $sql_linha['email'];
     if($sql_name == $name){
     	if(true){//
     	   
           header('location:logado.php');

     	}
     }else{
     $a = false;
     }
}//final while
if($a == false){
	echo "Nenhum resultado foi encontrado.";
}
}
}//isset post['nome'] && isset post['email']
}// final da função valida_input()

}// final class
$class = new valida();
?>
<!DOCTYPE HTML>
<html lang="pt-br">
 <head>
  <meta charset="utf-8">
  <title>Login</title>	
 </head>
<body>
 <h3>Login</h3>
<?php
?>
<?php
echo $class->valida_input();
?>
<form method="POST" action="login.php">
 <h3>Nome ou senha.</h3>
 <input type="text" name="nome" placeholder="Nome ou Senha"  maxlength="20" value="<?php if(isset($_POST['nome'])){echo $_POST['nome'];} ?>" >

<h3>Email.</h3>
 <input type="email" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>" >

 <input type="submit" name="submit">
</form>
</body>
</html>
