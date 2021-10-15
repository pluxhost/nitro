function Config() {
  $("#act").html("Cargando ...");
  //General
  var Hotelname = $("#Hotelname").val();
  var RegUserIP = $("#RegUserIP").val();
  var mant = $("#mant").val();
  var reg = $("#reg").val();
  //Client
  var host = $("#host").val();
  var port = $("#port").val();
  var productdata = $("#productdata").val();
  var furnidata = $("#furnidata").val();
  var figuremap = $("#figuremap").val();
  var externaltexts = $("#externaltexts").val();
  var externalvariables = $("#externalvariables").val();
  var externalTextsOverride = $("#externalTextsOverride").val();
  var externalVariablesOverride = $("#externalVariablesOverride").val();
  var figuredata = $("#figuredata").val();
  var flashclienturl = $("#flashclienturl").val();
  var habboswf = $("#habboswf").val();

  $.ajax({
    type: "POST",
    url: "/VCD-StaffPanel/app/actions/ConfigHotel.php",
    data: {
      Hotelname: Hotelname,
      RegUserIP: RegUserIP,
      mant: mant,
      reg: reg,
      host: host,
      port: port,
      productdata: productdata,
      furnidata: furnidata,
      figuremap: figuremap,
      externaltexts: externaltexts,
      externalvariables: externalvariables,
      externalTextsOverride: externalTextsOverride,
      externalVariablesOverride: externalVariablesOverride,
      figuredata: figuredata,
      flashclienturl: flashclienturl,
      habboswf: habboswf
    },
    dataType: 'json',
    success: function (json) {
      if (json.reponse == 'ok') {
        $("#alert").html(json.message);
        $("#act").html("Actualizado");
      } else if (json.reponse == 'error') {
        $("#alert").html(json.message);
        $("#act").html("ERROR");
      }
    }
  });
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
{
xmlhttp=new XMLHttpRequest();
}
else
{
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
xmlhttp.open("POST","/VCD-StaffPanel/app/actions/buscador.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("q="+n);
}