<?php
ini_set('default_charset','UTF-8');

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
        $_SESSION['UserEstado'] = "off";
        if(isset($_SESSION['UserEstado'])){
           if($_SESSION['UserEstado'] == "on"){
              echo "Usuário Logado";
              die();
           }
        }
    }
  }

class valida{
  private $Email;
  private $ValidaEmail;
  private $Senha;
  private $ValidaSenha;
  private $conn;
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
        /* Campo Email Nao pode te menos de 6 caracteres e o máximo de caracteres é 256 */
        $email = $this->Email;  
        if($email == false){
             echo "Campo Email Vázio";
          } else{
              $this->ValidaEmail = false;
              if(strlen($email) <=5){
                echo "Email Inválido";
              }else if(strlen($email)>=257){
                echo "Email Inválido";
              }else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                  echo "Email Inválido";
              }else{ 
                 $this->Email = $email;
                 $this->ValidaEmail = true;
              }
          }
    }
    
    public function ValidaSenha(){
        /* Campo Senha não pode ter menos de 6 caracteres e é obrigatorio te numeros e letras*/
        $senha = $this->Senha;
         if($senha == false){
             echo "Campo Senha Vázio";
         }else{
             $this->ValidaSenha = false;
             if(strlen($senha)<=5){
             echo "Senha Inválida";

             }else if(is_numeric($senha)){
              echo "senha invalida";
         }else if(ctype_alpha($senha)){
              echo "Senha inválida";
         }
             else{
                 $this->Senha = $senha;
                 $this->ValidaSenha = true;
             }
         }
    }
    public function ValueEmail(){
        /* Valor que era dentro do input email */
        echo htmlspecialchars($this->Email);
    }
    public function Loga(){
        if($this->ValidaEmail == false )  { 
              return;
        }else if($this->ValidaSenha == false){
              return;
        }else{
            /* Valida no banco*/
            $email = $this->Email;
            $senha = $this->Senha; 
            try{
                $conn = $this->conn = new PDO('mysql:host=localhost;test=um', "root", "root");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          }catch(PDOException $error) {
            //  echo 'ERROR: ' . $error->getMessage();
              $Error = fopen("arquivo.txt", "a+");//arquivo de erros do banco de dados
              date_default_timezone_set('America/Sao_Paulo');

$Mensagem = "!!!!!! Error No SQL ". $error->getMessage(). date('d/m/Y H:i');
fwrite($Error,$Mensagem);
fclose($Error);
          }
         $email = FILTER_VAR($email,FILTER_SANITIZE_EMAIL);
         $senha = FILTER_VAR($senha,FILTER_SANITIZE_SPECIAL_CHARS);
         /**/ 
        }
    }
}
$session = new session();
$session ->UserEstado();
$session ->ValidaSession();

$valida = new valida();
$valida -> GetEmail();
$valida -> GetSenha();
?>