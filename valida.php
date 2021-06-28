<?php
ini_set('default_charset','UTF-8');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
     // inicia
  }else{
   
  }
class valida{
  private $Email;

  private $Senha;
    public function GetEmail(){
        if(isset($_POST['Email'])){
            $this->Email = $_POST['Email'];  
            return;
        }
        
            $this->Email = false;
        
    }
    public function GetSenha(){
        if(isset($_POST['senha'])){
            $this->Senha = $_POST['senha'];
           return;
        }
        $this->Senha = false;
    }
    public function ValidaEmai(){
        $email = $this->Email;  
        if($email == false){
             echo "Campo Email Vázio";
          } else{
              echo "valida";
          }
    }
    public function ValidaSenha(){
        $senha = $this->Senha;
         if($senha == false){
             echo "Campo Senha Vázio";
         }else{
             echo "valida";
         }
    }
}
$valida = new valida();
$valida -> GetEmail();
$valida -> GetSenha();
?>