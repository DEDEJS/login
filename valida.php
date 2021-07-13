<?php
ini_set('default_charset','UTF-8');
include_once("session.php");
  
class valida{
  private $Email;
  private $ValidaEmail;
  private $Senha;
  private $ValidaSenha;
  private $conn;

  private $ValidaDados;
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
    public function ValidaLogar(){
        if($this->ValidaEmail == false )  { 
              return;
        }else if($this->ValidaSenha == false){
              return;
        }else{
            /* Valida no banco*/
            $email = $this->Email;
            $senha = $this->Senha; 
            try{
                $conn = $this->conn = new PDO('mysql:host=localhost;dbname=login-git', "root", "root");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          }catch(PDOException $error) {
            //  echo 'ERROR: ' . $error->getMessage();
              $Error = fopen("arquivo.txt", "a+");//arquivo de erros do banco de dados
              date_default_timezone_set('America/Sao_Paulo');

$Mensagem = "!!!!!! Error No SQL >>>>>". $error->getMessage()."<< Data >>". date('d/m/Y H:i')." -----" ;
fwrite($Error,$Mensagem);
fclose($Error);
          }
         $email = FILTER_VAR($email,FILTER_SANITIZE_EMAIL);
         $senha = FILTER_VAR($senha,FILTER_SANITIZE_SPECIAL_CHARS);
         
         $Select = $conn->query("SELECT id,email,senha FROM dados");

while ($Tabela = $Select->fetch(PDO::FETCH_ASSOC)) {
  $IdTabela = $Tabela['id'];
  $emailTabela = $Tabela['email'];
  $senhaTabela = $Tabela['senha'];
     

}
if($email == $emailTabela && $senha == $senhaTabela){
  $this->ValidaDados = array($IdTabela,$emailTabela,$senhaTabela);
}else{
  $this->ValidaDados = false;
 
}
        }
    }
    public function Logar(){
       if(is_array($this->ValidaDados)){
            $_SESSION['UserEstado'] = "on";
            $_SESSION['IdUser'] = $this->ValidaDados['0'];
           echo $_SESSION['EmailUser'] = $this->ValidaDados['1'];

          //  header("location:logado/logado.php");
       }else{
        unset($_SESSION['IdUser']);
        unset($_SESSION['EmailUser']);
       }
     
    }
} 

$session ->ValidaSession();
$session ->UserEstado();

$valida = new valida();
$valida -> GetEmail();
$valida -> GetSenha();
?>