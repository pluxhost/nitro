$('#ordi_message').click(function(){setTimeout(function(){$('#inscriptionpseudo').focus();},1300);});$('#a_19e2_0').click(function(){setTimeout(function(){$('#inscriptionpseudo').focus();},1300);});function changeAvatar(a){if(a.length>2){DataCall({action:"GetLook",controller:"User",username:a},function(data){var b=jQuery.parseJSON(data);if(b.valid=="true"){$("#imager").css("background","url(https://www.avatar-retro.com/habbo-imaging/avatarimage.php?figure="+ b.response+"&action=wlk&direction=4&head_direction=4&img_format=png&gesture=sml&size=b)");}else{$("#imager").css("background","none");}});}else{$("#imager").css("background","none");}}
function DataCall(vars,callback){$.ajax({type:"POST",url:"https://www.adow.me/api/look",data:vars,success:function(data){callback(data);}});}
function snapchat(){swal({title:"Snapchat",type:"info",text:"Nom d'utilisateur: AdowFR"});}