$(document).ready(function(){

  $('#btn').click(function(){

     validate();
  });

});


  function validate(){

    var Username =document.logo.Username.value;
    var Password=document.logo.Password.value;

    if (Username==null || Username==""){
      alert("Username can't be blank");
      return false;
      }
      if(Password.length<8){
        alert("Password must be at least 8 characters long.");
        return false;
      }
      if((Username!=null || Username!="") && (Password.length>=8)){

      }

  }
