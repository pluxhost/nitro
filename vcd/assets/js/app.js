
$('body').on("click", "[look]", function (e) {
  $('.look.choice').removeClass('selected');
  var look = $(this).attr('look'),
      gender = $(this).attr('gender');

  $(this).addClass('selected');

  $('#avatar-choice').attr('src', 'https://habbo.com/habbo-imaging/avatarimage?figure='+look);
  $('#avatar-choice').attr('gender', gender);
  $('#avatar-choice').attr('look', look);

});

function Notification(type, msg) {
  var error = $('.flash-error');
  $('#nError').addClass(type);
  if ( type == 'error') {
     $('#avatarN').attr('src', '/vcd/assets/img/error/avatar.png');
  } if ( type == 'success') {
  $('#avatarN').attr('src', '/vcd/assets/img/evacontente.png');
  }
  $('.flash-error').addClass('bounce');
  $('.flash-error').addClass('visible');
  $(".flash-error #nError span").html(msg);

  setTimeout(function () {
    $('.flash-error').removeClass('visible');
  }, 3000);
}

jQuery(function ($) {
  $(document).ready(function () {
    $('body').on('submit', '#registration', function () {
      var username = $('#username').val(),
        email = $('#mail').val(),
        reemail = $('#mail_confirmation').val(),
        password = $('#password').val(),
        repassword = $('#password_confirmation').val(),
        birthday = $('#birthday').val(),
        look = $('#avatar-choice').attr('look'),
        gender = $('#avatar-choice').attr('gender'),
        data = {
          username: username,
          email: email,
          reemail: reemail,
          password: password,
          repassword: repassword,
          birthday: birthday,
          look: look,
          gender: gender
        };
      $.ajax({
        url: '/vcd/actions/register.php',
        type: 'post',
        data: data,
        dataType: 'json',
        success: function (json) {
          if (json.reponse == 'ok') {
           Notification('success', json.msg);
            setTimeout(function () {
            window.location.href = "/home";
            }, 2000);
          } else if (json.reponse == 'error') {
            Notification('error', json.msg);
          } else {
            alert('che boludo');
          }

        }
      });

      return false;
    });
  });
});

jQuery(function ($) {
  $(document).ready(function () {
    $('body').on('submit', '#connection', function () {
      var username = $('#login-username').val(),
        password = $('#login-password').val(),
        data = {
          username: username,
          password: password
        };
      $.ajax({
        url: '/vcd/actions/login.php',
        type: 'post',
        data: data,
        dataType: 'json',
        success: function (json) {
          if (json.reponse == 'ok') {
            Notification('success', json.msg);
            setTimeout(function () {
            window.location.href = "/home";
            }, 2000);
          } else if (json.reponse == 'error') {
            Notification('error', json.msg);
          }
        }
      });
      return false;
    });
  });
});

$(document).ready(function () {
    $('body').on('keyup', '#login-username', function () {
        var user = $(this).val();
        var action = "&direction=2&gesture=sml&head_direction=3&size=b";
        if (user.length > 0) {
            $.ajax({
                type: "POST",
                url: "/vcd/actions/PlayerGetFigure.php",
                data: { user: user },
                dataType: 'json',
                success: function (json) {
                    var look = json.look;
                    $('.avatar-login > img').attr('src', look + action);
                }
            });
        }
    });
});


$(document).ready(function () {
    $('body').on('keyup', '#value', function () {
        var content = $(this).val();
        var count = 200 - content.length;
        $('#ct').html('Quedan '+count+' caracteres');
    });
});

var NewsSlider;
var currentNewsPage = 0;

window.onload = function () {
  NewsSliderPageStart();
};


