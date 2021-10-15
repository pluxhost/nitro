$("#loader").show();
console.log("\n" +
	" _    _       _     _            _____ _ _         \n" +
	"| |  | |     | |   | |          / ____(_) |        \n" +
	"| |__| | __ _| |__ | |__   ___ | |     _| |_ _   _ \n" +
	"|  __  |/ _` | '_ \\| '_ \\ / _ \\| |    | | __| | | |\n" +
	"| |  | | (_| | |_) | |_) | (_) | |____| | |_| |_| |\n" +
	"|_|  |_|\\__,_|_.__/|_.__/ \\___/ \\_____|_|\\__|\\__, |\n" +
	"                                              __/ |\n" +
	"                                             |___/ \n" +
	"© Copyright HabboPlux 2018. HabboPlux Network dessiné et développé par Anis pour HabboPlux.");

function returnimg() {
	var divs = document.getElementsByClassName('lazy');
	for (var i = 0; i < divs.length; i++) {
		var div = $(divs[i]);
		if (div.prop("tagName") == "IFRAME") {
			var src = "app/social/lazy.php";
		} else {
			var src = "app/assets/img/lazy.png";
		}
		div.attr("data-src", div.attr('src'));
		div.attr("src", src);
	}
}
(function (i, s, o, g, r, a, m) {
	i['GoogleAnalyticsObject'] = r;
	i[r] = i[r] || function () {
		(i[r].q = i[r].q || []).push(arguments)
	}, i[r].l = 1 * new Date();
	a = s.createElement(o), m = s.getElementsByTagName(o)[0];
	a.async = 1;
	a.src = g;
	m.parentNode.insertBefore(a, m)
})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
ga('create', 'UA-121886852-1', 'auto');
ga('send', 'pageview');
(function (root, ns, factory) {
	"use strict";
	if (typeof (module) !== 'undefined' && module.exports) {
		module.exports = factory(ns, root);
	} else if (typeof (define) === 'function' && define.amd) {
		define("detect-zoom", function () {
			return factory(ns, root);
		});
	} else {
		root[ns] = factory(ns, root);
	}
}(window, 'detectZoom', function () {
	var devicePixelRatio = function () {
		return window.devicePixelRatio || 1;
	};
	var fallback = function () {
		return {
			zoom: 1,
			devicePxPerCssPx: 1
		};
	};
	var ie8 = function () {
		var zoom = Math.round((screen.deviceXDPI / screen.logicalXDPI) * 100) / 100;
		return {
			zoom: zoom,
			devicePxPerCssPx: zoom * devicePixelRatio()
		};
	};
	var ie10 = function () {
		var zoom = Math.round((document.documentElement.offsetHeight / window.innerHeight) * 100) / 100;
		return {
			zoom: zoom,
			devicePxPerCssPx: zoom * devicePixelRatio()
		};
	};
	var chrome = function () {
		var zoom = Math.round(((window.outerWidth) / window.innerWidth) * 100) / 100;
		return {
			zoom: zoom,
			devicePxPerCssPx: zoom * devicePixelRatio()
		};
	}
	var safari = function () {
		var zoom = Math.round(((document.documentElement.clientWidth) / window.innerWidth) * 100) / 100;
		return {
			zoom: zoom,
			devicePxPerCssPx: zoom * devicePixelRatio()
		};
	}
	var webkitMobile = function () {
		var deviceWidth = (Math.abs(window.orientation) == 90) ? screen.height : screen.width;
		var zoom = deviceWidth / window.innerWidth;
		return {
			zoom: zoom,
			devicePxPerCssPx: zoom * devicePixelRatio()
		};
	};
	var webkit = function () {
		var important = function (str) {
			return str.replace(/;/g, " !important;");
		};
		var div = document.createElement('div');
		div.innerHTML = "1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>0";
		div.setAttribute('style', important('font: 100px/1em sans-serif; -webkit-text-size-adjust: none; text-size-adjust: none; height: auto; width: 1em; padding: 0; overflow: visible;'));
		var container = document.createElement('div');
		container.setAttribute('style', important('width:0; height:0; overflow:hidden; visibility:hidden; position: absolute;'));
		container.appendChild(div);
		document.body.appendChild(container);
		var zoom = 1000 / div.clientHeight;
		zoom = Math.round(zoom * 100) / 100;
		document.body.removeChild(container);
		return {
			zoom: zoom,
			devicePxPerCssPx: zoom * devicePixelRatio()
		};
	};
	var firefox4 = function () {
		var zoom = mediaQueryBinarySearch('min--moz-device-pixel-ratio', '', 0, 10, 20, 0.0001);
		zoom = Math.round(zoom * 100) / 100;
		return {
			zoom: zoom,
			devicePxPerCssPx: zoom
		};
	};
	var firefox18 = function () {
		return {
			zoom: firefox4().zoom,
			devicePxPerCssPx: devicePixelRatio()
		};
	};
	var opera11 = function () {
		var zoom = window.top.outerWidth / window.top.innerWidth;
		zoom = Math.round(zoom * 100) / 100;
		return {
			zoom: zoom,
			devicePxPerCssPx: zoom * devicePixelRatio()
		};
	};
	var mediaQueryBinarySearch = function (property, unit, a, b, maxIter, epsilon) {
		var matchMedia;
		var head, style, div;
		if (window.matchMedia) {
			matchMedia = window.matchMedia;
		} else {
			head = document.getElementsByTagName('head')[0];
			style = document.createElement('style');
			head.appendChild(style);
			div = document.createElement('div');
			div.className = 'mediaQueryBinarySearch';
			div.style.display = 'none';
			document.body.appendChild(div);
			matchMedia = function (query) {
				style.sheet.insertRule('@media ' + query + '{.mediaQueryBinarySearch ' + '{text-decoration: underline} }', 0);
				var matched = getComputedStyle(div, null).textDecoration == 'underline';
				style.sheet.deleteRule(0);
				return {
					matches: matched
				};
			};
		}
		var ratio = binarySearch(a, b, maxIter);
		if (div) {
			head.removeChild(style);
			document.body.removeChild(div);
		}
		return ratio;

		function binarySearch(a, b, maxIter) {
			var mid = (a + b) / 2;
			if (maxIter <= 0 || b - a < epsilon) {
				return mid;
			}
			var query = "(" + property + ":" + mid + unit + ")";
			if (matchMedia(query).matches) {
				return binarySearch(mid, b, maxIter - 1);
			} else {
				return binarySearch(a, mid, maxIter - 1);
			}
		}
	};
	var detectFunction = (function () {
		var func = fallback;
		if (!isNaN(screen.logicalXDPI) && !isNaN(screen.systemXDPI)) {
			func = ie8;
		} else if (window.navigator.msMaxTouchPoints) {
			func = ie10;
		} else if (!!window.chrome && !(!!window.opera || navigator.userAgent.indexOf(' Opera') >= 0)) {
			func = chrome;
		} else if (Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0) {
			func = safari;
		} else if ('orientation' in window && 'webkitRequestAnimationFrame' in window) {
			func = webkitMobile;
		} else if ('webkitRequestAnimationFrame' in window) {
			func = webkit;
		} else if (navigator.userAgent.indexOf('Opera') >= 0) {
			func = opera11;
		} else if (window.devicePixelRatio) {
			func = firefox18;
		} else if (firefox4().zoom > 0.001) {
			func = firefox4;
		}
		return func;
	}());
	var zoom = detectFunction().zoom,
		device = detectFunction().devicePxPerCssPx;
	return ({
		zoom: function () {
			return zoom;
		},
		device: function () {
			return device;
		}
	});
}));
var loader = $("#loader"),
	appContent = $("#appcontent"),
	html = $("html");
webZoom();

function webZoom() {
	html.css({
		"zoom": "1",
		"-ms-zoom:": "1",
		"-webkit-zoom": "1"
	});
	if (window.location.pathname !== "/register") {
		if (detectZoom.device() >= 1.20 && detectZoom.zoom() >= 1 && detectZoom.zoom() <= 1.1) {
			html.css({
				"zoom": "0.8",
				"-ms-zoom:": "0.8",
				"-webkit-zoom": "0.8"
			});
			$("#largeade").css({
				"zoom": "1.25",
				"-ms-zoom:": "1.25",
				"-webkit-zoom": "1.25"
			});
			$("#littleads").css({
				"zoom": "1.25",
				"-ms-zoom:": "1.25",
				"-webkit-zoom": "1.25"
			});
		} else if (detectZoom.zoom() == 0.9) {
			html.css({
				"zoom": "1.12",
				"-ms-zoom:": "1.12",
				"-webkit-zoom": "1.12"
			});
		} else if (detectZoom.zoom() == 1.25) {
			html.css({
				"zoom": "0.8",
				"-ms-zoom:": "0.8",
				"-webkit-zoom": "0.8"
			});
		}
	}
}
var index56 = $("#index56").html();
var h25 = $("#h25").html();
var siteConnected = true;
if (typeof index56 === 'undefined') {
	siteConnected = true;
} else if (typeof h25 === 'undefined') {
	siteConnected = false;
}

function setCurrentPage(url, title, param) {
	hotelManager.css({
		visibility: "hidden"
	});
	var path = window.location.pathname;
	if ((path == "/hotel" || path.substring(0, 7) == "/hotel/") && param != true) {
		document.title = "HabboPlux: Hotel";
		EntrerHotel();
		ga('send', 'pageview', 'app/load/Client.php');
	} else {
		document.title = "HabboPlux";
		loader.css({
			display: "block"
		});
		appContent.load(url + " #appcontent", function (responseTxt, statusTxt) {
			var z = $(responseTxt).find("#index56").html();
			if (typeof z !== 'undefined' && siteConnected) {
				location.reload();
			}
			if (statusTxt === "success") {
				document.title = title;
				html.css({
					"overflow": "auto"
				});
				returnimg();
				if (title == null) {
					document.title = "HabboPlux";
				}
				ga('send', 'pageview', url);
				7
				explore.grid();
				if (path === "/home" || path === "/index") {
					indexSliderPageStart();
				} else if (path === "/register") {
					var RegisterAnimPend = 0;
					$("#reg32").animate({
						top: "-450px"
					}, 15000);
					setInterval(function () {
						if (RegisterAnimPend == 0) {
							$("#reg32").animate({
								top: "0px"
							}, 15000);
						} else {
							$("#reg32").animate({
								top: "-450px"
							}, 15000);
						}
						RegisterAnimPend = 1 - RegisterAnimPend;
					}, 15000);
				} else if (path === "/shop/citycash") {
					dedipass();
					PorteMonnaie();
				} else {
					closePorteMonnaie();
				}
				loader.fadeOut(100);
				$('html, body').animate({
					scrollTop: 0
				}, 250);
				webZoom();
				displayGoogleAds();
				lazyload();
				lazyload();
				lazyload();
				lazyload();
			} else {
				window.location.href = "/error";
			}
		});
	}
}
$('body').on('click', 'a', function (e) {
	var t = $(this).attr('href'),
		r = $(this).attr('room');
	if (t == "hotel") {
		EntrerHotel();
		return false;
	} else if (typeof r != typeof undefined && r != false) {
		EntrerHotel(r);
		return false;
	} else {
		if (t != "deconnexion") {
			e.preventDefault();
		}
		if ($(this).attr('target') == "blank") {
			window.open(t, '_blank');
		} else {
			var e = $(this).attr('place');
			history.pushState(e, null, t);
			setCurrentPage(t, e);
		}
	}
});
window.addEventListener('popstate', function (e) {
	html.css({
		overflow: 'auto'
	});
	setCurrentPage(document.location, e.state);
});

function lazyload() {
	var t = window.scrollY,
		h = window.innerHeight;
	var divs = document.getElementsByClassName('lazy');
	for (var i = 0; i < divs.length; i++) {
		var div = $(divs[i]),
			x = div.offset().top,
			z = div.attr('src');
		if (x < (h + t + 50)) {
			if (z == "app/assets/img/lazy.png" || z == "app/social/lazy.php") {
				div.attr('src', div.data('src')).fadeOut(0).removeClass('lazy').removeAttr('data-src').fadeIn(1000);
			}
		}
	}
}
window.onscroll = lazyload;

function MenuScroll() {
	var c = $('.menu');
	if ($(window).scrollTop() > 98) {
		$(".head24x").css({
			width: "105px"
		});
		c.css({
			"position": "fixed",
			"z-index": "9999999"
		});

	} else {
		$(".head24x").css({
			width: "85px"
		});

		c.css({
			"position": "fixed",
			"z-index": "9999999"
		});
	}
}
$(window).scroll(MenuScroll);
MenuScroll();

function NewsSignale() {
	var n = $('#articlesignale');
	if ($(window).scrollTop() > 0) {
		n.css({
			"bottom": "18px",
			"right": "calc(15% - 70px)"
		});
	} else {
		n.css({
			"bottom": "calc(100% - 295px)",
			"right": "calc(15% - 70px)"
		});
	}
}
$(window).scroll(NewsSignale);
NewsSignale();
var thebody = $('body');
$(document).ready(function () {
	var x, y, top, left, down;
	thebody.on('mousedown', '#stories', function (e) {
		e.preventDefault();
		down = true;
		x = e.pageX;
		y = e.pageY;
		top = $(this).scrollTop();
		left = $(this).scrollLeft();
	});
	thebody.mousemove(function (e) {
		if (down) {
			var newX = e.pageX;
			$("#stories").scrollLeft(left - newX + x);
		}
	});
	thebody.mouseup(function (e) {
		down = false;
	});
});

function NewsLeft() {
	var a = $("#articlesui"),
		right = parseInt(a.css("right")) - 420;
	if (right > -420) {
		a.animate({
			right: right
		}, 200);
	}
}

function NewsRight() {
	var a = $("#articlesui"),
		right = parseInt(a.css("right")) + 420;
	if (right < 2200) {
		a.animate({
			right: right
		}, 200);
	}
}

function indexErrorLog(text) {
	var x = $("#indexerrorlog");
	x.append('<div id="nin47"><div id="nin48"></div> ' + text + ' </div>');
	setTimeout(function () {
		$("#nin47").remove();
	}, 3500);
}
$(document).ready(function () {
	$('body').on('submit', '#FormConnexion', function () {
		var identifiant = $('#identifiant').val(),
			captcha = $('#captcha').val(),
			password = $('#password').val(),
			random = Math.floor(Math.random() * (1 - 100000 + 1)) + 100000,
			data = {
				identifiant: identifiant,
				password: password,
				method: 'ajax',
				captcha: captcha
			},
			z = $("#nin24");
		if (identifiant == '' || password == '') {
			indexErrorLog("Por favor complete los campos vacíos.");
		} else {
			z.html(" <div id=\"nin25\"></div>Cargando...");
			$.ajax({
				url: $(this).attr('action'),
				type: $(this).attr('method'),
				data: data,
				dataType: 'json',
				success: function (json) {
					if (json.reponse == 'ok') {
						if (json.change) {
							$("#indexDisable").show();
						} else {
							window.location.href = "home";
						}
					} else if (json.reponse == 'erreur') {
						z.html(" <div id=\"nin25\"></div>Conectarme");
						indexErrorLog(json.text);
					} else if (json.reponse == 'suspendida') {
						indexErrorLog(json.text);
					} else if (json.reponse == 'bannis') {
						location.href = "ban/" + json.id;
					} else if (json.reponse == 'captcha') {
						indexErrorLog("El captcha es incorrecto.");
						$('#loadcaptchaa > img').attr('src', 'app/captcha/captchacolor.php?figure=' + random);
						z.html(" <div id=\"nin25\"></div>Conectarme");
						$("#indexcaptcha").css({
							display: 'block'
						});
					} else if ('staff') {
						$("#secu1").css({
							visibility: "visible"
						});
					}
					ga('send', 'event', 'Connexion', 'app/actions/Connection.php');
				}
			});
		}
		return false;
	});
});

