$(document).ready(function(){

  $('#btn').click(function(){
     validate();
  });

});

  function validate(){

    var Username =document.creta.Username.value;
    var Email=document.creta.Email.value;
    var Password=document.creta.Password.value;

    if (Username==null || Username==""){
      alert("Username can't be blank");
      return false;
      }
      if(Password.length<8){
        alert("Password must be at least 8 characters long.");
        return false;
      }
      if(Email==null || Email==""){
        alert('Please enter the valid email');
        return false;
    }
  }