function resetNewsSliderPage() {
  $(".cube#0").removeClass('active');
  $(".cube#1").removeClass('active');
  $(".cube#2").removeClass('active');
  $(".cube#3").removeClass('active');
  $(".cube#4").removeClass('active');

  $(".article.article-show.0").removeClass('active');
  $(".article.article-show.1").removeClass('active');
  $(".article.article-show.2").removeClass('active');
  $(".article.article-show.3").removeClass('active');
  $(".article.article-show.4").removeClass('active');
}


function NewsSliderPageStart() {
  clearInterval(NewsSlider);

  function NewsSliderInterval() {
    resetNewsSliderPage();

    $('.cube#' + currentNewsPage).addClass('active');
    $('.article.article-show.' + currentNewsPage).addClass('active');

    var allPage = $('.slidernews').find('.article.article-show').size();
    var hol = allPage - 1;

    if (currentNewsPage > hol) {
      currentNewsPage = 0;
      $(".cube#0").addClass('active');
      $('.article.article-show.0').addClass('active');
    } else {
      currentNewsPage++;
    }
  }
  NewsSlider = setInterval(NewsSliderInterval, 5000);
}


$('body').on("click", ".cube", function (e) {
  $('.look.choice').removeClass('selected');
  var pageid = $(this).attr('id');
  resetNewsSliderPage();
  $('.cube#' + pageid).addClass('active');
  $('.article.article-show.' + pageid).addClass('active');
});


$('body').on("click", ".select-button", function (e) {

  if ( $('.options').attr('style') == 'display: block;' ) {

    $('.chevron').removeClass('up');
    $('.options').css({
        display: 'none'
    });

  } else {

    $('.chevron').addClass('up');
    $('.options').css({
        display: 'block'
    });

  }
 

});


$('body').on("click", "[option_id]", function (e) {
  var option_id = $(this).attr('option_id'),
      title = $(this).attr('c_title');

  $('#category').attr('value', option_id);
  $('#c_title').html(title);

    $('.chevron').removeClass('up');
    $('.options').css({ display: 'none' });
    $('.option').attr('style', '');
    $(this).css({ color: '#5797f8' });

});



function balise(nom, argument) {
  if (typeof argument === 'undefined') {
    argument = '';
  }
  switch (nom) {
    case "createLink":
      argument = prompt("¿Cuál es la dirección del enlace?", "http://");
      break;
    case "insertImage":
      argument = prompt("¿Cuál es la dirección de la imagen?");
      break;
    case "code":
      var spanString = $('<code/>', { 'text': document.getSelection() }).prop('outerHTML');
      document.execCommand("insertHTML", false, spanString);
      break;
    case "H1":
      var spanString = $('<h1/>', { 'text': document.getSelection() }).prop('outerHTML');
      document.execCommand("insertHTML", false, spanString);
      break;
    case "H2":
      var spanString = $('<h2/>', { 'text': document.getSelection() }).prop('outerHTML');
      document.execCommand("insertHTML", false, spanString);
      break;
    case "H3":
      var spanString = $('<h3/>', { 'text': document.getSelection() }).prop('outerHTML');
      document.execCommand("insertHTML", false, spanString);
      break;
    case "square":
      var spanString = $('<li/>', { 'text': document.getSelection() }).css({ 'list-style': 'square' }).prop('outerHTML');
      document.execCommand("insertHTML", false, spanString);
      break;
    case "number":
      var spanString = $('<li/>', { 'text': document.getSelection() }).css({ 'list-style': 'lower-alpha' }).prop('outerHTML');
      document.execCommand("insertHTML", false, spanString);
      break;
    case "vertcolor":
      document.execCommand("foreColor", false, "#22B14C");
      break;
    case "bleucolor":
      document.execCommand("foreColor", false, "#4286CA");
      break;
  }
  document.execCommand(nom, false, argument);
  var selection = document.getSelection();
  selection.anchorNode.parentElement.target = 'blank';
}



