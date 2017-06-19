$(document).ready(function(){
  $("#myTable1 tr").click(function(){
    $(this).addClass('selected').siblings().removeClass('selected');
    var value=$(this).find('td:first').html();

});

  $('.ok').on('click', function(e){
     alert($("#myTable1 tr.selected td:first").html());
  });
});


});


          // $('#dbtn').click(function(){
          //
          //    del();
          // })
          // $('#ubtn').click(function(){
          //
          //    upd();
          // })
          //
          //   function del(){
          //
          //     var Delete = document.delee.Delete.value;
          //
          //     if(Delete==null || Delete==""){
          //       alert("Enter the UID");
          //       return false;
          //       }
          //       else{
          //         alert('DELETE !');
          //      }
          //   }
          //
          //    function upd(){
          //
          //       var UID = document.upda.ContactNo.value;
          //       var Name = document.upda.Name.value;
          //       var Email = document.upda.Email.value;
          //       var Phone = document.upda.Phone.value;
          //       if(UID==null || UID==""){
          //         alert("Enter the UID for Updating..!");
          //         return false;
          //       }
          //
          //       if (Name==null || Name=="") {
          //         alert("Enter the Name");
          //       }
          //
          //       if (Email=="" || Email==null) {
          //           alert("Email is required");
          //         }
          //
          //       if (Phone==null || Phone=="") {
          //           alert("Enter the phone number ");
          //
          //    }
