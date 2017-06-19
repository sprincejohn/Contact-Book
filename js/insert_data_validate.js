$(document).ready(function(){

  $('#btn').click(function(){
     validate();
  });

});

  function validate(){

    var Name =document.ins.Name.value;
    var Email=document.ins.Email.value;
    var Phone=document.ins.Phone.value;

    if (Name==null || Name==""){
      alert("Name can't be blank");
      return false;
      }

    if(Email==null || Email==""){
        alert("Email is not valid");
        return false;
      }

    if(Phone.length<10){
        alert("Phone Numbers must be 10 characters long.");
        return false;
      }

    if(Phone.length>10){
        alert("There is more than 10 numbers in phone number.");
        return false;
      }

  }
