s
xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange = function(){
if(xmlhttp.readyState==4 && xmlhttp.statue ==200){
document.getElementById('chatscreen').innerHTML = xmlhttp.responseText;
}
}
xmlhttp.open('GET','chatbot.php?sendmsg= ' +sendmsg +'$rec=' +rec,true);
xmlhttp.send();
