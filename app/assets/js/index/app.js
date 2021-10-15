function cambio(elemento){
  if ($(elemento).val() === "") {
		$(elemento).css("color", "#BF0A0A");
		$(elemento).css("border-color", "#BF0A0A");
  }
  else{
		$(elemento).css("color", "#2EAF33");
		$(elemento).css("border-color", "#2EAF33");
  }
}
function checkPass()
{
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    var goodColor = "#2EAF33";
    var badColor = "#BF0A0A";

    if(pass1.value == pass2.value){
			  pass2.style.color = goodColor;
        pass2.style.borderColor = goodColor;
				pass1.style.color = goodColor;
				pass1.style.borderColor = goodColor;
    }
    else{
        pass2.style.borderColor = badColor;
        pass2.style.color = badColor;
    }

    if(pass1.length > 5){
        pass1.style.borderColor = goodColor;
        pass1.style.color = goodColor;
    }

}
$('#username').keyup( function() {
    var username = $(this).val();
    var dataString = 'username='+username;
    $.ajax({
           type: "POST",
           url: "/app/funciones/llamanombre.php",
           data: dataString,
           success: function(data) {
             if (data == "0"){
              $('#username').css("color", "#BF0A0A");
           		$('#username').css("border-color", "#BF0A0A");
            }else{
             $('#username').css("color", "#2EAF33");
             $('#username').css("border-color", "#2EAF33");
            }
           }

       });


});

$('#email').keyup( function() {
    var email = $(this).val();
    var dataString = 'username='+email;
    $.ajax({
           type: "POST",
           url: "/app/funciones/llamaemail.php",
           data: dataString,
           success: function(data) {
             if(data == "0"){
              $('#email').css("color", "#BF0A0A");
           		$('#email').css("border-color", "#BF0A0A");
            }
           }

       });


});


function loadlook()
{
var xmlhttp;

var n=document.getElementById('loadavatarimage').value;

if(n==''){
document.getElementById("imager").innerHTML="";
return;
}

if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("imager").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("POST","/app/funciones/llamalook.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("q="+n);
}

function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function validate() {
  var email = $("#email").val();
  if (validateEmail(email)) {
    $('#email').css("color", "#2EAF33");
    $('#email').css("border-color", "#2EAF33");
      }else{
        $('#email').css("color", "#BF0A0A");
        $('#email').css("border-color", "#BF0A0A");
  }
  return false;
}


function buscador()
{
var xmlhttp;

var n=document.getElementById('buscar').value;

if(n==''){
document.getElementById("resultado").innerHTML="";
return;
}

if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById('resultado').innerHTML="<p align='center'>cargando chaval</p>";
document.getElementById("resultado").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("POST","/app/funciones/buscador.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("q="+n);
}