function addPostForum() {
  $("#btnSubmit").attr("value", "Cargando...");
  var title = $("#title").val(),
      category = $("#category").val(),
      content = $('#content').html().replace(/<div>/gi, '<br>').replace(/<\/div>/gi, '');
  $.ajax({
    type: "POST",
    url: "/vcd/actions/ForumAddPost.php",
    data: {
      title: title,
      category: category,
      content: content
    },
    dataType: 'json',
    success: function (json) {
      if (json.reponse == 'ok') {
        Notification('success', json.msg);
        setTimeout(function () {
          location.href = "thread/" + json.id;
        }, 2000);
        //location.href = "thread/" + json.id;
      } else if (json.reponse == 'error') {
        $("#btnSubmit").attr("value", "Publicar tema");
        Notification('error', json.msg);
      }
    }
  });
}


function addCommentForum(id) {
  $("#btnSubmit").attr("value", "Cargando...");
  var content = $('#content').html().replace(/<div>/gi, '<br>').replace(/<\/div>/gi, '');
  $.ajax({
    type: "POST",
    url: "/vcd/actions/ForumAddComment.php",
    data: {
      id: id,
      content: content
    },
    dataType: 'json',
    success: function (json) {
      if (json.reponse == 'ok') {
        Notification('success', json.msg);
        $('#forumposts').append($(json.post).fadeIn(500));
        $('#content').html("Escribe aquí...");
        $("#btnSubmit").attr("value", "Publicar respuesta");
      } else if (json.reponse == 'error') {
        $("#btnSubmit").attr("value", "Publicar respuesta");
        Notification('error', json.msg);
      }
    }
  });
}

$('body').on("click", "[emoji]", function (e) {
  var emoji = $(this).attr('title');
  document.getElementById('value').value += ' '+emoji;
  $("#value").focus();

  var content = $('#value').val(),
      count = 200 - content.length;
  $('#ct').html('Quedan '+count+' caracteres');
});

function addCommentNews(id) {
  $("#btnnSubmit").attr("value", "Cargando...");
  var content = $('#value').val();
  $.ajax({
    type: "POST",
    url: "/vcd/actions/NewsAddComment.php",
    data: {
      id: id,
      content: content
    },
    dataType: 'json',
    success: function (json) {
      if (json.reponse == 'ok') {
        Notification('success', json.msg);
        $('.comments').append($(json.post).fadeIn(500));
        var content = $('#value').val('');
        $("#btnnSubmit").attr("value", "Publicar comentario");
      } else if (json.reponse == 'error') {
        $("#btnnSubmit").attr("value", "Publicar comentario");
        Notification('error', json.msg);
      }
    }
  });
}

function addTickets() {
  $("#btnSubmit").attr("value", "Cargando...");
  var subject = $("#subject").val(),
      category = $("#category").val(),
      content = $('#content').val(),
      screenshot = $('#screenshot').val();
  $.ajax({
    type: "POST",
    url: "/vcd/actions/TicketsAdd.php",
    data: {
      subject: subject,
      category: category,
      content: content,
      screenshot: screenshot
    },
    dataType: 'json',
    success: function (json) {
      if (json.reponse == 'ok') {
        Notification('success', json.msg);
        $("#btnSubmit").attr("value", "Enviar solicitud de ayuda");
        $('#addTicket').append(json.post);
        var subject = $("#subject").val(''),
            category = $("#category").val(''),
            content = $('#content').val(''),
            screenshot = $('#screenshot').val('');
        $('#c_title').html('Seleccione una opción');
      } else if (json.reponse == 'error') {
        $("#btnSubmit").attr("value", "Enviar solicitud de ayuda");
        Notification('error', json.msg);
      }
    }
  });
}


$('body').on("click", "[ticket]", function (e) {
  var ticket = $(this).attr('ticket');
  $('.body[ticketBody='+ticket+']').load("/vcd/load/Ticket.php?ticket=" + ticket, function (responseTxt, statusTxt, xhr) {
    if (statusTxt == "success") {
        if ( $('.body[ticketBody='+ticket+']').attr('style') == 'display: block;' ) {

    $('.body[ticketBody='+ticket+']').css({
        display: 'none'
    });

  } else {

    $('.body[ticketBody='+ticket+']').css({
        display: "block"
      });

  }


      
    }
  });
});