function loadlook() {
	var xmlhttp;
	var n = document.getElementById('identifiant').value;

	if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else { // code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("indexfigure").innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("POST", "/app/actions/PlayerGetFigure.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("q=" + n);
}


$(document).ready(function () {
	$('body').on('keyup', '#identifiant', function () {
		var user = $(this).val(),
			x = $('#indexusername > x');
		if (user == '') {
			x.html("HEY");
		} else {
			x.html(user);
		}
		var identifiant = document.getElementById('identifiant').value;
		var action = "&head_direction=2&headonly=1";
		var data = 'username=' + identifiant + '&action=' + encodeURIComponent(action);
		if (user.length > 0) {
			$.ajax({
				type: "GET",
				url: "app/actions/PlayerGetFigure.php",
				data: data,
				dataType: 'json',
				success: function (json) {
					var look = json.reponse;
					$('#indexfigure > img').attr('src', look);
					ga('send', 'event', 'Recuperando un avatar', 'app/actions/PlayerGetFigure.php');
				}
			});
		}
	});
});
var delay = (function () {
	var timer = 0;
	return function (callback, ms) {
		clearTimeout(timer);
		timer = setTimeout(callback, ms);
	};
})();
$(document).ready(function () {
	$('body').on('keyup', '#registerusername', function () {
		var x = $(".rusernamepend");
		var z = $(".rusernamenn");
		var r = $(".rusernameok");
		var l = $(".ronenext");
		z.hide();
		r.hide();
		l.css({
			filter: "grayscale(90%)"
		});
		l.attr("onclick", "");
		var username = $('#registerusername').val();
		x.show();
		delay(function () {
			$.ajax({
				type: "POST",
				url: "app/actions/RegistrationChecker.php",
				data: {
					type: "username",
					word: username
				},
				dataType: 'json',
				success: function (json) {

					if (json.reponse) {
						x.hide();
						r.show();
						registerUsernameCheck = true;
						if (registerCheckBoxC && registerUsernameCheck) {
							l.css({
								filter: "grayscale(90%)"
							});
							l.attr("onclick", "registerStepOne()");
						}

					} else {
						registerUsernameCheck = false;
						x.hide();
						z.show();
					}
					ga('send', 'event', 'Verificación para el registro', 'app/actions/RegistrationChecker.php');
				}
			});
		}, 500);
	});
});
$(document).ready(function () {
	$('body').on('keyup', '#registeremail', function () {
		var x = $(".rmailpend");
		var z = $(".rmailnn");
		var r = $(".rmailok");
		x.hide();
		z.hide();
		r.hide();
		regEmailStatus = false;
		var username = $('#registeremail').val();
		x.show();
		delay(function () {
			$.ajax({
				type: "POST",
				url: "app/actions/RegistrationChecker.php",
				data: {
					type: "email",
					word: username
				},
				dataType: 'json',
				success: function (json) {
					if (json.reponse) {
						x.hide();
						r.show();
						regEmailStatus = true;
					} else {
						x.hide();
						z.show();
						regEmailStatus = false;
					}
					ga('send', 'event', 'Verificación para el registro', 'app/actions/RegistrationChecker.php');
				}
			});
		}, 500);
	});
});
var regPasswordStatus = false;
var regEmailStatus = false;
$(document).ready(function () {
	$('body').on('keyup', '#registermdp', function () {
		var z = $(".rmdpnn");
		var r = $(".rmdpok");
		z.hide();
		r.hide();
		regPasswordStatus = false;
		var username = $('#registermdp').val();
		if (username.length > 0) {
			if (username.length < 4) {
				z.show();
				regPasswordStatus = false;
			} else {
				r.show();
				regPasswordStatus = true;
			}
		}
	});
});
setInterval(function () {
	var l = $(".ronenext2");
	if (regEmailStatus && regPasswordStatus) {
		l.css({
			filter: "grayscale(0%)"
		});
		l.attr("onclick", "registerStepTwo()");
	} else {
		l.css({
			filter: "grayscale(90%)"
		});
		l.attr("onclick", "");
	}
}, 400);

function registerStepOne() {
	var x = $(".registerstepone");
	x.hide();
	$(".registersteptwo").show();
	$("#reg42").css({
		background: "rgb(140,234,168)"
	});
	$("#reg43").css({
		background: "rgb(255,209,179)"
	});
}
var registerCheckBoxC = false;
var registerUsernameCheck = false;

function registerCheckBox() {
	var x = $("#reg35");
	var l = $(".ronenext");
	l.css({
		filter: "grayscale(90%)"
	});
	l.attr("onclick", "");
	if (x.css("background-color") === "rgb(255, 255, 255)") {
		x.css({
			background: "transparent"
		});
		registerCheckBoxC = false;
	} else {
		x.css({
			background: "white"
		});
		registerCheckBoxC = true;
	}
	if (registerCheckBoxC && registerUsernameCheck) {
		l.css({
			filter: "grayscale(0%)"
		});
		l.attr("onclick", "registerStepOne()");
	}
}
var registerGender, registerMdp, registerUsername, registerEmail, registerFigure;

function registerStepTwo() {
	registerMdp = $('#registermdp').val();
	registerUsername = $('#registerusername').val();
	registerEmail = $('#registeremail').val();
	$("#reg2").hide();
	$("#reg16").show();
	$("#reg43").css({
		background: "rgb(140,234,168)"
	});
	$("#reg44").css({
		background: "rgb(255,209,179)"
	});
}

function registerStepThree(type) {
	registerGender = type;
	$("#reg25").text("Cargando ...");
	$.ajax({
		type: "POST",
		url: "app/actions/RegistrationChecker.php",
		data: {
			type: "look",
			gender: type
		},
		dataType: 'json',
		success: function (json) {
			jQuery.ajax({
				type: "GET",
				url: "https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit",
				dataType: "script",
				cache: true,
				success: function () {
					$("#reg16").hide();
					$("#reg26").show();
					registerFigure = json.id;
					$("#reg28").attr("src", json.look);
					$("#reg44").css({
						background: "rgb(140,234,168)"
					});
					$("#reg45").css({
						background: "rgb(255,209,179)"
					});
					ga('send', 'event', 'Verificación para el registro', 'app/actions/RegistrationChecker.php');
				}
			});
		}
	});
}

function registerStepFour() {
	$(".rlaststep").css({
		opacity: "0.7"
	});
	$.ajax({
		type: "POST",
		url: "app/actions/Registration.php",
		data: {
			method: "ajax",
			pseudo: registerUsername,
			mail: registerEmail,
			password: registerMdp,
			gender: registerGender,
			figure: registerFigure,
		},
		dataType: 'json',
		success: function (json) {
			if (json.reponse === "erreur") {
				notify("Oops! Actualice la página y vuelva a intentarlo.");
			} else if (json.reponse === "ok") {
				window.location = "hotel";
			}
			$(".rlaststep").css({
				opacity: "1"
			});
			ga('send', 'event', 'Registro', 'app/actions/Registration.php');
		}
	});
}
var onloadCallback = function () {
	grecaptcha.render('reg29', {
		'sitekey': '6LdwirgUAAAAAIZEUVqSRu9HQKahYHMY4OOsqG_a'
	});
	setInterval(function () {
		if (grecaptcha.getResponse().length !== 0) {
			$(".rlaststep").css({
				filter: "grayscale(0%)"
			}).html('<div id="reg10"></div>Comienza a jugar').attr("onclick", "registerStepFour()");
		}
	}, 100);
};

function LoadPageSupport(url, title) {
	var f = $("#footer31");
	f.html('Cargando...');
	$("#footer23").load(url, function (responseTxt, statusTxt, xhr) {
		if (statusTxt == "success") {
			f.html(title);
		} else {
			window.location.href = baseUrl + "/error";
		}
		ga('send', 'pageview', url);
	});
}

function OpenSupport(type, url) {
	var a = $("#footer31");
	if (type == "forum") {
		a.html('¿Necesita ayuda ?')
		LoadPageSupport(url, 'Abuso en el foro');
	} else if (type == "news") {
		a.html('Cargando...');
		LoadPageSupport(url, 'Abuso en la noticia');
	}
	$("#support").fadeIn(500);
	$("html").css({
		overflow: "hidden"
	});
}

function CloseSupport() {
	$("#support").fadeOut(500);
	$("html").css({
		overflow: "auto"
	});
}

function SelectForumSupport(id, pseudo, avatar) {
	$(".footer42").each(function () {
		$(this).css({
			background: 'transparent'
		});
	});
	$("#fofo" + id).css({
		background: 'rgb(127,127,127)'
	});
	$("#footer39").html(pseudo);
	$("#footer38").css({
		background: 'url(' + avatar + ')'
	});
	$("#content2").html(id);
}

function AnimateHelp() {
	var h = $("#footer47");
	h.animate({
		left: "10px"
	}, 70);
	h.animate({
		left: "-10px"
	}, 70);
	h.animate({
		left: "10px"
	}, 70);
	h.animate({
		left: "-10px"
	}, 70);
	h.animate({
		left: "10px"
	}, 70);
	h.animate({
		left: "-10px"
	}, 70);
	h.animate({
		left: "10px"
	}, 70);
	h.animate({
		left: "-10px"
	}, 70);
	h.animate({
		left: "10px"
	}, 70);
	h.animate({
		left: "0px"
	}, 70);
}

function SupportNext() {
	var x = $("#footer41"),
		a = $("#footer47"),
		b = $("#footer34"),
		c = $("#footer40");
	if (x.is(':visible')) {
		a.show();
		x.hide();
		b.text("Regresar");
		c.text("Elija el tema que mejor corresponda a su solicitud.");
	} else if (a.is(':visible')) {
		a.hide();
		x.show();
		c.text("Elija el habbo que va reportat.");
		b.text("Continuar");
	}
}

function SupportFinal(signalement) {
	var type = $("#type").html(),
		content = $("#content").html(),
		contenu_text = $("#content2").html(),
		xd = $("#footer34");
	xd.text("Cargando ...");
	$.ajax({
		type: "POST",
		url: "app/actions/Report.php",
		data: {
			type: type,
			content: content,
			contenu_text: contenu_text,
			signalement: signalement
		},
		dataType: 'json',
		success: function (json) {
			if (json.reponse == 'ok') {
				xd.animate({
					top: "200px"
				}, 100);
				$("#footer40").text("");
				xd.text("Actualizado! Tenga cuidado de no abusar de esta herramienta.");
				$("#footer47").hide(340);
			} else if (json.reponse == 'erreur') {
				AnimateHelp();
			}
			ga('send', 'event', 'Presentación de informes', 'app/actions/Report.php');
		}
	});
}

function clientHelpOpen() {
	$("#ai1").css({
		display: "block"
	});
	$("#ai1").load("app/load/HelpIndex.php", function (responseTxt, statusTxt) {
		if (statusTxt == "success") {
			helpPage("ticket");
			ga('send', 'pageview', 'app/load/HelpIndex.php');
		}
	});
}

function clientHelpSupport() {
	$("#ai1").css({
		display: "block"
	});
	$("#ai1").load("app/load/HelpIndex.php", function (responseTxt, statusTxt) {
		if (statusTxt == "success") {
			helpPage("support");
			ga('send', 'pageview', 'app/load/HelpIndex.php');
		}
	});
}

function helpOpen() {
	$("#ai1").css({
		display: "block"
	});
	$("#ai1").load("app/load/HelpIndex.php", function (responseTxt, statusTxt) {
		if (statusTxt == "success") {
			helpPage("index");
			ga('send', 'pageview', 'app/load/HelpIndex.php');
		}
	});
}

function helpPage(page) {
	$("#ai5").text("Cargando ...");
	$("#helpload").load("app/load/HelpCategory.php?page=" + page, function (responseTxt, statusTxt) {
		if (statusTxt == "success") {
			if (page === "index") {
				$("#ai5").text("Centro de ayuda");
				$("#ai6").attr("onclick", "helpClose()");
				helpConseils(0);
			} else if (page === "support") {
				$("#ai5").text("Servicio al cliente");
				$("#ai6").attr("onclick", "helpPage('index')");
			} else if (page === "ticket") {
				$("#ai5").text("Mis tickets");
				$("#ai6").attr("onclick", "helpPage('index')");
			}
			ga('send', 'pageview', 'app/load/HelpCategory.php?page=' + page);
		}
	});
}

function helpTicket(id) {
	$("#ai5").text("Cargando ...");
	$("#ai54").load("app/load/HelpTicket.php?id=" + id, function (responseTxt, statusTxt) {
		if (statusTxt == "success") {
			$("#ai5").text("Mi ticket");
			var wtf = $('#ai59');
			wtf.scrollTop(wtf[0].scrollHeight);
			ga('send', 'pageview', 'app/load/HelpTicket.php?id=' + id);
		}
	});
}

function helpTicketReponse(id) {
	$("#ai71").html('<div id="ai72"></div>Cargando ...');
	var content = $("#ai70").val();
	$.ajax({
		type: "POST",
		url: "app/actions/SupportTicketReponse.php",
		data: {
			ticketid: id,
			message: content
		},
		dataType: 'json',
		success: function (json) {
			if (json.type == 'error') {
				notify('Por favor, inténtalo de nuevo.');
			} else if (json.type == 'success') {
				helpTicket(id);
			}
			$("#ai71").html('<div id="ai72"></div>Responder');
			ga('send', 'event', 'Respuesta de soporte', 'app/actions/SupportTicketReponse.php');
		}
	});
}

function helpConditions() {
	helpClose();
	setCurrentPage('conditions', "HabboPlux: Términos y Condiciones", true);
	history.pushState("HabboPlux: Términos y Condiciones", null, "conditions");
}

function helpClose() {
	$("#ai1").css({
		display: "none"
	}).html("");
}

function helpConseils(conseil) {
	$("#ai5").text("Cargando ...");
	if (conseil === 0) {
		$("#ai27").css({
			visibility: "hidden"
		});
	} else {
		$("#ai27").css({
			visibility: "visible"
		});
	}
	$("#secionconseils").load("app/load/HelpContent.php?content=" + conseil, function (responseTxt, statusTxt) {
		if (statusTxt == "success") {
			$("#ai5").text("Centro de ayuda");
			ga('send', 'pageview', 'app/load/HelpContent.php?content=' + conseil);
		}
	});
}

function helpSupportStart() {
	$("#ai38").html('<div id="ai39"></div>Cargando ...');
	var importance = $(".aiimportance").val(),
		content = $('#editeur').html().replace(/<div>/gi, '<br>').replace(/<\/div>/gi, ''),
		type = $(".aitype").val(),
		nom = $("#ai35").val(),
		data = {
			sujetTitle: nom,
			category: type,
			priority: importance,
			details: content
		};
	$.ajax({
		type: "POST",
		url: "app/actions/SupportStartTicket.php",
		data: data,
		dataType: 'json',
		success: function (json) {
			if (json.type == 'error') {
				notify(json.message);
			} else if (json.type == 'success') {
				$("#ai31").html("").append('<div id="ai40">Su ticket ha sido recibido, puede seguir el progreso de su ticket en la lista de sus tickets.</div>');
			}
			$("#ai38").html('<div id="ai39"></div>Abrir mi ticket');
			ga('send', 'event', 'Comenzar un nuevo ticket', 'app/actions/SupportStartTicket.php');
		}
	});
}

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
		case "redcolor":
			document.execCommand("foreColor", false, "#ED1C24");
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

function Share(social, url) {
	window.open(social + url, "nom_popup", "menubar=no, status=no, scrollbars=no, menubar=no, width=200, height=100");
}

function React(contentid, type, position, classid, page) {
	var data = {
			contentid: contentid,
			type: type,
			page: page
		},
		a = $("#lecture32");
	$.ajax({
		type: "POST",
		url: "app/actions/ReactionSent.php",
		data: data,
		dataType: 'json',
		success: function (json) {
			if (json.reponse == 'new') {
				var nbre = parseInt($("." + classid).html()) + 1;
				$("." + classid).html(nbre);
				a.css({
					'background-position': position
				}, 100);
				$("#nbreact").html(parseInt($("#nbreact").html()) + 1);
			} else if (json.reponse == 'remove') {
				var nbre = parseInt($("." + classid).html()) - 1;
				$("." + classid).html(nbre);
				$("#nbreact").html(parseInt($("#nbreact").html()) - 1);
				a.css({
					'background-position': ''
				}, 100);
			} else if (json.reponse == 'edit') {
				var id = ".react" + json.type;
				var nbre = parseInt($("." + classid).html()) + 1;
				$(id).html(parseInt($(id).html()) - 1);
				$("." + classid).html(nbre);
				a.css({
					'background-position': position
				}, 100);
			}
			ga('send', 'event', 'Réaction', 'app/actions/ReactionSent.php');
		}
	});
}

function LikeStories(id) {
	x = $(".df" + id);
	s = $(".dx" + id);
	count = s.html();
	s.html('...');
	$.ajax({
		type: "POST",
		url: "app/actions/StoriesLike.php",
		data: {
			id: id
		},
		dataType: 'json',
		success: function (json) {
			if (json.type == '1') {
				s.html(parseInt(count) + 1);
				x.css({
					"opacity": "0.5"
				});
			} else if (json.type == '2') {
				s.html(parseInt(count) - 1);
				x.css({
					"opacity": "1"
				});
			}
			ga('send', 'event', 'Me gusta en la historia', 'app/actions/StoriesLike.php');
		}
	});
}

function FlecheStories() {
	var d = new Date();
	d.setTime(d.getTime() + (10 * 365 * 24 * 60 * 60 * 1000));
	var expires = "expires=" + d.toUTCString(),
		a = $(".stories");
	if (a.height() == 62) {
		document.cookie = "stories=open;" + expires + ";path=/";
		$('#profil20').animate({
			textIndent: 0
		}, {
			step: function (now, fx) {
				$(this).css('-webkit-transform', 'rotate(' + now + 'deg)');
			},
			duration: 250
		}, 'linear');
		a.animate({
			height: "195px"
		});
	} else {
		document.cookie = "stories=close;" + expires + ";path=/";
		$('#profil20').animate({
			textIndent: 180
		}, {
			step: function (now, fx) {
				$(this).css('-webkit-transform', 'rotate(' + now + 'deg)');
			},
			duration: 250
		}, 'linear');
		a.animate({
			height: "62px"
		});
	}
}
$('body').on('keydown', '.comediteur', function (event) {
	var keyCode = (event.keyCode ? event.keyCode : event.which);
	if (keyCode == 13) {
		return false;
	}
});

function AddCom(user, avatar, newsid, urank, ulink, posx) {
	var a = $("#lecture42"),
		b = $(".articlecomsend"),
		c = $("#commentairesliste");
	a.fadeOut();
	b.html("Cargando ...");
	var first = $("#commentairesliste").html(),
		contenu = $('#editeur').html().replace(/<div>/gi, '<br>').replace(/<\/div>/gi, '');
	$.ajax({
		type: "POST",
		url: "app/actions/NewsCommentsAdd.php",
		data: {
			contenu: contenu,
			newsid: newsid,
			link: ulink
		},
		dataType: 'json',
		success: function (json) {
			if (json.reponse == 'ok') {
				if (first == "Oye, se el primero en comentar!") {
					c.html("");
				}
				if (urank > 3) {
					c.prepend($('<div class="com" id="lecture40"><div id="habboforumbulle"style="left:73px;top:35px;"></div><div style="background-position-x:' + posx + ';" id="articlescombadge"></div><a href="profile/' + user + '"><div id="articlescomtete" style="background:url(' + avatar + ');z-index:3;height:150px;"></div></a><div id="lecture41"><div id="articlescomtext"><b>' + user + '</b> : ' + convertmention(contenu) + '</div></div></div> ').fadeIn());
				} else {
					c.prepend($('<div class="com" id="lecture40"><div id="habboforumbulle"style="left:73px;top:35px;"></div><a href="profile/' + user + '"><div id="articlescomtete" style="background:url(' + avatar + ');z-index:3;"></div></a><div id="lecture41"><div id="articlescomtext"><b>' + user + '</b> : ' + convertmention(contenu) + '</div></div></div> ').fadeIn());
				}
				b.html("Comentar");
			} else if (json.reponse == 'erreur') {
				a.fadeIn();
				$("#lecture44").html(json.message);
				b.html("Comentar");
			}
			ga('send', 'event', 'Comentario del artículo', 'app/actions/NewsCommentsAdd.php');
		}
	});
}

function nl2br(str, is_xhtml) {
	if (typeof str === 'undefined' || str === null) {
		return '';
	}
	var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
	return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
}

function convertmention(mention) {
	return mention.replace(/@([a-z\d_]+)/ig, '<a id="convertmention" href="profile/$1"><b>@$1</b></a>');
}

function Peti(myid, userid, type) {
	$.ajax({
		type: "POST",
		url: "app/actions/Solicitud.php",
		data: {
			myid: myid,
			userid: userid,
			type: type
		},
		dataType: 'json',
		success: function (json) {
			if (json.reponse == 'ppp') {
				$("#aja").html(json.button);
				$("#aja-" + myid + userid).html(json.button);
				$(".notification-" + myid + userid).html(json.sss);
			} else
				/*if (json.reponse == 'noppp') {
				$(".notification-" + myid + userid).html(json.sss);
			} else*/
				if (json.reponse == 'erreur') {
					notify(json.msg);
				}
		}
	});
}

function DeletePost(comid) {
	var data = 'id=' + comid;
	$.ajax({
		type: "POST",
		url: "app/actions/PostRemove.php",
		data: data,
		dataType: 'json',
		success: function (json) {
			if (json.reponse == 'ok') {
				$("#com" + comid).remove();
			} else if (json.reponse == 'erreur') {
				alert("Pequeño problema: error");
			}
			ga('send', 'event', 'Eliminar un post', 'app/actions/PostRemove.php');
		}
	});
}

function DeleteCom(comid) {
	var data = 'id=' + comid;
	$.ajax({
		type: "POST",
		url: "app/actions/NewsCommentsRemove.php",
		data: data,
		dataType: 'json',
		success: function (json) {
			if (json.reponse == 'ok') {
				$(".com" + comid).html('<div id="lecture40s">Comentario eliminado</div>');
			} else if (json.reponse == 'erreur') {
				alert("Pequeño problema: error");
			}
			ga('send', 'event', 'Eliminar un comentario de artículo', 'app/actions/NewsCommentsRemove.php');
		}
	});
}

function ForumPostAdd(threadid, figure, username, ulink) {
	var x = $("#forum42");
	x.html("Cargando ...");
	var message = $('#editeur').html().replace(/<div>/gi, '<br>').replace(/<\/div>/gi, '');
	$.ajax({
		type: "POST",
		url: "app/actions/ForumAddPost.php",
		data: {
			message: message,
			threadid: threadid,
			link: ulink
		},
		dataType: 'json',
		success: function (json) {
			if (json.reponse == 'ok') {
				$("#lecture42").fadeOut();
				x.html("Enviar mensaje");
				$('#forumposts').append($('<a style="color:white;" place="HabboPlux: ' + username + '" href="profile/' + username + '"><div  class="gjshd' + json.id + '" id="forum27"><div id="forum28"><div id="forum29"><div id="forum29x"></div><div id="forum29s"></div><div id="forum30" style="background:url(' + figure + ');"></div><div id="forum31"><h2>Par ' + username + '</h2></div><div id="forum32"></div><div id="forum33">Justo ahora</div></div><div id="forum34"><div id="forum54">Debes actualizar la página para ver tus placas</div></div></div></a><div id="forum37"><p><div id="forum37x"></div><div class="forummess' + json.id + '"id="motto">' + convertmention(message) + '</div><div id="forum61"></div><div onclick="ForumEditMsg(' + json.id + ')" id="forum62">Editar</div><div onclick="ForumAction(' + json.id + ',\'deletepostid\')"  class="fghjk' + json.id + '" id="forum63">Borrar</div></p></div></div>').fadeIn(500));
				$('#editeur').html("");
			} else if (json.reponse == 'erreur') {
				x.html("Enviar mensaje");
				$("#lecture42").fadeIn();
				$("#lecture44").html(json.message);
			}
			ga('send', 'event', 'Agregar una publicación en el foro', 'app/actions/ForumAddPost.php');
		}
	});
}

function ForumAction(threadid, type) {
	if (type == 'fijo') {
		$(".forumt4ep").html("...");
	}
	if (type == 'close') {
		$(".forumt4cl").html("...");
	}
	if (type == 'delete') {
		$(".forumt4de").html("...");
	}
	if (type == 'deletepostid') {
		$(".fghjk" + threadid).html("...");
	}
	$.ajax({
		type: "POST",
		url: "app/actions/ForumAction.php",
		data: {
			threadid: threadid,
			type: type
		},
		dataType: 'json',
		success: function (json) {
			if (json.reponse == 'fijo') {
				if (json.type == 'f1') {
					$(".forumt4ep").html("Fijar");
				} else if (json.type == 'f2') {
					$(".forumt4ep").html("Fijo");
				}

			} else if (json.reponse == 'close') {
				if (json.type == 'cadd') {
					$(".forumt4cl").html("Cerrar el tema");
				} else if (json.type == 'crem') {
					$(".forumt4cl").html("Abrir el tema");
				}
			} else if (json.reponse == 'delete') {
				window.location.href = "forum/my-subject";
			} else if (json.reponse == 'deletepostid') {
				$(".gjshd" + threadid).fadeOut();
			}
			ga('send', 'event', 'Acción en el foro', 'app/actions/ForumAction.php');
		}
	});
}

function Retweet(id) {
	$("html").css({
		overflow: "hidden"
	});
	$("#forum64").css({
		"display": "block"
	});
	$("#loadeditmsg").load("app/load/PostRetweet.php?id=" + id, function (responseTxt, statusTxt, xhr) {
		if (statusTxt == "success") {
			ga('send', 'pageview', 'app/load/PostRetweet.php?id=' + id);
		}
	});
}

function ReplyingMsg(id) {
	$("html").css({
		overflow: "hidden"
	});
	$("#forum64").css({
		"display": "block"
	});
	$("#loadeditmsg").load("app/load/Replying.php?id=" + id, function (responseTxt, statusTxt, xhr) {
		if (statusTxt == "success") {
			ga('send', 'pageview', 'app/load/PostRetweet.php?id=' + id);
		}
	});
}

function PostRetweetClose() {
	$("html").css({
		overflow: "auto"
	});
	$("#forum64").css({
		"display": "none"
	});
}

function RetweetSucces(id) {
	$(".editf24").html("Cargando ...");
	//var message = $('.messediteur').html().replace(/<div>/gi, '<br>').replace(/<\/div>/gi, '');
	$.ajax({
		type: "POST",
		url: "app/actions/PostRetweet.php",
		data: {
			id: id
			//message: message
		},
		dataType: 'json',
		success: function (json) {
			if (json.reponse == 'ok') {

				$(".dhsjd44").fadeOut();
				$("#forum64").css({
					"display": "none"
				});
				$("html").css({
					overflow: "auto"
				});

				$("#reloadr").html(json.rr);
				$("#rt2-" + id).html(json.html2);

				if (json.action == 'add') {

					$("#rt2-" + id).html(json.html2);
					$("#reloadr").html(json.rr);
					$(".editf24").html("Retwittear");

				} else if (json.action == 'remove-rt') {
					$("#reloadr").html(json.rr);
					$("#rt2-" + id).html(json.html2);
					$("#rt-" + id).html(json.html);
				}

			} else if (json.reponse == 'erreur') {
				$(".editf24").html("Retwittear");
				$(".dhsjd44").fadeIn();
				$(".xdsSs").html('Ha ocurrido un error: Intenta de nuevo más tarde.');
			}
			ga('send', 'event', 'Retweetiar', 'app/actions/PostRetweet.php');
		}
	});
}

function RetweetRemove(id) {
	$.ajax({
		type: "POST",
		url: "app/actions/PostRetweetRemove.php",
		data: {
			id: id
		},
		dataType: 'json',
		success: function (json) {
			if (json.reponse == 'ok') {

				$("#com" + json.id).fadeOut();
				$("#forum64").css({
					"display": "none"
				});
				$("html").css({
					overflow: "auto"
				});

				if (json.action == 'remove-rt') {
					$("#rt-" + id).html(json.html);
				}

			}
			ga('send', 'event', 'Retweetiar', 'app/actions/PostRetweet.php');
		}
	});
}

function addnewusjet(type, id) {
	$("#indexsubmit").html("Cargando ...");
	var titre = $("#topictitl").val();
	var categorie = $("#topiccategory").val();
	var message = $('#editeur').html().replace(/<div>/gi, '<br>').replace(/<\/div>/gi, '');
	$.ajax({
		type: "POST",
		url: "app/actions/ForumActionTopic.php",
		data: {
			titre: titre,
			categorie: categorie,
			message: message,
			type: type,
			id: id
		},
		dataType: 'json',
		success: function (json) {
			if (json.reponse == 'ok') {
				location.href = "forum/" + json.id;
			} else if (json.reponse == 'erreur') {
				$("#lecture42").fadeIn();
				$("#lecture44").html(json.message);
				$("#indexsubmit").html("Añadir mi tema");
			}
			ga('send', 'event', 'Añadiendo un tema en el foro.', 'app/actions/ForumActionTopic.php');
		}
	});
}
var storiesList;
var storieImg;
var storiePseudo;
var indexof, previous, next, imgNext, imgPrevious, pseudoNext, pseudoPrevious;

function fghjkXz() {
	if (next == null) {
		$("#rydHSG45s").hide();
		currentIndex = 0;
		time = 0;
		bar.stop();
		bar.width(0);
		previous = null;
		next = null;
	} else {
		hsgSQGyhd444(next, "ok");
	}
}

function hsgSQGyhd444(id, type) {
	if (type === "ok") {
		fghjk();
	}
	storiesList = [];
	storieImg = [];
	storiePseudo = [];
	indexof = 0;
	$("div").each(function () {
		if (this.id === "stories_box") {
			storiesList.push(parseInt($(this).find('#hsnbxhID').html()));
			storieImg.push($(this).find('img').attr('src'));
			storiePseudo.push($(this).find('#stories_pseudo').text());
		}
	});
	indexof = storiesList.indexOf(id);
	if (indexof > 0 && indexof !== (storiesList.length - 1)) {
		previous = storiesList[indexof - 1];
		next = storiesList[indexof + 1];
		imgNext = storieImg[indexof + 1];
		imgPrevious = storieImg[indexof - 1];
		pseudoNext = storiePseudo[indexof + 1];
		pseudoPrevious = storiePseudo[indexof - 1];
	} else if (indexof === 0) {
		previous = null;
		next = storiesList[indexof + 1];
		imgNext = storieImg[indexof + 1];
		imgPrevious = null;
		pseudoNext = storiePseudo[indexof + 1];
		pseudoPrevious = null;
	} else if (indexof === (storiesList.length - 1)) {
		previous = storiesList[indexof - 1];
		next = null;
		imgNext = null;
		imgPrevious = storieImg[indexof - 1];
		pseudoNext = null;
		pseudoPrevious = storiePseudo[indexof - 1];
	}
	var storydata = encodeURIComponent(JSON.stringify({
		"previous": JSON.stringify({
			"id": previous,
			"img": imgPrevious,
			"pseudo": pseudoPrevious
		}),
		"next": JSON.stringify({
			"id": next,
			"img": imgNext,
			"pseudo": pseudoNext
		})
	}));
	$("#rydHSG45s").css({
		transform: "scale(0.65)"
	});
	$(".hsQJwn" + id).css({
		opacity: "0.4"
	});
	$("#rydHSG45s").show();
	$("#strload").show();
	$("#rydHSG45s").load("app/load/StoriesView.php?userid=" + id + "&storydata=" + storydata, function (responseTxt, statusTxt) {
		if (statusTxt == "success") {
			$("#strload").fadeOut(250);
			$("#rydHSG45s").css({
				transform: "scale(1)",
				transition: "0.3s"
			});

			$("#profilepp2").css({
				"border": "5px solid #fff"
			});

			$(".ss" +id).css({
				opacity: "0.4"
			});

			ga('send', 'pageview', 'app/load/StoriesView.php');
		}
	});
}
var bar = null;
var currentIndex, time;

function fghjk() {
	$("#rydHSG45s").hide();
	currentIndex = 0;
	time = 0;
	bar.stop();
	bar.width(0);
	previous = null;
	next = null;
}

function fghjkX() {
	$("#rydHSG45si").hide().html(' ');
	if (!hotelOpened) {
		$("html").css({
			overflow: "auto"
		});
	}
}

function showPane(index) {
	ePanes.eq(currentIndex).stop(true, true).hide();
	currentIndex = index;
	if (currentIndex < 0) currentIndex = ePanes.length - 1;
	else if (currentIndex >= ePanes.length) currentIndex = 0;
	ePanes.eq(currentIndex).stop(true, true).show();
}

function run() {
	if ($("#rydHSG45s").is(':visible')) {
		bar.stop().width("0");
		showPane(currentIndex + 1);
		if (($(".vistoriecontent").length == (currentIndex + 1))) {
			bar.animate({
				'width': "+=306"
			}, time, fghjkXz);
		} else {
			bar.animate({
				'width': "+=306"
			}, time, run);
		}
	}
}

function StopStory() {
	bar.stop();
}
$('body').on('mouseleave', '#viewstorie', function stredem() {
	if ($("#rydHSG45s").is(':visible')) {
		if ($(".vistoriecontent").length == (currentIndex + 1)) {
			bar.animate({
				'width': "+=306"
			}, time, fghjkXz);
		} else {
			var timme = (300 - bar.width()) * 16;
			bar.animate({
				'width': "+=306"
			}, timme, run);
		}
	}
});

function shQH4xs() {
	$("#rydHSG45si").css({
		transform: "scale(0.5)"
	});
	$("#rydHSG45si").show();
	$("html").css({
		overflow: "hidden"
	});
	$("#strload").show();
	$("#rydHSG45si").load("app/load/StoriesGallery.php", function (responseTxt, statusTxt, xhr) {
		if (statusTxt == "success") {
			$("#strload").fadeOut(500);
			$("#rydHSG45si").css({
				transform: "scale(1)",
				transition: "0.3s"
			});
			$("#storiegoprevious").show();
			$("#storiegonext").show();
			$("#storiesfetch").css({
				width: "960px",
				left: "15px"
			});
			storieMax = $("#storieslist > .storieelement").length - 1;
			storieActuel = storieMax;
			if ((storieMax + 1) > 2) {
				setStoriePanel(0, storieMax, (storieMax - 1));
			} else if ((storieMax + 1) === 2) {
				$("#storiegoprevious").hide();
				$("#storiesfetch").css({
					width: "640px"
				});
				setStoriePanel(0, storieMax, (storieMax - 1));
			} else {
				$("#storiegoprevious").hide();
				$("#storiegonext").hide();
				$("#storiesfetch").css({
					width: "320px",
					left: "340px"
				});
				setStoriePanel(null, 0, null);
			}
			ga('send', 'pageview', 'app/load/StoriesGallery.php');
		}
	});
}
var storieMin = 0;
var storieMax;
var storieActuel;
var storieIdInEdition;
var storieSavedInEdition;
var storieCartoucheTop;
var storieCartoucheContent;

function startStorieEdition() {
	var x = $("#xbH-" + storieActuel);
	x.parent().css('z-index', 99);
	x.css('z-index', 99);
	$("#str54").fadeIn(500);
	$("#str55").fadeIn(500);
	$("#str49").show();
	$("#str56").fadeIn(500);
	var z = $("#xbH-" + storieActuel + " #str46");
	if (z.length === 0) {
		x.append('<div class="new" id="str46">escribir...</div>');
	} else {
		storieCartoucheTop = z.position().top;
		storieCartoucheContent = z.html();
	}
	$("#xbH-" + storieActuel + " #str46").attr('contenteditable', 'true');
	storieIdInEdition = $("#xbH-" + storieActuel + " #xBHid").text();
}

function closeStorieEdition() {
	var x = $("#xbH-" + storieActuel);
	x.parent().css('z-index', 1);
	x.css('z-index', 1);
	$("#str54").hide();
	$("#str55").hide();
	$("#str49").hide();
	$("#str56").hide();
	if (!storieSavedInEdition) {
		var z = $("#xbH-" + storieActuel + " #str46");
		if (z.attr('class') === "old") {
			z.animate({
				top: storieCartoucheTop
			});
			z.html(storieCartoucheContent);
			z.attr('contenteditable', 'false');
			storieCartoucheTop = null;
			storieCartoucheContent = null;
		} else {
			z.remove();
		}
	}
	storieIdInEdition = null;
	storieSavedInEdition = false;
}

function deleteStory() {
	var z = $("#xbH-" + storieActuel);
	z.css({
		opacity: "0.5"
	});
	var id = $("#xbH-" + storieActuel + " #xBHid").text();
	$.ajax({
		type: "POST",
		url: "app/actions/StoryDelete.php",
		data: {
			id: id
		},
		dataType: 'json',
		success: function (json) {
			if (json.reponse == 'ok') {
				$("#xbH-" + storieActuel + " #str43").remove();
				z.css({
					opacity: "1"
				});
			} else {
				z.css({
					opacity: "1"
				});
			}
			ga('send', 'event', 'Eliminar una historia', 'app/actions/StoryDelete.php');
		}
	});
}

function createStory() {
	$("#str59").css({
		visibility: "visible"
	});
	var id = $("#xbH-" + storieActuel + " #xBHid").text();
	var z = $("#xbH-" + storieActuel + " #str46");
	var content = z.html();
	$.ajax({
		type: "POST",
		url: "app/actions/StoryCreate.php",
		data: {
			id: id,
			content: content
		},
		dataType: 'json',
		success: function (json) {
			if (json.reponse == 'ok') {
				$("#xbH-" + storieActuel).append('<div id="str43"><div id="str44"></div><div onclick="deleteStory()" id="str45"></div></div>');
				$("#str59").css({
					visibility: "hidden"
				});
			} else {
				$("#str59").css({
					visibility: "hidden"
				});
			}
			ga('send', 'event', 'Creando una historia', 'app/actions/StoryCreate.php');
		}
	});
}

function validateEdition() {
	var z = $("#xbH-" + storieActuel + " #str46");
	var top = z.position().top;
	var content = z.html();
	if (content === "") {
		top = "";
	}
	$.ajax({
		type: "POST",
		url: "app/actions/StoryPhotosEdition.php",
		data: {
			id: storieIdInEdition,
			positionTop: top,
			content: content
		},
		dataType: 'json',
		success: function (json) {
			if (json.reponse == 'ok') {
				if (content !== "") {
					z.attr('class', 'old');
					z.attr('contenteditable', 'false');
					storieSavedInEdition = true;
				} else {
					z.remove();
				}
				closeStorieEdition();
			} else if (json.reponse == 'erreur') {
				notify(json.message);
			}
			ga('send', 'event', 'Editando una historia', 'app/actions/StoryPhotosEdition.php');
		}
	});
}

function cartoucheEditionTop() {
	var x = $("#xbH-" + storieActuel + " #str46");
	if (x.position().top > 30) {
		x.animate({
			"top": "-=25px"
		}, 250);
	}
}

function cartoucheEditionBottom() {
	var x = $("#xbH-" + storieActuel + " #str46");
	if (x.position().top < 240) {
		x.animate({
			"top": "+=25px"
		}, 250);
	}
}

function animateStoriePanel(type) {
	var center, left, right;
	center = storieActuel;
	if (storieActuel === storieMax) {
		left = 0;
		right = storieActuel - 1;
	} else if (storieActuel === 0) {
		left = 1;
		right = storieMax;
	} else {
		left = storieActuel + 1;
		right = storieActuel - 1;
	}
	if (type === "next") {
		$("#storiesfetch #xbH-" + center).css({
			'transform': 'scale(0.73) translateX(-439px)'
		});
		$("#storiesfetch #xbH-" + right).css({
			'transform': 'scale(1.0) translateX(-320px)'
		});
		$("#storiesfetch #xbH-" + left).css({
			'transform': 'scale(0.3) translateX(-700px)'
		});
	} else if (type === "previous") {
		$("#storiesfetch #xbH-" + left).css({
			'transform': 'scale(1.0) translateX(320px)'
		});
		$("#storiesfetch #xbH-" + center).css({
			'transform': 'scale(0.73) translateX(439px)'
		});
		$("#storiesfetch #xbH-" + right).css({
			'transform': 'scale(0.3) translateX(700px)'
		});
	}
}

function setStoriePanel(one, two, three) {
	$("#storieslist #xbH-" + one).appendTo("#storiesfetch").css({
		transform: "scale(0.73)"
	}).attr('onclick', 'storiesPreviousPanel()');
	$("#storieslist #xbH-" + two).appendTo("#storiesfetch");
	$("#storieslist #xbH-" + three).appendTo("#storiesfetch").css({
		transform: "scale(0.73)"
	}).attr('onclick', 'storiesNextPanel()');
}

function storiesNextPanel() {
	$("#storiepanelloader").css({
		"display": "block",
		"right": "-320px"
	}).animate({
		right: "0px"
	}, 0);
	animateStoriePanel("next");
	setTimeout(function () {
		$("#storiepanelloader").css({
			"display": "none",
			"right": "0px"
		});
		clearStoriesPanel();
		var three;
		if (storieActuel - 1 === 0) {
			three = storieMax;
		} else {
			three = (storieActuel - 2)
		}
		if (storieActuel === 1) {
			storieActuel = 0;
		} else if (storieActuel === 0) {
			storieActuel = storieMax;
		} else {
			storieActuel = storieActuel - 1;
		}
		if (storieActuel === storieMax) {
			setStoriePanel(0, storieMax, (storieMax - 1), 'next');
		} else {
			setStoriePanel(storieActuel + 1, storieActuel, three, 'next');
		}
	}, 300);
}

function storiesPreviousPanel() {
	$("#storiepanelloadertwo").css({
		"display": "block",
		"left": "-320px"
	}).animate({
		left: "0px"
	}, 0);
	animateStoriePanel("previous");
	setTimeout(function () {
		$("#storiepanelloadertwo").css({
			"display": "none",
			"left": "0px"
		});
		clearStoriesPanel();
		if (storieActuel === storieMax) {
			storieActuel = 0;
		} else {
			storieActuel = storieActuel + 1;
		}
		if (storieActuel === storieMax) {
			setStoriePanel(0, storieActuel, storieActuel - 1);
		} else if (storieActuel === 0) {
			setStoriePanel(1, 0, storieMax);
		} else {
			setStoriePanel(storieActuel + 1, storieActuel, storieActuel - 1);
		}
	}, 300)
}

function clearStoriesPanel() {
	$(".storieelement").each(function () {
		$(this).appendTo("#storieslist").css({
			transform: "scale(1.0)"
		});
		$(this).removeAttr("onclick");
	});
}

function animatesendstr() {
	var x = $("#stories17");
	x.animate({
		right: '-10px'
	}, 70);
	x.animate({
		right: '10px'
	}, 70);
	x.animate({
		right: '-10px'
	}, 70);
	x.animate({
		right: '10px'
	}, 70);
	x.animate({
		right: '-10px'
	}, 70);
	x.animate({
		right: '10px'
	}, 70);
	x.animate({
		right: '-10px'
	}, 70);
	x.animate({
		right: '10px'
	}, 70);
}

function moreprofil(type, uid) {
	var a = $("#profil87");
	a.css({
		transform: "scale(0.5)"
	});
	a.show();
	$("#profil120").css({
		visibility: "visible"
	});
	a.load("app/load/ProfilViewMore.php?type=" + type + "&uid=" + uid, function (responseTxt, statusTxt, xhr) {
		if (statusTxt == "success") {
			$("#profil120").css({
				visibility: "hidden"
			});
			a.css({
				transform: "scale(1)",
				transition: "0.3s"
			});
			ga('send', 'pageview', 'app/load/ProfilViewMore.php');
		}
	});
}

function closemoreprofil() {
	$("#profil87").css({
		transform: "scale(0,0)",
		transition: "0.3s"
	});
}

function SettingsSimpleAction(id, type) {
	$(".settwait" + id).html(".......");
	$.ajax({
		type: "POST",
		url: "app/actions/SettingsActionBasic.php",
		data: {
			type: type
		},
		dataType: 'json',
		success: function (json) {
			if (json.reponse == 'ok') {
				$(".settwait" + id).html(json.text);
			}
			ga('send', 'event', 'Modification paramètres', 'app/actions/SettingsActionBasic.php');
		}
	});
}

function RandomPin() {
	var c = document.getElementsByClassName("pin");
	var t = [1, 2, 3, 4, 5, 6, 7, 8, 9, 0];
	for (var i = 0; i < c.length; i++) {
		if (t.length == 1) {
			c[i].firstChild.nodeValue = t[0]
		} else {
			var spl = Math.round(Math.random() * (t.length - 1))
			c[i].firstChild.nodeValue = t[spl]
			t.splice(spl, 1)
		}
	}
}

function CliquePin(id) {
    if (id == 'x') {
        var pin = $("#currentpin").val();
        pin = pin.substring(0, pin.length - 1);
        $("#currentpin").val(pin);
    } else {
        var add = $('#' + id).html();
        var pin = $("#currentpin").val();
        if (pin.length < 4) {
            $("#currentpin").val(pin + add);
        }
    }
}

function OpenSettingsAvances(page) {
	var a = $(".settingsload");
	a.css({
		transform: "scale(0.5)",
		transition: "0.2s"
	});
	$(".settingsloader").show();
	a.load("app/load/SettingsAvances.php?page=" + page, function (responseTxt, statusTxt, xhr) {
		if (statusTxt == "success") {
			a.show();
			$(".settingsloader").fadeOut(500);
			a.css({
				transform: "scale(1)",
				transition: "0.4s"
			});
			if (page == "pin") {
				setTimeout(function () {
					RandomPin();
				}, 1000);
			}
			ga('send', 'pageview', 'app/load/SettingsAvances.php');
		}
	});
}

function CloseSettingsAvances() {
	$(".settingsload").css({
		transform: "scale(0.0)",
		transition: "0.2s"
	}).fadeOut(400);
}

function SelectFriend(type, id) {
	if (type == 'friendsinfo') {
		$("#settings29").html('...<br><x style="font-size:50%;">Cargando ...</x>');
		$(".settings24").each(function () {
			if ($(this).attr('onclick') != 'nofriend') {
				$(this).css({
					background: "rgb(200,200,200)"
				});
			}
		});
		$("#selectfriends" + id).css({
			background: 'white'
		});
	} else if (type == 'deletefriend') {
		var id = $("#friendid").html();
		$("#settings35").html('...');
	} else if (type == 'deleteallfriend') {
		$("#settings36").html('...');
	}
	$.ajax({
		type: "POST",
		url: "app/actions/SettingsFriends.php",
		data: {
			type: type,
			id: id
		},
		dataType: 'json',
		success: function (json) {
			if (type == 'friendsinfo') {
				$("#settings29").html(json.username + '<br><x style="font-size:50%;">' + json.motto + '</x>');
				$("#settings31").html(json.activity_points);
				$("#settings32").html('Última conexión ' + json.last_online);
				$("#settings34").css({
					"background": "url(" + json.figure + ")"
				});
				$("#settings35").html('Borrar a ' + json.username + ' de mis amigos');
				$("#friendid").html(json.id);
			} else if (type == 'deletefriend') {
				if (json.type == 'error') {
					$("#settings35").html(json.message);
				} else if (json.type == 'success') {
					$("#settings35").html(json.message);
					$("#selectfriends" + id).css({
						background: 'rgb(254,166,75)',
						border: '3px solid rgb(254,166,75)'
					});
					$("#selectfriends" + id).attr('onclick', 'nofriend');
				}
			} else if (type == 'deleteallfriend') {
				if (json.type == 'error') {
					$("#settings36").html(json.message);
				} else if (json.type == 'success') {
					$("#settings36").html(json.message);
					setTimeout(function () {
						OpenSettingsAvances('friends');
					}, 600);
				}
			}
			ga('send', 'event', 'Configuración de amigos', 'app/actions/SettingsFriends.php');
		}
	});
}

function SettingsActionPassword() {
	$("#settings43").html('Cargando ...');
	var n = $("#newpassword").val();
	var v = $("#verifpassword").val();
	var o = $("#oldpassword").val();
	$.ajax({
		type: "POST",
		url: "app/actions/SettingsActionAdvanced.php",
		data: {
			n: n,
			v: v,
			o: o,
			type: 'password'
		},
		dataType: 'json',
		success: function (json) {
			if (json.reponse == 'ok') {
				$("#settings43").html(json.message);
				$("#settings41").html('Último cambio de contraseña <b>Justo ahora</b>');
			} else if (json.reponse == 'erreur') {
				$("#settings43").html(json.message);
			}
			ga('send', 'event', 'Cambiar la contraseña', 'app/actions/SettingsActionAdvanced.php');
		}
	});
}

function SettingsActionMail(step) {
	if (step == 'one') {
		$(".fghjs1").html('Envío en progreso...');
		var mail = $("#email").val();
		$.ajax({
			type: "POST",
			url: "app/actions/SettingsActionAdvanced.php",
			data: {
				mail: mail,
				type: 'mail1'
			},
			dataType: 'json',
			success: function (json) {
				if (json.reponse == 'ok') {
					$("#settings42").html("Copia el código recibido por correo electrónico");
					$("#settings45").animate({
						left: '-100%'
					});

			$.ajax({
			type: "POST",
			url: "sendemail.php",
			data: {
				email: mail,
				type: 'confimemail'
			}});

					//$("#sendemail").load('sendemail.php?email' + mail + '&type=confimemail');
					setTimeout(function () {
						$("#settings45").hide();
						$("#settings44").fadeIn(300);
					}, 400);
				} else if (json.reponse == 'erreur') {
					$(".fghjs1").html(json.message);
				}
			}
		});
	}
	if (step == 'two') {
		$(".fghjs2").html('Cargando ...');
		var code = $("#code").val();
		$.ajax({
			type: "POST",
			url: "app/actions/SettingsActionAdvanced.php",
			data: {
				code: code,
				type: 'mail2'
			},
			dataType: 'json',
			success: function (json) {
				if (json.reponse == 'ok') {
					$(".fghjs2").html(json.message);
					$(".nmail").hide();
					OpenSettingsAvances('mail');
				} else if (json.reponse == 'erreur') {
					$("#settings41").html("Tu dirección de correo electrónico ha sido confirmada");
					$(".fghjs2").html(json.message);
				}
				ga('send', 'event', 'Editando la dirección de correo electrónico', 'app/actions/SettingsActionAdvanced.php');
			}
		});
	}
}

function SettingsActionPin(step, del) {
	if (del == 'supp') {
		var action = $('.sjUtrois');
		var pin = 'supp';
	} else {
		var action = $('.sjUqua');
		var pin = $("#currentpin").val();
	}
	var password = $("#password2").val();
	if (step == 'one') {
		var action = $("#settings43");
		var oldpin = $("#oldpin").val();
	} else if (step == 'two') {
		if (del == 'supp') {
			var action = $('.LsjU');
		} else {
			var action = $(".WsjU");
		}

		var oldpin = $("#oldpin").val();
	}
	$(action).html('Cargando...');
	$.ajax({
		type: "POST",
		url: "app/actions/SettingsActionAdvanced.php",
		data: {
			del: del,
			pin: pin,
			password: password,
			oldpin: oldpin,
			type: 'pin' + step
		},
		dataType: 'json',
		success: function (json) {
			if (step == 'one') {
				if (json.reponse == 'ok') {
					$(".npin").hide();
					$("#settings43").html('Actualizado');
					setTimeout(function () {
						OpenSettingsAvances('pin');
					}, 600);
				} else if (json.reponse == 'erreur') {
					$("#settings43").html(json.message);
				}
			} else if (step == 'two') {
				if (json.reponse == 'ok') {
					$(action).html('Actualizado');
					setTimeout(function () {
						OpenSettingsAvances('pin');
					}, 600);
				} else if (json.reponse == 'erreur') {
					$(action).html(json.message);
				}
			}
		}
	});
}

function LockPin() {
    $('#pin6').fadeOut(250);
    setTimeout(function () {
        $("#pin7").slideDown(500);
        RandomPin();
    }, 250);
}

function MouvPinResult() {
    var p = $("#pin9");
    p.animate({left: '-10px'}, 70);
    p.animate({left: '10px'}, 70);
    p.animate({left: '-10px'}, 70);
    p.animate({left: '10px'}, 70);
    p.animate({left: '-10px'}, 70);
    p.animate({left: '10px'}, 70);
    p.animate({left: '-10px'}, 70);
    p.animate({left: '10px'}, 70);
    p.animate({left: '0px'}, 70);
}

function MouvPinTentative() {
    var p = $("#pin4");
    p.animate({top: '-30px'}, 70);
    p.animate({top: '0px'}, 70);
    p.animate({top: '-20px'}, 70);
    p.animate({top: '0px'}, 70);
    p.animate({top: '-10px'}, 70);
    p.animate({top: '0px'}, 70);

}

function PostSecureTrue() {
    $("#pin2").animate({left: '55%'}, 150);
    $("#pin2").animate({left: '-200%'}, 400);
    $("#pin1").fadeOut(500);
    setTimeout(function () {
        window.location.href = "home";
    }, 500);
}

function PostSecurePin() {
    var pin = $("#currentpin").val();
    $.ajax({
        type: "POST",
        url: "app/actions/PinCode.php",
        data: {pin: pin, t: '1'},
        dataType: 'json',
        success: function (json) {
            if (json.reponse == 'ok') {
                PostSecureTrue();
            } else if (json.reponse == 'erreur') {
                MouvPinTentative();
                $("#pinmsg u").html(parseInt($("#pinmsg u").html()) - 1);
            } else if (json.reponse == 'erreur2') {
                MouvPinTentative();
                $("#pinmsg u").html(parseInt($("#pinmsg u").html()) - 1);
            } else if (json.reponse == 'erreur3') {
                MouvPinResult();
                window.location.href = "bye";
            }
        }
    });
}

function LostPin(step) {
    if (step == 'one') {
        $("#pin11").show();
    } else if (step == 'close') {
        $("#pin11").hide();
    } else if (step == 'two') {
        $("#pin11").hide();
        $("#pin10").html("Cargando...");
        $.ajax({
            type: "POST",
            url: "app/actions/PinCode.php",
            data: {t: 2},
            dataType: 'json',
            success: function (json) {
                if (json.reponse == 'ok') {
                    $("#pin10").html("Correo electrónico enviado");

                } else if (json.reponse == 'erreur') {

                }
            }
        });
    }

}

function BoutiqueLoaderStart() {
	$shop = $('#b42');
	$('#b41').show();
	$('#b43').hide();
	$($shop).css({
		top: '40%',
		left: 'calc(50% - 32px)'
	}).show();
}

function BoutiqueLoaderEnd(nom) {
	$shop = $('#b42');
	$('#b41').fadeOut(500);
	if (nom != 'x') {
		$('#b43').html(nom);
		$('#b43').show();
	}
	if (nom == 'x') {
		$shop.hide();
	}
	$('#boutiqueload').show();
	$($shop).css({
		top: '75px',
		left: '15%'
	});
	$($shop).css({
		'transform': 'scale(1.0)',
		transition: '0.4s'
	});
}

function PorteMonnaie() {
	$("#b65").animate({
		top: '10px'
	}, 0);
}

function closePorteMonnaie() {
	$("#b65").animate({
		top: '-100px'
	}, 0);
}

function AnimateMonnaie(monnaie, chiffre) {
	var target = chiffre;
	var number = $('#' + monnaie).text();
	var interval = setInterval(function () {
		$('#' + monnaie).text(number);
		if (chiffre < number) {
			if (number <= target) {
				clearInterval(interval);
				$('.b' + monnaie).clearQueue();
				$('.b' + monnaie).animate({
					top: '1px'
				}, 200);
			} else {
				number--;
				number--;
				$('.b' + monnaie).animate({
					top: '-4px'
				}, 200);
				$('.b' + monnaie).animate({
					top: '4px'
				}, 200);
			}
		} else {
			if (number >= target) {
				clearInterval(interval);
				$('.b' + monnaie).clearQueue();
				$('.b' + monnaie).animate({
					top: '1px'
				}, 200);
			} else {
				number++;
				$('.b' + monnaie).animate({
					top: '-4px'
				}, 200);
				$('.b' + monnaie).animate({
					top: '4px'
				}, 200);
			}
		}
	}, 0);
}
var titleactuel = null;

function BoutiquePage(nom, url) {
	titleactuel = document.title;
	document.title = nom;
	html.css({
		overflow: 'hidden'
	});
	BoutiqueLoaderStart();
	$("#boutiqueload").load(url, function (responseTxt, statusTxt, xhr) {
		if (statusTxt == "success") {
			BoutiqueLoaderEnd(nom);
			if (nom != 'x') {
				PorteMonnaie();
			}
			ga('send', 'pageview', url);
		} else {
			alert('Error, vuelve a cargar la página')
		}
	});
}

function BoutiquePageClose() {
	document.title = titleactuel;
	html.css({
		overflow: 'auto'
	});
	$('#b41').hide();
	$('#b42').hide();
	$('#b43').hide();
	$('#boutiqueload').hide();
	closePorteMonnaie();
}

function BoutiqueVIPClose() {
	$('#b69').fadeOut(500);
}

function BoutiqueVIPOpen() {
	$('#b69').fadeIn(250);
}

function AnimatePortfeuil() {
	var div = $("#b65");
	$(div).css({
		background: 'red'
	});
	setTimeout(function () {
		$(div).css({
			background: 'rgba(0,0,0,0.8)'
		});
	}, 300);
	setTimeout(function () {
		$(div).css({
			background: 'rgb(237,28,36)'
		});
	}, 600);
	setTimeout(function () {
		$(div).css({
			background: 'rgba(0,0,0,0.8)'
		});
	}, 900);
	setTimeout(function () {
		$(div).css({
			background: 'rgb(237,28,36)'
		});
	}, 1200);
	setTimeout(function () {
		$(div).css({
			background: 'rgba(0,0,0,0.8)'
		});
	}, 1500);
}

function BoutiqueAchatBadge(id) {
	$('#b62').css({
		opacity: '0.4'
	});
	$.ajax({
		type: "POST",
		url: "app/actions/ShopBuyObject.php",
		data: {
			type: 'badges',
			id: id
		},
		dataType: 'json',
		success: function (json) {
			if (json.reponse == 'monnaie') {
				AnimatePortfeuil();
				$('#b62').css({
					opacity: '1'
				});
			} else if (json.reponse == 'unite') {
				$('#b62').css({
					opacity: '1'
				});
				$("#b62").css({
					background: 'rgb(237,28,36)'
				});
				$('#b62').text("Agotado");
			} else if (json.reponse == 'possede') {
				$('#b62').css({
					opacity: '1'
				});
				$("#b62").css({
					background: 'rgb(237,28,36)'
				});
				$('#b62').text(json.msg);
			} else if (json.reponse == 'ok') {
				ga('send', 'event', 'Compra una placa en la tienda', 'app/actions/ShopBuyObject.php');
				$("#badgeHYrest").html($("#badgeHYrest").html() - 1);
				AnimateMonnaie('duckets', json.jetons);
				AnimateMonnaie('diamants', json.diamants);
				var x = $("#b67").position();
				var position = x.left - 100;
				$('#b67').css({
					filter: 'drop-shadow(2px 1px 0 #fff) drop-shadow(-2px 1px 0 #fff) drop-shadow(0 -2px 0 #fff)'
				});
				$(".buybdg").each(function () {
					$(this).css({
						filter: 'drop-shadow(2px 1px 0 #fff) drop-shadow(-2px 1px 0 #fff) drop-shadow(0 -2px 0 #fff)'
					});
					$(this).animate({
						left: position - $(this).attr('pos'),
						top: -$(window).height() / 2.5 - 50
					}, 1000);
				});
				$(".buybdg").each(function () {
					$(this).fadeOut(200);
				});
				setTimeout(function () {
					$('#b67').css({
						filter: ''
					});
				}, 1150);
				$("#b62").html('Placas compradas').attr("onclick", "");
				$('#b62').css({
					opacity: '1'
				});
			}
		}
	});
}

function OpenMyBadgeBackground() {
	$("#b179x").show();
	$("img").each(function () {
		$(this).attr('src', $(this).data('src'));
	});
}

function CloseMyBadgeBackground() {
	$("#b179x").hide();
}

function MyBadgeBackground(num) {
	$("#b187").css({
		background: "url(app/assets/img/badge-perso/" + num + ".png)"
	});
	$("#mybfond").attr('value', num)
}

function MyBadgeBackground(num) {
	$("#b187").css({
		background: "url(app/assets/img/badge-perso/" + num + ".png)"
	});
	$("#mybfond").attr('value', num)
}

function CloseMyBadgeDirection() {
	$("#b179u").hide();
}

function OpenMyBadgeDirection() {
	$("#b179u").show();
}

function MyBadgeDirection(num, img) {
	$("#b187img").attr('src', img);
	$("#mybdirection").attr('value', num)
}

function BuyMyBadge() {
	$(".ghj4112").text("Cargando ...");
	var description = $("#mybdescription").val(),
		titre = $("#mybtitre").val(),
		fond = $("#mybfond").attr('value'),
		look = $("#b187img").attr('src'),
		direction = $("#mybdirection").attr('value'),
		token = $("#mybtoken").val();
	$.ajax({
		type: "POST",
		url: "app/actions/BuyMyBadge.php",
		data: {
			description: description,
			titre: titre,
			fond: fond,
			look: look,
			direction: direction,
			token: token
		},
		dataType: 'json',
		success: function (json) {
			if (json.type == 'error') {
				$(".ghj4112").text("Acheter mon badge");
				$("#b179h").css({
					visibility: "visible"
				});
				$("#b179h").html(json.message);
				setTimeout(function () {
					$('#b179h').css({
						visibility: "hidden"
					});
					$("#b179h").html("");
				}, 2500);
			} else if (json.type == 'success') {
				ga('send', 'event', 'Achat d\'un badge personnalisé', 'app/actions/SettingsActionAdvanced.php');
				$(".ghj4112").text("Acheter mon badge");
				$("#b179h").css({
					visibility: "visible"
				});
				$("#b179h").html(json.message);
				setTimeout(function () {
					$('#b179h').css({
						visibility: "hidden"
					});
					BoutiquePage('Mi inventario', 'app/load/BoutiquePage.php?page=inventaire&type=badges');
					AnimateMonnaie('duckets', json.prix);
				}, 3500);
			}
		}
	});
}

function BoutiqueAchatVip() {
	$('#b62').css({
		opacity: '0.4'
	});
	$.ajax({
		type: "POST",
		url: "app/actions/ShopBuyObject.php",
		data: {
			type: 'vip'
		},
		dataType: 'json',
		success: function (json) {
			if (json.reponse == 'monnaie') {
				AnimatePortfeuil();
				$('#b62').css({
					opacity: '1'
				});
			} else if (json.reponse == 'ok') {
				ga('send', 'event', 'Achat de 1 mois VIP', 'app/actions/ShopBuyObject.php');
				AnimateMonnaie('duckets', json.jetons);
				AnimateMonnaie('diamants', json.diamants);
				$('#b62').css({
					opacity: '1'
				});
				$("#btxtvip").text(json.date);
				$(".hsnx47").html(json.date);
			} else if (json.reponse == 'erreur') {
				$('#b62').css({
					opacity: '1'
				});
				alert("Ton grade est au dessus du VIP.");
			}
		}
	});
}

function ShopOpenRoom(thumbnail, name, description, price, id) {
	$("#b272").text(name);
	$("#b273").text(description);
	$("#b274").html('<div id="b193"></div>' + decodeURIComponent(price.replace(/\+/g, ' ')));
	$("#b271 > img").attr('src', thumbnail);
	PorteMonnaie();
	$("#b270").animate({
		left: "0px"
	}, 500);
	$("#b274").attr('onclick', 'ShopBuyRoom(' + id + ')');
}

function ShopBuyRoom(id) {
	loader.show();
	$.ajax({
		type: "POST",
		url: "app/actions/ShopSaleBuyRoom.php",
		data: {
			id: id
		},
		dataType: 'json',
		success: function (json) {
			if (json.type === 'monnaie') {
				AnimatePortfeuil();
			} else if (json.type === 'success') {
				ga('send', 'event', 'Achat d\'un appartement au marché', 'app/actions/ShopSaleBuyRoom.php');
				AnimateMonnaie('duckets', json.jetons);
				AnimateMonnaie('diamants', json.diamants);
				setTimeout(function () {
					closePorteMonnaie();
				}, 3500);
				$("#b270").animate({
					left: "-480px"
				}, 250);
			} else if (json.type === 'error') {
				notify(json.message);
			}
			loader.hide();
		}
	});
}

function ShopCloseRoom() {
	FermerHotel();
}

function ShopBuyBadge(elem, id) {
	$(elem).css({
		opacity: "0.5"
	});
	PorteMonnaie();
	$.ajax({
		type: "POST",
		url: "app/actions/ShopSaleBuyBadge.php",
		data: {
			id: id
		},
		dataType: 'json',
		success: function (json) {
			if (json.type === 'monnaie') {
				AnimatePortfeuil();
			} else if (json.type === 'success') {
				ga('send', 'event', 'Achat d\'un badge au marché', 'app/actions/ShopSaleBuyBadge.php');
				AnimateMonnaie('duckets', json.jetons);
				AnimateMonnaie('diamants', json.diamants);
				$(elem).css({
					filter: "grayscale(100%)"
				});
				$(elem).attr('onlick', "");
				setTimeout(function () {
					closePorteMonnaie();
				}, 3500);
			} else if (json.type === 'error') {
				notify(json.message);
			}
			$(elem).css({
				opacity: "1"
			});
		}
	});
	setTimeout(function () {
		closePorteMonnaie();
	}, 5000);
}

function BoutiqueAchatLoto() {
	$('#b62').css({
		opacity: '0.4'
	});
	var pos = $("#b83").val();
	var div = $("#b62");
	$.ajax({
		type: "POST",
		url: "app/actions/ShopBuyObject.php",
		data: {
			type: 'loto',
			chiffre: pos
		},
		dataType: 'json',
		success: function (json) {
			if (json.reponse == 'monnaie') {
				AnimatePortfeuil();
				$('#b62').css({
					opacity: '1'
				});
			} else if (json.reponse == 'ok') {
				AnimateMonnaie('duckets', json.jetons);
				AnimateMonnaie('diamants', json.diamants);
				$('#b62').css({
					opacity: '1'
				});
				div.text('Participation validée').attr("onclick", "");
			} else if (json.reponse == 'erreur') {
				div.css({
					background: 'red',
					opacity: '1'
				});
				setTimeout(function () {
					div.css({
						background: 'rgb(48,177,24)'
					});
				}, 1150);
			}
		}
	});
}

function BoutiqueInventaireObjet(type, id) {
	BoutiqueLoaderStart();
	$.ajax({
		type: "POST",
		url: "app/actions/ManageInventory.php",
		data: {
			type: type,
			id: id
		},
		dataType: 'json',
		success: function (json) {
			if (json.reponse == 'ok') {
				$("#b108 > img").attr('src', json.image);
				$("#b110nom").text(json.nom);
				$("#b106").fadeIn(500);
				if (json.vente == true) {
					saleBadgeAnimate(id);
				} else {
					saleBadgeAnimateSale(type, id);
				}
				BoutiqueLoaderEnd('Mi inventario');
			} else if (json.reponse == 'erreur') {
				if (type == 'badges') {
					$(".bsnz" + id).fadeOut(400);
				} else {
					$(".ysnz" + id).fadeOut(400);
				}
				BoutiqueLoaderEnd('Mi inventario');
			}
			ga('send', 'event', 'Modification de l\'inventaiire', 'app/actions/ManagerInventory.php');
		}
	});
}

function saleBadgeAnimateSale(type, id) {
	$("#b235").html('<div id="b63"></div>Vender en el mercado');
	$("#b62").attr("onclick", "BoutiqueInventaireDelete('" + type + "','" + id + "')");
	$("#b235").attr("onclick", "saleBadge('" + id + "')");
	$("#b230vente").show();
	$("#b230").animate({
		right: "145px"
	});
	$("#b62").show();
}

function saleBadgeAnimate(id) {
	$("#b235").html('<div id="b63"></div>Retirer du marché');
	$("#b235").attr("onclick", "saleBadgeRemove('" + id + "')");
	$("#b230").animate({
		right: "0px"
	});
	$("#b230vente").hide();
	$("#b62").hide();
}

function saleBadge(id) {
	$("#b235").html('<div id="b63"></div>Cargando ...');
	var diamants = $(".b231d").val();
	var jetons = $(".b231c").val();
	$.ajax({
		type: "POST",
		url: "app/actions/ShopSaleBadge.php",
		data: {
			badge: id,
			diamants: diamants,
			jetons: jetons
		},
		dataType: 'json',
		success: function (json) {
			if (json.type == 'success') {
				ga('send', 'event', 'Vente d\'unn badge au marché', 'app/actions/ShopSaleBadge.php');
				saleBadgeAnimate(id);
			} else if (json.type == 'error') {
				$("#b230er").css({
					visibility: 'visible'
				}).html(json.message);
				setTimeout(function () {
					$("#b235").html('<div id="b63"></div>Vender en el mercado');
					$("#b230er").css({
						visibility: 'hidden'
					}).html('');
				}, 3000);
			}
		}
	});
}

function saleBadgeRemove(id) {
	$("#b235").html('<div id="b63"></div>Cargando ...');
	$.ajax({
		type: "POST",
		url: "app/actions/ShopSaleBadgeRemove.php",
		data: {
			badge: id
		},
		dataType: 'json',
		success: function (json) {
			if (json.type == 'success') {
				ga('send', 'event', 'Retrait d\'un badge du marché', 'app/actions/ShopSaleBadgeRemove.php');
				saleBadgeAnimateSale('badges', id);
			} else if (json.type == 'error') {
				$("#b230er").css({
					visibility: 'visible'
				}).html(json.message);
				setTimeout(function () {
					$("#b230er").css({
						visibility: 'hidden'
					}).html('');
				}, 3000);
			}
		}
	});
}

function BoutiqueInventaireClose() {
	$("#b106").fadeOut(500);
}

function BoutiqueInventaireDelete(type, id) {
	$('#b62').css({
		opacity: '0.4'
	});
	$.ajax({
		type: "POST",
		url: "app/actions/ManageInventory.php",
		data: {
			type: type + "delete",
			id: id
		},
		dataType: 'json',
		success: function (json) {
			if (json.reponse == 'ok') {
				BoutiqueInventaireClose();
				$('#b62').css({
					opacity: '1'
				});
				if (type == 'badges') {
					$(".bsnz" + id).fadeOut(400);
				} else {
					$(".ysnz" + id).fadeOut(400);
				}
			}
			ga('send', 'event', 'Suppression d\'un objet de l\'inventaire', 'app/actions/ManageInventory.php');
		}
	});
}

function BoutiqueInventairePage(page) {
	var title;
	switch (page) {
		case "mobis":
			title = "Mi inventario";
			break;
		case "badges":
			title = "Mis placas";
			break;
		case "historique":
			title = "Mi historia";
			break;
		case "apparts":
			title = "Mis salas";
			break;
	}
	$('#b43').html(title);
	document.title = title;
	loader.css({
		display: "block"
	});
	$(".b102").each(function () {
		$(this).removeAttr('style');
	});
	$("#b103").load("app/load/InventoryCategory.php?page=" + page, function (responseTxt, statusTxt, xhr) {
		if (statusTxt == "success") {
			loader.fadeOut(400);
			$("#hgs" + page).css({
				background: 'rgba(255,255,255,0.3)'
			});
			ga('send', 'pageview', 'app/load/InventoryCategory.php');
		}
	});
}
$(document).ready(function () {
	$('body').on('keyup', '#b101', function () {
		$('#b43').html("Mi inventario");
		document.title = "Mi inventario";
		$(".b102").each(function () {
			$(this).removeAttr('style');
		});
		$("#hgsmobis").css({
			background: 'rgba(255,255,255,0.3)'
		});
		var search = $(this).val();
		var data = 'search=' + search;
		if (search.length > 0) {
			$.ajax({
				type: "GET",
				url: "app/load/InventoryCategory.php?page=recherche",
				data: data,
				success: function (server_response) {
					$("#b103").html(server_response).show();
				}
			});
		} else {
			$.ajax({
				type: "GET",
				url: "app/load/InventoryCategory.php?page=recherche&get=vide",
				data: data,
				success: function (server_response) {
					$("#b103").html(server_response).show();
				}
			});
		}
	});
});

function BoutiqueRareOpen(valeur, mobis, img) {
	titleactuel = document.title;
	document.title = mobis;
	var nom = "x";
	var valeur = JSON.parse(valeur);
	var jours = JSON.parse($("#JrXYzr").html());
	BoutiqueLoaderStart();
	jQuery.ajax({
		type: "GET",
		url: "app/assets/js/chart.js",
		dataType: "script",
		cache: true,
		success: function () {
			$("#boutiqueload").load("app/load/BoutiquePage.php?page=rare", function (responseTxt, statusTxt, xhr) {
				if (statusTxt == "success") {
					$("#b147").html(mobis);
					$('#b148 > img').attr('src', img);
					var ctx = document.getElementById("RareEvolution");
					var myChart = new Chart(ctx, {
						type: 'line',
						data: {
							labels: jours,
							datasets: [{
								label: 'Valeur en rares classiques',
								data: valeur,
								backgroundColor: ['transparent'],
								pointBackgroundColor: ['red'],
								pointBorderColor: ['rgb(127,127,127)', 'rgb(127,127,127)', 'rgb(127,127,127)', 'rgb(127,127,127)', 'rgb(127,127,127)', 'rgb(127,127,127)'],
								borderColor: ['rgb(111,156,240)'],
								borderWidth: 7
							}]
						},
						options: {
							legend: {
								display: false,
							},
							scales: {
								xAxes: [{
									display: false
								}],
								yAxes: [{
									display: false
								}],
							},
							tooltips: {
								backgroundColor: '#FFF',
								titleFontColor: 'black',
								displayColors: false
							},
						}
					});
					BoutiqueLoaderEnd(nom);
					if (nom != 'x') {
						PorteMonnaie();
					}
				} else {
					alert('Erreur, veuillez recharger la page')
				}
			});
			ga('send', 'event', 'Ouverture de la valeur d\'un rare', 'app/actions/BoutiquePage.php');
		}
	});
}

function BoutiqueBuyCoffre(id) {
	$('#b62').css({
		opacity: '0.4'
	});
	$.ajax({
		type: "POST",
		url: "app/actions/ShopBuyChest.php",
		data: {
			id: id
		},
		dataType: 'json',
		success: function (json) {
			if (json.reponse == 'monnaie') {
				AnimatePortfeuil();
				$('#b62').css({
					opacity: '1'
				});
			} else if (json.reponse == 'rupture') {
				$('#b62').css({
					opacity: '1'
				});
				$("#b62").css({
					background: 'rgb(237,28,36)'
				});
				$('#b62').text("Rupture de stock");
				$("#JSHnsh421").html('0');
			} else if (json.reponse == 'ok') {
				var img = "app/assets/img/pagecoffres.png";
				if (json.carresse != 0) {
					$("#b172").append('  <div title="' + json.carresse + ' caresses" id="b171"><div id="b164" style="transform:scale(4);top:-1px;background:url(' + img + ') -55px -352px;"></div></div>');
				}
				if (json.winwins != 0) {
					$("#b172").append('  <div title="' + json.winwins + ' winwins" id="b171"><div id="b164"style="transform:scale(4);top:6px;background:url(' + img + ') -79px -354px;"></div></div>');
				}
				if (json.windiamants != 0) {
					$("#b172").append('  <div title="' + json.windiamants + ' diamants" id="b171"><div id="b164"style="transform:scale(4);top:6px;background:url(' + img + ') -55px -376px;"></div></div>');
				}
				if (json.respects != 0) {
					$("#b172").append('  <div title="' + json.respects + ' respects" id="b171"><div id="b164"style="transform:scale(4);top:0px;background:url(' + img + ') -79px -375px;"></div></div>');
				}
				var x = JSON.parse(json.rares);
				if (x != "mobis0") {
					for (var i = 0; i < x.length; i++) {
						$("#b172").append('<div id="b171"><img style="transform:scale(3);" src="' + x[i] + '"/></div>');
					}
				}
				$('#b62').css({
					opacity: '1'
				});
				AnimateMonnaie('duckets', json.jetons);
				AnimateMonnaie('diamants', json.diamants);
				BoutiqueAnimateCoffre();
			}
			ga('send', 'event', 'Achat d\'un coffre', 'app/actions/ShopBuyChest.php');
		}
	});
}
var transfertRoom = 0;

function BoutiqueOpenRoom(id, nom, description, image) {
	transfertRoom = id;
	$("#b210").show();
	$("#b215").text(nom);
	$("#b216").text(description);
	$("#b212 img").attr('src', image);
}

function BoutiqueCloseRoom() {
	$("#b210").hide();
	transfertRoom = 0;
}
$(document).ready(function () {
	$('body').on('keyup', '#b219', function () {
		var user = $(this).val();
		var action = "&direction=2&head_direction=2&headonly=1&size=m";
		var data = 'username=' + user + '&action=' + encodeURIComponent(action);
		if (user.length > 0) {
			$.ajax({
				type: "GET",
				url: "app/actions/PlayerGetFigure.php",
				data: data,
				dataType: 'json',
				success: function (json) {
					$("#b218 img").attr('src', json.reponse);
					ga('send', 'event', 'Récupération d\'un avatar', 'app/actions/PlayerGetFigure.php');
				}
			});
		}
	});
});

function sendRoom() {
	var username = $("#b219").val();
	$("#b221").html('<div id="b193"></div>Envoi en cours...');
	$.ajax({
		type: "POST",
		url: "app/actions/ShopTransferRoom.php",
		data: {
			username: username,
			roomid: transfertRoom
		},
		dataType: 'json',
		success: function (json) {
			if (json.type == 'success') {
				$("#b221").html('<div id="b193"></div>Transférer');
				$(".b206" + transfertRoom).fadeOut(1000);
				BoutiqueCloseRoom();
			} else if (json.type == 'error') {
				$("#b221").html('<div id="b193"></div>Transférer');
				$("#b228l").append('<div class="b228each" id="b228">' + json.message + '</div>')
				setTimeout(function () {
					$(".b228each").each(function () {
						$(this).fadeOut(500);
					});
				}, 3000);
			}
			ga('send', 'event', 'Transfert d\'un appartement', 'app/actions/ShopTransferRoom.php');
		}
	});
}

function saleRoom() {
	var jetons = $(".b224j").val();
	var diamants = $(".b224d").val();
	$(".b62x").html('<div id="b63"></div>Vente en cours...');
	$.ajax({
		type: "POST",
		url: "app/actions/ShopSaleRoom.php",
		data: {
			roomid: transfertRoom,
			diamants: diamants,
			jetons: jetons
		},
		dataType: 'json',
		success: function (json) {
			if (json.type == 'success') {
				var reponse = json.message;
				$(".b62x").html('<div id="b63"></div>Vender en el mercado');
				$(".b206" + transfertRoom + ' .b227x').html('<div id="b193"></div>Retirer du marché');
				$(".b206" + transfertRoom + ' .b227x').attr('onclick', 'removeRoomSale("' + transfertRoom + '","' + reponse[0] + '","' + reponse[1] + '","' + reponse[2] + '")');
				BoutiqueCloseRoom();
			} else if (json.type == 'error') {
				$(".b62x").html('<div id="b63"></div>Vender en el mercado');
				$("#b228m").append('<div class="b228eachm" id="b228">' + json.message + '</div>')
				setTimeout(function () {
					' + transfertRoom + '
					$(".b228eachm").each(function () {
						$(this).fadeOut(500);
					});
				}, 3000);
			}
			ga('send', 'event', 'Vente d\'un appartement', 'app/actions/ShopSaleRoom.php');
		}
	});
}

function removeRoomSale(id, name, description, thumbnail) {
	$(".b206" + id + ' .b227x').html('<div id="b193"></div>Cargando ...');
	$.ajax({
		type: "POST",
		url: "app/actions/ShopSaleRoomRemove.php",
		data: {
			room: id
		},
		dataType: 'json',
		success: function (json) {
			if (json.type == 'success') {
				$(".b206" + id + ' .b227x').html('<div id="b193"></div>Transférer');
				$(".b206" + id + ' .b227x').attr('onclick', 'BoutiqueOpenRoom("' + id + '","' + name + '","' + description + '","' + thumbnail + '")');
			} else if (json.type == 'error') {
				$(".b206" + id).html('').append('<div id="b229">' + json.message + '</div>')
			}
			ga('send', 'event', 'Retrait d\'un appartement du marché', 'app/actions/ShopSaleRoomRemove.php');
		}
	});
}

function BoutiqueOpenCoffre() {
	$("#b62").hide();
	var div = $("#b168");
	div.animate({
		'bottom': '-18%'
	}, 200);
	div.animate({
		'bottom': '-22%'
	}, 190);
	div.animate({
		'bottom': '-18%'
	}, 180);
	div.animate({
		'bottom': '-22%'
	}, 170);
	div.animate({
		'bottom': '-18%'
	}, 150);
	div.animate({
		'bottom': '-22%'
	}, 140);
	div.animate({
		'bottom': '-18%'
	}, 130);
	div.animate({
		'bottom': '-22%'
	}, 110);
	div.animate({
		'bottom': '-18%'
	}, 100);
	div.animate({
		'bottom': '-22%'
	}, 90);
	div.animate({
		'bottom': '-18%'
	}, 70);
	div.animate({
		'bottom': '-22%'
	}, 70);
	div.animate({
		'bottom': '-18%'
	}, 70);
	div.animate({
		'bottom': '-22%'
	}, 70);
	div.animate({
		'bottom': '-18%'
	}, 70);
	div.animate({
		'bottom': '-22%'
	}, 70);
	setTimeout(function () {
		$("#b172").fadeIn(500);
	}, 1900);
}

function BoutiqueAnimateCoffre() {
	$("#b170").css({
		display: 'none'
	});
	$("#b168").animate({
		'bottom': '-20%'
	}, 400);
	$("#b169").css({
		'background': 'transparent',
		'filter': 'drop-shadow(2px 1px 0 #fff) drop-shadow(-2px 1px 0 #fff) drop-shadow(0 -2px 0 #fff)'
	});
	$("#b62").html('<div id="b63"></div>Ouvrir le coffre').attr('onclick', 'BoutiqueOpenCoffre()');
}

function SearchOpen(type) {
	$("html").css({
		overflow: "hidden"
	});
	$("#search1").fadeIn(300);
	$("#search3").focus();
	$("#searchtype").html(type);
}
$('body').on('click', '#closesearch4', function () {
	SearchClose();
});
$(document).ready(function () {
	$('body').on('keyup', '#search3', function () {
		$('.loader').show();
		var search = $(this).val();
		var type = $("#searchtype").html();
		if (search.length > 0) {
			$.ajax({
				type: "POST",
				url: "app/load/SearchEngine.php",
				data: {
					words: search,
					search: type
				},
				success: function (server_response) {
					$("#searchbloc").html(server_response);
					$('.loader').hide();
					ga('send', 'event', 'Buscar', 'app/actions/SearchEngine.php');
				}
			});
		} else {
			$("#searchbloc").html('');
			$('.loader').hide();
		}
	});
});

function SearchClose() {
	$("html").css({
		overflow: "auto"
	});
	$("#search1").fadeOut(300);
	$("#searchbloc").html('');
	$("#search3").val('');
}
$('body').on('click', '#fghj41', function (e) {
	SearchClose()
});

function MdpPerdu() {
    $("#indexl6").css({border: "0"});
    $(".lostmail").css({border: "0"});
    $("#indexl5").html('<div id="b63"></div>Cargando...');
    var random = Math.floor(Math.random() * (1 - 100000 + 1)) + 100000;
    var email = $(".lostmail").val();
    var code = $("#indexl6").val();
    $.ajax({
        type: "POST",
        url: "app/actions/ForgotPassword.php",
        data: {step: 1, email: email, code: code},
        dataType: 'json',
        success: function (json) {
            if (json.reponse == 'ok') {
            	$.ajax({
			type: "POST",
			url: "sendemail.php",
			data: {
				email: email,
				type: 'forgot'
			}});


                $("#indexl2n").animate({left: "-800px"});
                $("#indexl9").animate({left: "30px"});
            }else if (json.reponse == 'mail') {
                $("#indexl4").css({border:'3px solid rgb(242,91,99)'}, 100);
                $("#indexl5").html('<div id="b63"></div>Enviar');
            }else if (json.reponse == 'captcha') {
                $("#indexl6").css({border:'3px solid rgb(242,91,99)'}, 100);
                $("#indexl5").html('<div id="b63"></div>Enviar');
            }
        }
    });
}

function MdpPerduEnd() {
	$(".cd15").html('<div id="b63"></div>Cargando ...');
	$(".cdcode").css({
		border: ""
	});
	$(".cdmdp").css({
		border: ""
	});
	$(".cdmdp2").css({
		border: ""
	});
	var code = $(".cdcode").val();
	var mdp = $(".cdmdp").val();
	var mdp2 = $(".cdmdp2").val();
	$.ajax({
		type: "POST",
		url: "app/actions/ForgotPassword.php",
		data: {
			step: 2,
			mdp: mdp,
			mdpconfirm: mdp2,
			clee: code
		},
		dataType: 'json',
		success: function (json) {
			if (json.reponse == 'code') {
				$(".cdcode").css({
					border: "3px solid rgb(237,28,36)"
				});
				$(".cd15").html('<div id="b63"></div>Terminer');
			} else if (json.reponse == 'error') {
				$(".cdmdp").css({
					border: "3px solid rgb(237,28,36)"
				});
				$(".cdmdp2").css({
					border: "3px solid rgb(237,28,36)"
				});
				$(".cd15").html('<div id="b63"></div>Terminer');
			} else if (json.reponse == 'ok') {
				$(".cd15").html('<div id="b63"></div>Actualizado!');
			}
			ga('send', 'event', 'Mot de passe oublié', 'app/actions/ForgotPassword.php');
		}
	});
}

function OpenMdpPerdu() {
	$("#indexl1").fadeIn(300);
}

function CloseMdpPerdu() {
	$("#indexl1").fadeOut(300);
}

function CloseBlog() {
	$("#f37").fadeOut(500);
}

function OpenBlog() {
	$("#f37").fadeIn(500);
}

function BlogPostEdit(type, id) {
	$("#indexsubmit").html("Cargando ...");
	var title = $(".arttitre").val();
	var image = $(".artimage").val();
	var message = $('.messediteur').html().replace(/<div>/gi, '<br>').replace(/<\/div>/gi, '');
	$.ajax({
		type: "POST",
		url: "app/actions/BlogEditPost.php",
		data: {
			title: title,
			image: image,
			message: message,
			type: type,
			id: id
		},
		dataType: 'json',
		success: function (json) {
			if (type == 'edit') {
				if (json.reponse == 'ok') {
					$("#f37").fadeOut();
					$(".loadblogtitle").html(json.titleb);
					$(".loadblog").html(json.message);
				} else if (json.reponse == 'erreur') {
					$("#f39").html(json.message);
					$(".indexl5").html('<div id="b63"></div>Postear');
				}
			} else if (type == 'delete') {

				if (json.reponse == 'ok') {
					location.href = "community/blog";
				} else if (json.reponse == 'erreur') {
					notify('Intente más tarde, algo salió mal.');
				}

			}
			ga('send', 'event', 'Editar un post en el blog', 'app/actions/BlogEditPost.php');
		}
	});
}

function BlogPoster(figure, username) {
	$("#indexsubmit").html("Cargando ...");
	var title = $(".arttitre").val();
	var image = $(".artimage").val();
	var message = $('.messediteur').html().replace(/<div>/gi, '<br>').replace(/<\/div>/gi, '');
	$.ajax({
		type: "POST",
		url: "app/actions/BlogAddPost.php",
		data: {
			title: title,
			image: image,
			message: message
		},
		dataType: 'json',
		success: function (json) {
			if (json.reponse == 'ok') {
				$('#f5').append($('<div id="f9"><div id="f10"><div id="f11"><img class="lazy" id="f11n" alt="' + title + '" src="' + image + '" /></div><div id="f12"><div id="f13"><img class="lazy" id="contourblanc" alt="" src="' + figure + '"/></div><h1>' + title + '</h1></div></div><div id="f14"><p>' + convertmention(message) + '</p><div id="f14n">Leer más</div><div id="f14x">Justo ahora</div></div></div>').fadeIn(500));
				$("#f37").fadeOut();
				location.href = "community/blog-" + json.id;
			} else if (json.reponse == 'erreur') {
				$("#f39").html(json.message);
				$(".indexl5").html('<div id="b63"></div>Postear');
			}
		}
	});
}
var loadHotel = true,
	pageUrl = null,
	pageTitle = null,
	hotelManager = $("#HotelManager"),
	hotelOpened = false,
	contented = true,
	hotelScroll = 0;

function EntrerHotel(room, affiche) {
	$("#mnc1x").show();
	if (!affiche) {
		hotelOpened = true;
		hotelManager.css({
			visibility: "visible"
		});
		$("html").animate({
			scrollTop: 0
		}, 0);
		pageUrl = window.location.pathname;
		pageTitle = document.title;
		hotelScroll = document.documentElement.scrollTop;
		document.title = "HabboPlux: Hotel";
		$("html").css({
			"overflow": "hidden"
		});
	}
	if (loadHotel) {
		loadHotel = false;
		var hotelink = null,
			hoteltitle = null;
		if (room == "reconnect") {
			hotelink = "app/load/Client.php?r=" + room;
			hoteltitle = "hotel";
		} else if (room == "erreur") {
			hotelink = "app/load/Client.php?e=" + room;
			hoteltitle = "hotel";
		} else if (room != null) {
			hotelink = "app/load/Client.php?room=" + room;
			hoteltitle = "hotel/" + room;
		} else {
			hotelink = "app/load/Client.php";
			hoteltitle = "hotel";
		}
		if (!affiche) {
			history.pushState("HabboPlux: Hotel", null, hoteltitle);
		}
		$("#hotelpanel").remove();
		hotelManager.append('<iframe id="hotelframe" src="' + hotelink + '"></iframe><div id="listalerte"></div><div onclick="FermerHotel();" id="hotel2"></div><div onclick="HotelFullScreen()" id="hotel1"></div><div onclick="OpenStream()" id="hotel3"></div><div onclick="shQH4xs()" id="hotel4"></div>');
	} else if (loadHotel == false && room != null) {
		history.pushState("HabboPlux: Hotel", null, "hotel/" + room);
		goToRoom(room);
	} else {
		history.pushState("HabboPlux: Hotel", null, "hotel");
	}
}

function goToRoom(id) {
	loader.show();
	$.ajax({
		type: "POST",
		url: "app/actions/ReturnApartment.php",
		data: {
			id: id
		},
		dataType: 'json',
		success: function (json) {
			if (json.reponse == 'erreur') {
				loader.hide();
				notify("Impossible de rejoindre l'appartement !");
			} else if (json.reponse == 'ok') {
				setTimeout(function () {
					loader.hide();
				}, 2000);
			}
			ga('send', 'event', 'Redirection vers un appaprtement', 'app/actions/ReturnApartment.php');
		}
	});
}

function FermerHotel() {
	hotelOpened = false;
	document.title = pageTitle;
	$("html").animate({
		scrollTop: hotelScroll
	}, 0);
	var str = pageUrl;
	var res = str.substring(0, 6);
	if (res == "/hotel") {
		pageUrl = "/home"
	}
	history.pushState(pageTitle, null, pageUrl);
	if (contented) {
		setCurrentPage(pageUrl, pageTitle, true);
		contented = false;
	}
	hotelManager.css({
		visibility: "hidden"
	});
	$("html").css({
		"overflow": "auto"
	});
	closePorteMonnaie();
	$("#b270").animate({
		left: "-480px"
	}, 250);
}

function HotelFullScreen(elem) {
	elem = elem || document.documentElement;
	if (!document.fullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement) {
		if (elem.requestFullscreen) {
			elem.requestFullscreen();
		} else if (elem.msRequestFullscreen) {
			elem.msRequestFullscreen();
		} else if (elem.mozRequestFullScreen) {
			elem.mozRequestFullScreen();
		} else if (elem.webkitRequestFullscreen) {
			elem.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
		}
	} else {
		if (document.exitFullscreen) {
			document.exitFullscreen();
		} else if (document.msExitFullscreen) {
			document.msExitFullscreen();
		} else if (document.mozCancelFullScreen) {
			document.mozCancelFullScreen();
		} else if (document.webkitExitFullscreen) {
			document.webkitExitFullscreen();
		}
	}
}

function PostSecurity() {
	$("#secu11").text("Cargando ...");
	var Username = $(".Username").val(),
		CodeSecour = $(".CodeSecour").val(),
		Email = $(".Email").val(),
		Password = $(".Password").val(),
		Captcha = $(".Captcha").val(),
		random = Math.floor(Math.random() * (1 - 100000 + 1)) + 100000;
	$.ajax({
		type: 'POST',
		url: 'app/load/GoogleSecurity.php?check&pseudo=' + Username,
		data: {
			Username: Username,
			CodeSecour: CodeSecour,
			Email: Email,
			Password: Password,
			Captcha: Captcha
		},
		success: function (data) {
			$('#secuload').html(data);
			$('#secu10 img').attr('src', 'app/captcha/captchacolor.php?' + random);
		}
	});
}

function PostSecurity2() {
	$("#secu14").text("Cargando ...");
	var secret = $(".secret").val(),
		Code = $(".Code").val();
	$.ajax({
		type: 'POST',
		url: 'app/load/GoogleSecurity.php?valid',
		data: {
			secret: secret,
			Code: Code
		},
		success: function (data) {
			if (data == "connexion") {
				window.location = "home";
			} else {
				$('#secuload').html(data);
			}
		}
	});
}

function tweetAction(id, action, type) {
	$.ajax({
		type: "POST",
		url: "app/actions/TweetAction.php",
		data: {
			id: id,
			action: action
		},
		dataType: 'json',
		success: function (json) {
			if (json.action == 'add') {

				$("#fav-" + id).html(json.html);
				$("#fav2-" + id).html(json.html2);
				$("#reloadl").html(json.rr);

				if (action == "like") {
					$("#fav-" + id).html(json.html);
					$("#fav2-" + id).html(json.html2);
					$("#reloadl").html(json.rr);

				} else if (action == "retweet") {
					z.css({
						background: "rgb(208,241,255)",
						color: "rgb(0,162,232)"
					});
				}

			} else if (json.action == 'remove-fav') {
				$("#fav-" + id).html(json.html);
				$("#fav2-" + id).html(json.html2);
				$("#reloadl").html(json.rr);
			} else if (json.action == 'remove-rt') {
				$("#rt-" + id).html(json.html);
			}
			ga('send', 'event', 'Acción en un tweet', 'app/actions/TweetAction.php');
		}
	});
}
$('body').on('click', '#p158', function (e) {
	$(this).text("");
});
$('body').on('click', '#fil25', function (e) {
	$(this).text("");
});
var z = [];
setInterval(function () {
	if ($("#fil25").is(":focus")) {
		var str = $("#fil25").val();
		str = str.split("@");
		var count = str.length;
		z = [];
		for (var i = 1; i < count; i++) {
			if (str[i].indexOf(' ') >= 0) {
				var final = str[i].split(" ");
				final = final[0];
				final = final.replace("/[^a-zd-=?!@:.]/i", '');
				z.push(final);
			}
		}
		$("#fil28").html(" ");
		var l = z.length;
		if (l > 0) {
			$("#fil30").css({
				visibility: "visible"
			});
		} else {
			$("#fil30").css({
				visibility: "hidden"
			});
		}
		if (l > 4) {
			$("#fil31").css({
				visibility: "visible"
			});
		} else {
			$("#fil31").css({
				visibility: "hidden"
			});
		}
		for (var i = 0; i < l; i++) {
			$("#fil28").prepend('<div id="fil29">@' + z[i] + '</div>');
		}
	}
}, 100);

function OpenStream(page) {
	var fil = $("#fil1");
	fil.html(" ");
	fil.animate({
		right: "0px"
	}, 250);
	fil.append('<div id="fil32"></div>');
	if (typeof page === typeof undefined) {
		fil.load("app/load/Fil.php?type=all", function (responseTxt, statusTxt) {
			if (statusTxt == "success") {
				$("#filtextarea").css({
					display: "block"
				});
				$("#fil7").css({
					height: "calc(100% - 285px)"
				});
			}
		});
	} else if (page === "n") {
		fil.load("app/load/Fil.php?type=news", function (responseTxt, statusTxt) {
			if (statusTxt == "success") {
				$("#filtextarea").css({
					display: "none"
				});
				$("#fil7").css({
					height: "calc(100% - 140px)"
				});
			}
		});
	} else {
		fil.load("app/load/Fil.php?type=ntf", function (responseTxt, statusTxt) {
			if (statusTxt == "success") {
				$("#filtextarea").css({
					display: "none"
				});
				$("#fil7").css({
					height: "calc(100% - 140px)"
				});
			}
		});
	}
	ga('send', 'pageview', 'app/load/Fil.php');
}

function StreamSend(type, userid) {
	if (type == "replying") {
	var content = $('#fil255').val().replace(/<div>/gi, '<br>').replace(/<\/div>/gi, '');
	}else{
	var content = $('#fil25').val().replace(/<div>/gi, '<br>').replace(/<\/div>/gi, '');
	}
	var postid = $('.ja').attr('postid');
	console.log(content);
	
	var button = $("#fil26");
	if (content !== "escribe algo..." && parseFloat(button.css('opacity')) === 1) {
		button.css({
			opacity: "0.7"
		});
		var data = {
			type: type,
			userid: userid,
			postid: postid,
			content: content
		};
		$.ajax({
			type: "POST",
			url: "app/actions/TweetCreate.php",
			data: data,
			dataType: "json",
			success: function (json) {
				if (json.reponse == "ok") {
					$('#fil7').animate({
						scrollTop: 0
					}, 250);

				    $("#moree").prepend(json.post);

				    $("html").css({
		overflow: "auto"
	});
	$("#forum64").css({
		"display": "none"
	});

					setTimeout(function () {
						$('#fil25').val('');
						$("#fil28").html(" ");
						$("#fil30").css({
							visibility: "hidden"
						});
						$("#fil31").css({
							visibility: "hidden"
						});
					}, 1000);
				} else if (json.reponde = "erreur") {
					notify(json.message);
				}
				setTimeout(function () {
					button.css({
						opacity: "1"
					});
				}, 1000);
				ga('send', 'event', 'Ajout d\'un tweet', 'app/actions/TweetCreate.php');
			}
		});
	}
}

function CloseStream() {
	var fil = $("#fil1");
	fil.html(" ");
	fil.animate({
		right: "-600px"
	}, 250);
}

function deleteNotification(id) {
	$(".notification-" + id).fadeOut(500);
	$.ajax({
		type: "POST",
		url: "app/actions/DeleteNotification.php",
		data: 'id=' + id
	});
}

function CloseCookie() {
	var d = new Date();
	d.setTime(d.getTime() + (10 * 365 * 24 * 60 * 60 * 1000));
	var expires = "expires=" + d.toUTCString();
	document.cookie = "cookie=ok;" + expires + ";path=/";
	$("#cookie1").remove();
}

function fetchRewards(diamants, respects, winwins, citycash, badges, load) {
	var x = $("#rew1");
	x.css({
		transform: "scale(0.0)"
	});
	if (load) {
		$('html, body').css({
			overflow: "hidden"
		});
		x.css({
			transform: "scale(1)",
			transition: "0.3s"
		});
	} else {
		window.onload = function () {
			$('html, body').css({
				overflow: "hidden"
			});
			x.css({
				transform: "scale(1)",
				transition: "0.3s"
			});
			onLoad();
		};
	}
	x.load("app/load/Rewards.php?diamants=" + diamants + "&respects=" + respects + "&winwins=" + winwins + "&citycash=" + citycash + "&badges=" + badges);
}
var opened = false;

function openRewards() {
	if (!opened) {
		opened = true;
		var z = $("#rew7");
		for (var i = 0; i < 6; i++) {
			z.animate({
				left: "-40px"
			}, 90);
			z.animate({
				left: "40px"
			}, 90);
		}
		z.animate({
			left: "0px"
		}, 70);
		setTimeout(function () {
			$(".rwthis").each(function () {
				$(this).css({
					visibility: "visible"
				});
			});
			$(".rwrew").each(function () {
				$(this).css({
					visibility: "hidden"
				});
			});
			$("#rew21").text("Prendre mes cadeaux");
			$("#rew21").attr('onclick', 'closeRewards()');
		}, 1200);
	}
}

function closeRewards() {
	loader.hide();
	$("#rew1").hide();
	$("#rew1").html(' ');
	$('html, body').css({
		overflow: "auto"
	});
}

function loadRewards(code) {
	$.ajax({
		type: "POST",
		url: "app/actions/Rewards.php",
		data: {
			code: code
		},
		dataType: 'json',
		success: function (json) {
			if (json.reponse === "error") {
				notify("Oh non ! Les cadeaux ne sont plus disponibles");
			} else {
				$("body").append('<div id="rew1"> <div id="rew23">Nous allons chercher tes cadeaux...</div></div>');
				fetchRewards(json.reponse[0], json.reponse[1], json.reponse[2], json.reponse[3], json.reponse[4], true);
			}
			ga('send', 'event', 'Chargement d\'un  cadeau', 'app/actions/Rewards.php');
		}
	});
}
var notifyC = 0;

function notify(text) {
	$("#notifcontainer").prepend('        <div id="notify-' + notifyC + '" class="notifelement">\n' +
		'            <div id="ntf1">\n' +
		'                <div id="ntf2"></div>\n' +
		'                <div id="ntf3">Mensaje importante</div>\n' +
		'            </div>\n' +
		'            <div id="ntf4">\n' +
		'                ' + text + '\n' +
		'            </div>\n' +
		'\n' +
		'            <div onclick="hideNotif(' + notifyC + ');" id="ntf5">\n' +
		'                Entendido\n' +
		'            </div>\n' +
		'        </div>');
	var x = $("#notify-" + notifyC);
	x.animate({
		left: "141px"
	}, 300);
	var height = x.height() + 95;
	if (notifyC > 0) {
		$(".notifelement").each(function () {
			if ($(this).attr('id') !== "notify-" + notifyC) {
				$(this).animate({
					top: "+=" + height + "px"
				}, 250);
			}
		});
	}
	notifyC++;
}

function hideNotif(id) {
	var x = $("#notify-" + id);
	var height = x.height() + 95;
	x.animate({
		left: "-500px"
	}, 300);
	$(".notifelement").each(function () {
		var txt = $(this).attr('id');
		var numb = txt.match(/\d/g);
		numb = numb.join("");
		if (numb < id) {
			$(this).animate({
				top: "-=" + height + "px"
			}, 250);
		}
	});
}

function startSampleSearch() {

	$("#h46").animate({
		width: "145px",
		"padding-left": "50px"
	}, 150);
	$("#h49").fadeIn(500);
	$("#h48").fadeIn(500);
}

function executeSampleSearch() {
	closeSampleSearch();
	$("#h46").val('');
	$("#h46").blur();
	if (sampleSearcheuser != null) {
		history.pushState(sampleSearcheuser, null, "/profile/" + sampleSearcheuser);
		setCurrentPage("/profile/" + sampleSearcheuser, sampleSearcheuser);
		sampleSearcheuser = null;
	}
}
$('body').on('keydown', '#h46', function (event) {
	var keyCode = (event.keyCode ? event.keyCode : event.which);
	if (keyCode == 13) {
		executeSampleSearch();
	}
});
$('body').on('focusout', '#h46', function (event) {
	closeSampleSearch();
});

function closeSampleSearch() {
	$("#h46").animate({
		width: "100px",
		"padding": "12px 50px 12px 13px"
	}, 150);
	$("#h49").fadeOut(500);
	$("#h48").fadeOut(500);
	$("#h48").text('');
	$("#h50").hide();
}
var sampleSearcheuser = null;
$(document).ready(function () {
	$('body').on('keyup', '#h46', function () {
		var user = $(this).val();
		if (user.length === 0) {
			$("#h48").text('');
		}
		if (user.length > 0) {
			$.ajax({
				type: "POST",
				url: "app/actions/SearchPlayer.php",
				data: {
					username: user
				},
				dataType: 'json',
				success: function (json) {
					if (json.username === null) {
						$("#h50").show();
					} else {
						$("#h50").hide();
					}
					sampleSearcheuser = json.username;
					$("#h48").text(json.username);
					$("#h45 img").attr('src', json.figure);
					ga('send', 'event', 'Buscar un usuario', 'app/actions/SearchPlayer.php');
				}
			});
		}
	});
});

function displayGoogleAds() {
	jQuery.ajax({
		type: "GET",
		url: "//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js",
		dataType: "script",
		success: function () {
			$('ins').each(function () {
				(adsbygoogle = window.adsbygoogle || []).push({});
			});
		}
	});
}
$('.play > video').attr('src', 'app/assets/img/habbo.mp4');
window.onload = function () {
	onLoad();
};

function onLoad() {
	loader.hide();
	$("#footer60").hide();
	setTimeout(function () {
		$("#h45k").remove();
	}, 7000);
	indexSliderPageStart();
	explore.grid();
	var RegisterAnimPend = 0;
	$("#reg32").animate({
		top: "-450px"
	}, 15000);
	setInterval(function () {
		if (RegisterAnimPend == 0) {
			$("#reg32").animate({
				top: "0px"
			}, 15000);
		} else {
			$("#reg32").animate({
				top: "-450px"
			}, 15000);
		}
		RegisterAnimPend = 1 - RegisterAnimPend;
	}, 15000);
	if (window.location.pathname === "/shop/citycash") {
		dedipass();
		PorteMonnaie();
	} else if (window.location.pathname === "/shop/economy") {
		PorteMonnaie();
	} else if (window.location.pathname === "/shop") {
		PorteMonnaie();
	}
}
var currentIndexPage = 0;

function resetIndexSliderPage() {
	$(".indsxsP-0").attr("id", "nin42");
	$(".indsxsP-1").attr("id", "nin42");
	$(".indsxsP-2").attr("id", "nin42");
}

function indexSliderPage(page) {
	var x = 100 * page;
	currentIndexPage = page;
	$("#nin35").animate({
		left: "-" + x + "%"
	}, 500);
	resetIndexSliderPage();
	$(".indsxsP-" + page).attr("id", "nin41");
}
var IndexSlider;

function indexSliderPageStart() {
	clearInterval(IndexSlider);

	function indexSliderInterval() {
		resetIndexSliderPage();
		var x = 100 * currentIndexPage;
		$(".indsxsP-" + currentIndexPage).attr("id", "nin41");
		$("#nin35").animate({
			left: "-" + x + "%"
		}, 500);
		if (currentIndexPage > 1) {
			currentIndexPage = 0;
		} else {
			currentIndexPage++;
		}
	}
	IndexSlider = setInterval(indexSliderInterval, 3500);
}
var explore = {
	gridItem: function (e) {
		g = document.getElementsByClassName("grid")[0];
		h = parseInt(window.getComputedStyle(g).getPropertyValue('grid-auto-rows'));
		r = parseInt(window.getComputedStyle(g).getPropertyValue('grid-row-gap'));
		s = Math.ceil((e.querySelector('#nin54').getBoundingClientRect().height + r) / (h + r));
		e.style.gridRowEnd = "span " + s;
	},
	grid: function () {
		var e = document.getElementsByClassName("item");
		for (var x = 0; x < e.length; x++) {
			this.gridItem(e[x]);
		}
	}
}
var eventMethod;

function dedipass() {
	var elements = document.querySelectorAll('[data-dedipass]:not([data-dedipass-auto-initialized])');
	var length = elements.length;
	for (var idx = 0; idx < length; ++idx) {
		var element = elements[idx];
		if (element.id === '') {
			element.id = 'dedipass-' + idx;
		}
		if (typeof element.dataset.dedipassCustom !== undefined) custom = element.dataset.dedipassCustom;
		if (typeof element.dataset.dedipassCountry !== undefined) langselected = element.dataset.dedipassCountry;
		element.innerHTML = '<iframe src="//api.dedipass.com/pay-2/#' + element.dataset.dedipass + '&' + custom + '&' + langselected + '" id="' + element.id + '-iframe' + '" style="width:100%;border:0 solid transparent;"></iframe>';
		eventMethod = window.addEventListener ? "addEventListener" : "attachEvent";
		var eventer = window[eventMethod];
		var messageEvent = eventMethod === "attachEvent" ? "onmessage" : "message";
		eventer(messageEvent, function (e) {
			if (e.data < 5000) {
				var elem = document.getElementById(element.id + '-iframe');
				if (elem !== null) {
					elem.style.height = e.data + 'px';
					eventMethod = null;
					eventer = null;
					messageEvent = null;
				}
			}
		}, false);
		if (element.dataset.dedipass === '') {
			setTimeout(function () {
				_autoInit();
			}, 1000);
		} else {
			element.setAttribute('data-dedipass-auto-initialized', 'initialized');
		}
	}
};

function disableAccount() {
	$("#settings53").text('Cargando ...');
	$.ajax({
		type: "POST",
		url: "app/actions/DisableAccount.php",
		dataType: 'json',
		success: function (json) {
			if (json.reponse === "erreur") {
				notify(json.message);
			} else if (json.reponse === "ok") {
				window.location = "deconnexion";
			}
			$("#settings53").text('Désactiver mon compte');
			ga('send', 'event', 'Désactivation du compte', 'app/actions/DisableAccount.php');
		}
	});
}
var radioStarted = false;

function radio() {
	var radio = document.getElementById("radio");
	if (!radioStarted) {
		$("#footer57").css({
			background: "url(app/assets/img/pagetemplate.png?2u2u) -54px -269px"
		});
		radioStarted = true;
		radio.play();
	} else {
		$("#footer57").css({
			background: "url(app/assets/img/pagetemplate.png?2u2u) -108px -269px"
		});
		radio.pause();
		radioStarted = false;
	}
}
setTimeout(function () {
	loader.hide();
}, 0);

var pagina=2;
$(document).ready(function()
{
	cargardatos();
});

function cargardatos(){
		var userid = $('#rmore').attr('userid');
		var category = $('#rmore').attr('category');
		$.get("app/load/Timeline.php?pag="+pagina+"&category=" + category + "&userid=" + userid,
			function(data){
				if (data != "") {
					$("#rmore:last").before(data); 
				}
			}
		);				
	}

	$(window).scroll(function(){
		if ($(window).scrollTop() == $(document).height() - $(window).height()){
			pagina++;
			cargardatos()
			}					
	});


function shopEconomType(type) {
	BoutiqueLoaderStart();
	$("#economie-type").load("app/load/BoutiqueEconomieCategorie.php?type=" + type, function (responseTxt, statusTxt) {
		if (statusTxt == "success") {}
		BoutiquePageClose();
		$("html").animate({
			scrollTop: 0
		}, 250);
		document.title = "Tienda";
	});
}

function openParrainage() {
	loader.show();
	$("#Parrainage").load("app/load/Parrainage.php", function (responseTxt, statusTxt) {
		if (statusTxt === "success") {
			loader.hide();
			$("#Parrainage").show();
		}
	});
}

function closeParrainage() {
	$("#Parrainage").hide();
	$("#Parrainage").html(" ");
}


function SettingsActionProfile() {
	$("#vp").html('Cargando ...');
	var p = $("#pprofile").val();
	var b = $("#bprofile").val();
	var c = $("#cprofile").val();
	$.ajax({
		type: "POST",
		url: "app/actions/SettingsActionAdvanced.php",
		data: {
			p: p,
			b: b,
			c: c,
			type: 'profile'
		},
		dataType: 'json',
		success: function (json) {
			if (json.reponse == 'ok') {
				$("#vp").html(json.message);
			} else if (json.reponse == 'erreur') {
				$("#vp").html(json.message);
			}
			ga('send', 'event', 'Editar perfil', 'app/actions/SettingsActionAdvanced.php');
		}
	});
}

function nightMode() {
	$.ajax({
		type: "POST",
		url: "app/actions/SettingsActionAdvanced.php",
		data: {
			type: 'nightmode'
		},
		dataType: 'json',
		success: function (json) {
			if (json.reponse == 'ok') {
				if (json.n == '1') {
				$(".fa-adjust").css({
				"-webkit-transform": "rotate(0deg)"
			    });
			} else if (json.n == '0') {
				$(".fa-adjust").css({
				"-webkit-transform": "rotate(180deg)"
			    });
			}

			}
		}
	});
}


function openBoutique() {
	hotelOpened = false;
	document.title = "HabboPlux: Tienda";
	$("html").animate({
		scrollTop: hotelScroll
	}, 0);
	history.pushState(pageTitle, null, "/shop");
	if (contented) {
		setCurrentPage("/shop", "HabboPlux: Tienda", true);
		contented = false;
	}
	hotelManager.css({
		visibility: "hidden"
	});
	$("html").css({
		"overflow": "auto"
	});
	closePorteMonnaie();
	$("#b270").animate({
		left: "-480px"
	}, 250);
}