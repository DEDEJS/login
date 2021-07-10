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
