<?php
class Session{
    /* Verifica Se O Usuário Esta Logado Ou Não */
    public function ValidaSession(){
      if (session_status() == PHP_SESSION_NONE) {
          session_start();
           // inicia
        }else{
         
        }
    }
    public function UserEstado(){
      if(isset($_SESSION['UserEstado'])){
         if($_SESSION['UserEstado'] == "on"){
          header("location:logado/logado.php");  
          die("Usuário Logado");

         }else{
         }
      }
  }
}
$session = new session();

?>