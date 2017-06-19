$(document).ready(function(){

    $('#showbtn').click(function(){  //on chat button click
       myFunction();
    });

    $('#chatype').keydown(function (e){  //To check wheather ENTER key is pressed
       if(e.keyCode == 13){
         var chatInput = document.getElementById("chatInput");
         var sendmsg = chatInput.value;


         var chatId = document.getElementById("DestinationUser");
         var rec = DestinationUser.value;
            $('#chatscreen').append(sendmsg + '<br/>');

            $.ajax ({                      //ajax to send the two variables to chatbot.php
              type: "POST",
              url: 'chatbot.php',
              data: {sendmsg : sendmsg, rec : rec},
              cache:false,
              success: function(data)
              {
                $('#chatInput').val("");     // for clearing the text-field after it text is passed
              }
          });
      }
    });

});

  function myFunction() {                //myFunction on the chat button call

      var x = document.getElementById('chatbox'); //TO HIDE AND SHOW THE CHAT-BOX
      if (x.style.display === 'block') {
          x.style.display = 'none';
      } else {
          x.style.display = 'block';
      }
                                                                        //TO FIND THE ID OF THE ROW
      var table = document.getElementById("myTable");
      var rows = table.getElementsByTagName("tr");
      for (i = 0; i < rows.length; i++) {
         var currentRow = table.rows[i];
         var createClickHandler = function(row) {
               return function() {
                     var cell = row.getElementsByTagName("td")[1];
                     var id = cell.innerHTML;

                     document.getElementById("DestinationUser").value = id;   //passing the id value to the hidden field

               };
             };
             currentRow.onclick = createClickHandler(currentRow);
          }
      setInterval(function(){$('#chatscreen').load(second())} , 3000); //setInterval function - reload every 3 seconds
  }


  function second()
  {
    var chatId = document.getElementById("DestinationUser");
    var rec = DestinationUser.value;

    $.ajax({
      type: "POST",
      url: 'chatbot2.php',
      data: {rec : rec},
      dataType:"JSON",
      cache:false,
      success: function(data)
      {
        console.log(data);
        for(i = 0; i < data.length; i++){
          var str =  '<div>' + data [i] + '</div>' ;
        }
              $('#chatscreen').append(JSON.stringify(str));

      }
    });

  }