$('body').on("click", "[closeticket]", function (e) {
  var ticket = $(this).attr('closeticket');
    $.ajax({
    type: "POST",
    url: "/vcd/actions/TicketClose.php",
    data: {
      ticket: ticket
    },
    dataType: 'json',
    success: function (json) {
      if (json.reponse == 'ok') {
        Notification('success', json.msg);
         $('img#status'+ticket).attr('src', '/vcd/assets/img/ticket-close.png')
         $('.body[ticketBody='+ticket+']').append('<div class="response"><span class="title">Respuesta del ticket</span><i>¡Tu ticket aún no ha sido visto por un miembro del equipo!</i></div>');
         $('.btn[closeticket='+ticket+']').css({
          display: "none"
         });
      } else if (json.reponse == 'error') {
        Notification('error', json.msg);
      }
    }
  });
      
  });



function buyBadge(id, type) {
  $("#btnSubmit"+id).html("Cargando...");
  $.ajax({
    type: "POST",
    url: "/vcd/actions/BuyBadge.php",
    data: {
      id: id
    },
    dataType: 'json',
    success: function (json) {
      if (json.reponse == 'ok') {
        Notification('success', json.msg);
        $("#btnSubmit"+id).html("Comprar placa");
        if ( type == '0' ) {
        $("#"+id).html(json.available);
        } else if ( type == '1' ) {
        $(".available."+id).html(json.available);
        }
      } else if (json.reponse == 'error') {
        $("#btnSubmit"+id).html("Comprar placa");
        Notification('error', json.msg);
      }
    }
  });
}



jQuery(function ($) {
  $('body').on('click', 'a', function (e) {
    isClosed = true;
    var t = $(this).attr('href');
    if (t != "bye") {
      e.preventDefault();
    }

    if ($(this).attr('target') == "_blank" || $(this).attr('target') == "blank") {
      window.open(t, '_blank');
    } else {
      var e = $(this).attr('place');
      history.pushState({
        prevUrl: window.location.href
      }, null, t);
      var tdd = $(this).attr('href');
      var path = window.location.pathname;

      $(".app").load(t + " .app", function (responseTxt, statusTxt) {


        if (statusTxt === "success") {


          document.title = e;


          if (e == null) {
            document.title = "Habbo";
          }

          $('html, body').animate({
            scrollTop: 0
          }, 250);

        } else {
          window.location.href = "/error";
        }


      });
    }
  });
});


function addDedication() {
  $("#btnnSubmit").attr("value", "Cargando...");
  var content = $('#value').val();
  $.ajax({
    type: "POST",
    url: "/vcd/actions/AddDedication.php",
    data: {
      content: content
    },
    dataType: 'json',
    success: function (json) {
      if (json.reponse == 'ok') {
        Notification('success', json.msg);
        $('.content.newD').append($(json.post).fadeIn(500));
        var content = $('#value').val('');
        $("#btnnSubmit").attr("value", "Hacer una dedicatoria por 10 diamantes");
      } else if (json.reponse == 'error') {
        $("#btnnSubmit").attr("value", "Hacer una dedicatoria por 10 diamantes");
        Notification('error', json.msg);
      }
    }
  });
}


function deleteDedication(id) {
  $.ajax({
    type: "POST",
    url: "/vcd/actions/DeleteDedication.php",
    data: {
      id: id
    },
    dataType: 'json',
    success: function (json) {
      if (json.reponse == 'ok') {
        Notification('success', json.msg);
        $("#" + id).remove();
      } else if (json.reponse == 'error') {
        Notification('error', json.msg);
      }
    }
  });
}