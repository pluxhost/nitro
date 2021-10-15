<?php
   require_once '../../global.php';
      
   $content = $Functions->FilterText($_GET['content']);
   ?>
<?php if($content == 0){ ?>
<div id="ai13">TIPS SELECCIÓN</div>
<div onclick="helpConseils(1);" id="ai14">
   ¿Qué es <?php echo $Functions->HotelName(); ?>?
</div>
<br>
<div onclick="helpConseils(2);" id="ai14">
   ¿Cómo jugar?
</div>
<br>
<div onclick="helpConseils(3);" id="ai14">
   Manera <?php echo $Functions->HotelName(); ?>
</div>
<br>
<div onclick="helpConseils(4);" id="ai14">
   Consejo de Seguridad
</div>
<br>
<div onclick="helpConseils(5);" id="ai14">
   ¿Cómo lidiar con un problema?
</div>
<br>
<div onclick="helpConseils(6);" id="ai14">
   ¿Cómo jugar a los casinos?
</div>
<br>
<?php }elseif($content == 1){ ?>
<div style="color:white;font-size:120%;" id="helpmenu">
   <p>
      <?php echo $Functions->HotelName(); ?> es una comunidad virtual online de estilo vintage en donde puedes crear tu propio avatar, hacer amigos, chatear, construir salas y diseñar juegos, y mucho más! Casi todo es posible en este sorprendente lugar repleto de gente increíble…
   </p>
   <br>
   <h2 style="font-size:200%;">MÁS QUE UN SIMPLE JUEGO…</h2>
   <br>
   <p>
      <img alt="ENCUENTRA TU COMUNIDAD" class="align-right" src="app/assets/img/Safety/ill_15.png"
         style="-webkit-font-smoothing:antialiased; border:0px; box-sizing:border-box; display:inline-block; float:right; image-rendering:pixelated; margin:12px 0px 12px 24px; vertical-align:middle"/>
   </p>
   <p>
      Vestir tu avatar con los estilos más modernos no es la única forma de divertirse en <?php echo $Functions->HotelName(); ?>. ¿Quieres ser el arquitecto del siglo y construir deslumbrantes estructuras? ¡Entonces el Club del Arquitecto es para ti! ¿Quieres mostrar tus locas habilidades construyendo juegos y dejar alucinados a tus amigos? ¡Únete a nuestras competiciones! ¿Estás loco por las selfies y las imágenes divertidas? Prueba nuestra cámara.
   </p>
   <br>
   <h2 style="font-size:200%;">ENCUENTRA TU COMUNIDAD</h2>
   <br>
   <p>
      ¿Te gusta chatear y conversar con tus amigos? Los <?php echo $Functions->HotelName(); ?>s Grupos, los foros o comunidades donde interpretar un rol son un buen lugar para comenzar. Únete al ejército y aprende cuál es el sentido del deber; ponte tu capa y salva gracias a ella a todo el universo <?php echo $Functions->HotelName(); ?>; viste tus píxeles con la moda Alta Costura de <?php echo $Functions->HotelName(); ?> y prepárate para desfilar por las pasarelas más glamurosas del Hotel; o conviértete en una enfermera y ayuda a curar los píxeles de nuestros pacientes enfermos. ¡Únete ya a nuestra comunidad y empieza a explorar un universo infinito de situaciones!
   </p>
   <br>
   <h2 style="font-size:200%;">EXPRÉSATE</h2>
   <br>
   <p>
      <img alt="EXPRÉSATE" class="align-right" src="app/assets/img/Safety/ill_16.png"
         style="-webkit-font-smoothing:antialiased; border:0px; box-sizing:border-box; display:inline-block; float:right; image-rendering:pixelated; margin:12px 0px 12px 24px; vertical-align:middle"/>
   </p>
   <p>
      ¡La creatividad e imaginación son siempre bienvenidas en <?php echo $Functions->HotelName(); ?>! Todas las semanas tenemos montones de concursos en los que poder participar. Desde competiciones de salas y fotos, hasta pixel-art, vídeos y concursos de looks ¡Hay miles de cosas con las que poder dejar fluir tu imaginación y ganar premios increíbles! ¿Te sientes creativo? ¡Consulta la sección <u><a href="news"
         style="box-sizing: border-box; -webkit-font-smoothing: antialiased; background-color: transparent; color: rgb(255, 255, 255); cursor: pointer; outline: 0px; text-decoration-line: none;">noticias</a></u>
      para estar al día de todas las competiciones semanales!
   </p>
   <br>
   <h2 style="font-size:200%;">CRÉDITOS ILIMITADOS, PARA SIEMPRE.</h2>
   <br>
   <p>
      <?php echo $Functions->HotelName(); ?> es un juego gratuito en línea para que puedas explorar un vasto mundo de salas, misiones, chatear y ganar premios sin tener que pagar.
   </p>
   <p>
      Algunos "extras" en el juego como la membresía VIP Club y otros furnis rares se pueden comprar con diamantes.
   </p>
   <br>
   <h2 style="font-size:200%;">SIEMPRE DISPUESTOS A AYUDAR…</h2>
   <br>
   <p>
      <img alt="SIEMPRE DISPUESTOS A AYUDAR" class="align-right" src="app/assets/img/Safety/ill_17.png"
         style="-webkit-font-smoothing:antialiased; border:0px; box-sizing:border-box; display:inline-block; float:right; image-rendering:pixelated; margin:12px 0px 12px 24px; vertical-align:middle"/>
   </p>
   <p>
      El Hotel está moderado 24 horas al día, 7 días a la semana. Si quieres jugar a <?php echo $Functions->HotelName(); ?> y navegar por Internet de forma segura te aconsejamos que eches un vistazo a nuestros Consejos de seguridad
   </p>
   <p>
      Somos una de las mayores comunidades virtuales para adolescentes y estamos muy orgullosos de poder afirmar que contamos con un profundo conocimiento de seguridad online, siguiendo siempre las directrices internacionales establecidas por grupos gubernamentales y asociaciones de jóvenes.
   </p>
   <br><br>
</div>
<?php }elseif($content == 2){ ?>
<div style="color:white;font-size:120%;" id="helpmenu">
   <br />
   Ya has puesto un look a tu avatar, has hecho confortable tu Territorio y Frank te ha mostrado cómo funcionan algunas cosas del Hotel… Así que, ¿qué es lo siguiente?
   Aquí te dejamos algunas ideas:<br />
   <img alt="EXPLORAR SALAS" class="align-right" src="app/assets/img/Safety/navigator_es.png" style="-webkit-font-smoothing:antialiased; border:0px; box-sizing:border-box; display:inline-block; float:right; image-rendering:pixelated; margin:12px 0px 12px 24px; vertical-align:middle" /><br />
   <h3 style="font-size:200%;">EXPLORAR SALAS</h3>
   <br />
   Haz clic en el Navegador y selecciona una de las salas públicas en donde podrás chatear con otros <?php echo $Functions->HotelName(); ?>s.<br />
   <br />
   <hr />
   <br />
   <br />
   <img alt="HACER AMIGOS" class="align-right" src="app/assets/img/Safety/ask_friend_es.png" style="-webkit-font-smoothing:antialiased; border:0px; box-sizing:border-box; display:inline-block; float:right; image-rendering:pixelated; margin:12px 0px 12px 24px; vertical-align:middle" /><br />
   <h3 style="font-size:200%;">HACER AMIGOS</h3>
   <br />
   ¡Haz clic sobre un <?php echo $Functions->HotelName(); ?> y pídele amistad o dale respetos!<br />
   <br />
   <hr />
   <br />
   <br />
   <br />
   <img alt="SALAS DE JUEGOS" class="align-right" src="app/assets/img/Safety/gamehub_es.png" style="-webkit-font-smoothing:antialiased; border:0px; box-sizing:border-box; display:inline-block; float:right; image-rendering:pixelated; margin:12px 0px 12px 24px; vertical-align:middle" /><br />
   <h3 style="font-size:200%;">VISITA SALAS DE JUEGOS</h3>
   <br />
   Encuentra la Central de Juegos entre las salas públicas del navegador. ¡Una vez aquí, utiliza cualquiera de las máquinas arcade para ir a un juego!<br />
   <br />
   <hr />
   <br />
   <br />
   <img alt="COMPRAS" class="align-right" src="app/assets/img/Safety/shop.png" style="-webkit-font-smoothing:antialiased; border:0px; box-sizing:border-box; display:inline-block; float:right; image-rendering:pixelated; margin:12px 0px 12px 24px; vertical-align:middle" /><br />
   <h3 style="font-size:200%;">IR DE COMPRAS</h3>
   <br />
   Ve a la tienda de Duckets y mira qué puedes conseguir gratis por tus Duckets!<br />
   <br />
   <br />
</div>
<?php }elseif($content == 3){ ?>
<style>h6 {
   font-family: 'habbofont', 'normal';
   font-size: 100%;
   }
</style>
<div style="color:white;font-size:130%;" id="helpmenu">
   <p>
      La Manera <?php echo $Functions->HotelName(); ?> es como un código de conducta, una guía sobre cómo los <?php echo $Functions->HotelName(); ?>s deben actuar en el Hotel. ¡Jugando bajo estas reglas te aseguras la diversión en <?php echo $Functions->HotelName(); ?>!
   </p>
   <br>
   <h2 style="font-size:200%;">QUE HACER…</h2>
   <img alt="CHATEAR" class="align-right" src="app/assets/img/Safety/habboway_2a.png" style="-webkit-font-smoothing:antialiased; border:0px; box-sizing:border-box; display:inline-block; float:right; image-rendering:pixelated; margin:12px 0px 12px 24px; vertical-align:middle" />
   <h6>• CHATEAR</h6>
   Habla para conocer a otros <?php echo $Functions->HotelName(); ?>s, haz nuevos amigos y ¡diviértete!
   <h6>• CREAR</h6>
   <p>
      ¡Da rienda suelta a tu creatividad! ¡Lleva tu estilo y tus habilidades de diseño al límite para demostrar que eres el mejor! Desde construir salas épicas hasta crear maravillosos selfies. ¡Podrías ser el próximo Píxel Picasso!
   </p>
   <p>
      <img alt="CREAR" class="align-right" src="app/assets/img/Safety/habboway_5a.png" style="-webkit-font-smoothing:antialiased; border:0px; box-sizing:border-box; display:inline-block; float:right; image-rendering:pixelated; margin:12px 0px 12px 24px; vertical-align:middle" />
   </p>
   <h6>• AYUDAR</h6>
   <p>
      ¡Ayuda a un extraño, gana un amigo! Ayuda siempre a otros <?php echo $Functions->HotelName(); ?>s. Nunca se sabe cuándo serás tú quien necesite dicha ayuda.
   </p>
   <h6>• TRADEAR</h6>
   <p>
      ¡Crea tu propio imperio furni a través de los intercambios! Si tienes olfato para los negocios, utiliza el Mercadillo para vender furnis y convertirlos en créditos.
   </p>
   <p>
      <img alt="JUGAR" class="align-right" src="app/assets/img/Safety/habboway_1a.png" style="-webkit-font-smoothing:antialiased; border:0px; box-sizing:border-box; display:inline-block; float:right; image-rendering:pixelated; margin:12px 0px 12px 24px; vertical-align:middle" />
   </p>
   <h6>• JUGAR</h6>
   <p>
      ¡Juega con amigos y crea tus propios juegos! ¡Mételes caña a todos tus adversarios!
   </p>
   <h6>• BUSCAR NUEVOS AMIGOS</h6>
   <p>
      ¡Diviértete, conoce a gente de todos los rincones del mundo y, por qué no, encuentra a ese ser pixelado tan especial!
   </p>
   <br>
   <hr />
   <br>
   <h2 style="font-size:200%;">QUE NO HACER...</h2>
   <p>
      <img alt="TROLEAR" class="align-right" src="app/assets/img/Safety/habboway_2b.png" style="-webkit-font-smoothing:antialiased; border:0px; box-sizing:border-box; display:inline-block; float:right; image-rendering:pixelated; margin:12px 0px 12px 24px; vertical-align:middle" />
   </p>
   <h6>‡ TROLEAR</h6>
   <p>
      A nadie le gustan los trols. ¡De hecho no le gustan ni a sus madres! Así que el acoso está terminantemente prohibido.
   </p>
   <h6>‡ TIMAR</h6>
   <p>
      Robar cosas no te hará más rico, sólo hará que te conviertas en un criminal y en un mal ejemplo para los demás.
   </p>
   <h6>‡ HACER TRAMPAS</h6>
   <p>
      Los tramposos siempre acaban mal, lo único que hacen es estropear la experiencia de los demás.
   </p>
   <p>
      <img alt="VENDER POR DINERO REAL" class="align-right" src="app/assets/img/Safety/habboway_7b.png" style="-webkit-font-smoothing:antialiased; border:0px; box-sizing:border-box; display:inline-block; float:right; image-rendering:pixelated; margin:12px 0px 12px 24px; vertical-align:middle" />
   </p>
   <h6>‡ VENDER POR DINERO REAL</h6>
   <p>
      No vendas tus Furnis a cambio de dinero real. Es muy probable que lo pierdas todo en algún sitio no seguro. Además, estarás tirando a la basura todo el tiempo y esfuerzo que has invertido para llegar hasta donde estás.
   </p>
   <p>
      <img alt="CIBER" class="align-right" src="app/assets/img/Safety/habboway_3b.png" style="-webkit-font-smoothing:antialiased; border:0px; box-sizing:border-box; display:inline-block; float:right; image-rendering:pixelated; margin:12px 0px 12px 24px; vertical-align:middle" />
   </p>
   <h6>‡ CIBER</h6>
   <p>
      El sexo no está permitido en <?php echo $Functions->HotelName(); ?>, ni tampoco intentar contactar con alguien a través de webcam. Ambas conductas serán penalizadas. Además, recuerda que no debes quedar con nadie que hayas conocido en Internet. A veces las personas no son quienes dicen ser.
   </p>
   <br>
</div>
<?php }elseif($content == 4){ ?>
<div style="color:white;font-size:120%;" id="helpmenu">
   <p>
      ¡Estos son los 7 consejos más importantes sobre cómo navegar seguros por Internet!
   </p>
   <p>
      <img alt="PROTEGE TU INFORMACIÓN PERSONAL" class="align-right" src="app/assets/img/Safety/safetytips1_n.png"
         style="-webkit-font-smoothing:antialiased; border:0px; box-sizing:border-box; display:inline-block; float:right; image-rendering:pixelated; margin:12px 0px 12px 24px; vertical-align:middle"/>
   </p>
   <br>
   <h3 style="font-size:200%;">PROTEGE TU INFORMACIÓN PERSONAL</h3>
   <br>
   <p>
      ¡Nunca sabes quién puede estar al otro lado de la pantalla, así que nunca compartas tu información personal! Facilitar tus datos personales (nombre, dirección, números de teléfono, fotos o escuela a la que asistes) podría llevarte a ser timado, acosado o expuesto a un peligro serio.
   </p>
   <br><br>
   <hr/>
   <p>
      <img alt="PROTEGE TU PRIVACIDAD" class="align-right" src="app/assets/img/Safety/safetytips2_n2.png"
         style="-webkit-font-smoothing:antialiased; border:0px; box-sizing:border-box; display:inline-block; float:right; image-rendering:pixelated; margin:12px 0px 12px 24px; vertical-align:middle"/>
   </p>
   <br>
   <h3 style="font-size:200%;">PROTEGE TU PRIVACIDAD</h3>
   <br>
   <p>
      Nunca compartas ninguno de tus detalles personales. Esto incluye info de Facebook, Twitter, Skype, Instagram y Snapchat. ¡Nunca sabes quién puede poner sus manos en ella!
   </p>
   <br><br><br><br>
   <hr/>
   <p>
      <img alt="NO CEDAS A LA PRESIÓN DE LOS DEMÁS" class="align-right" src="app/assets/img/Safety/safetytips3_n.png"
         style="-webkit-font-smoothing:antialiased; border:0px; box-sizing:border-box; display:inline-block; float:right; image-rendering:pixelated; margin:12px 0px 12px 24px; vertical-align:middle"/>
   </p>
   <br>
   <h3 style="font-size:200%;">NO CEDAS A LA PRESIÓN DE LOS DEMÁS</h3>
   </br>
   <p>
      Aunque todos lo hagan, no significa que tú tengas que hacerlo. Si no te sientes cómodo con algo, ¡no lo hagas!
   </p>
   <br><br><br><br>
   <hr/>
   <p>
      <img alt="AMISTADES DE PÍXEL" class="align-right" src="app/assets/img/Safety/safetytips4_n.png"
         style="-webkit-font-smoothing:antialiased; border:0px; box-sizing:border-box; display:inline-block; float:right; image-rendering:pixelated; margin:12px 0px 12px 24px; vertical-align:middle"/>
   </p>
   <br>
   <h3 style="font-size:200%;">AMISTADES DE PÍXEL</h3>
   <br>
   <p>
      ¡No quedes con nadie que sólo conozcas de Internet! Las personas no siempre son quienes dicen ser. Si un <?php echo $Functions->HotelName(); ?> te pide que os encontréis en la vida real dile: "¡No, gracias!". Haz clic sobre el avatar, pincha la opción 'Ignorar' e inmediatamente después díselo a tus padres o a otro adulto de confianza.
   </p>
   <br><br><br>
   <hr/>
   <p>
      <img alt="QUE NO TE DE MIEDO HABLAR" class="align-right"
         src="app/assets/img/Safety/safetytips5_n.png"
         style="-webkit-font-smoothing:antialiased; border:0px; box-sizing:border-box; display:inline-block; float:right; image-rendering:pixelated; margin:12px 0px 12px 24px; vertical-align:middle"/>
   </p>
   <br>
   <h3 style="font-size:200%;">QUE NO TE DE MIEDO HABLAR</h3>
   <br>
   <p>
      Si alguien te hace sentir incómod@ o te asusta con amenazas en <?php echo $Functions->HotelName(); ?>, repórtalo usando el Botón de Ayuda.
   </p>
   <br><br><br><br>
   <hr/>
   <p>
      <img alt="APAGA LA CÁMARA" class="align-right" src="app/assets/img/Safety/safetytips6_n.png"
         style="-webkit-font-smoothing:antialiased; border:0px; box-sizing:border-box; display:inline-block; float:right; image-rendering:pixelated; margin:12px 0px 12px 24px; vertical-align:middle"/>
   </p>
   <br>
   <h3 style="font-size:200%;">APAGA LA CÁMARA</h3>
   <br>
   <p>
      No puedes controlar tus fotos e imágenes una vez que las has lanzado a través de Internet o la webcam. No hay vuelta atrás… Cualquiera puede compartirlas con quien quiera y puede usarlas para acosarte o amenazarte. Por favor, si lo vas a hacer, piensa antes: ¿Estás seguro de que te da igual que cualquiera pueda ver esa imagen?
   </p>
   <br><br>
   <hr/>
   <p>
      <img alt="NAVEGA CON CABEZA" class="align-right" src="app/assets/img/Safety/safetytips7_n.png"
         style="-webkit-font-smoothing:antialiased; border:0px; box-sizing:border-box; display:inline-block; float:right; image-rendering:pixelated; margin:12px 0px 12px 24px; vertical-align:middle"/>
   </p>
   <br>
   <h3 style="font-size:200%;">NAVEGA CON CABEZA</h3>
   <br>
   <p>
      Las webs que ofrecen Créditos gratis, Furni, o simulan ser <?php echo $Functions->HotelName(); ?> Hotel o páginas de trabajadores de <?php echo $Functions->HotelName(); ?>, son sites para timar. Están diseñados para robar tu contraseña. No facilites ningún dato personal ni te descargues archivos en ellas; podrías bajarte algún virus o keylogger.
   </p>
</div>
<br><br>
<?php }elseif($content == 5){ ?>
<div style="color:white;font-size:120%;" id="helpmenu">
   <p>
      Quizás te encuentres de forma ocasional con el mal comportamiento de un Habbo. ¡Nada que temer! ¡La ayuda está en camino! En esta página te diremos qué herramientas funcionan mejor en cada situación.
   </p>
   <br>
   <h2 style="font-size:200%;">EN UNA SALA</h2>
   <br>
   <p>
      Si estás en una sala y otro Habbo te está molestando, puedes hacer clic en su avatar y aparecerá un menú desplegable. Esto te permitirá ignorar, moderar o, en casos realmente graves, reportarle.
   </p>
   <h6 style="font-size:135%;">IGNORAR A UN HABBO</h6>
   <p>
      Si un Habbo está diciendo cosas que te hacen sentir incómodo, puedes seleccionar la opción "ignorar!. Esta es una solución ideal para provocaciones, spam o cuando simplemente quieres que te dejen tranquilo y no sabes cómo decirlo.
   </p>
   <p>
      <img alt="Haz clic en un avatar para ignorar, moderar o reportar" class="align-right"
         src="app/assets/img/Safety/report_es.png"
         style="-webkit-font-smoothing:antialiased; border:0px; box-sizing:border-box; display:inline-block; float:right; image-rendering:pixelated; margin:12px 0px 12px 24px; vertical-align:middle"/>
   </p>
   <ol>
      <li>1. Haz clic en su avatar. Se desplegará un menú.</li>
      <li>2. Selecciona la opción <i>Ignorar</i>.</li>
      <li>3. No verás nunca más lo que ese Habbo dice. Si quieres dejar de ignorarle, haz clic en su avatar de nuevo y elige <i>Escuchar</i>.</li>
   </ol>
   <h6 style="font-size:135%;">MODERAR A UN HABBO</h6>
   <p>
      <strong>Tanto si estás en una sala tuya, como si es de un amgio pero tienes derechos sobre ella, puedes decidir quién puede entrar a visitarla. Además, también tienes la posibilidad de mutear, expulsar o bannear a otros usuarios. Esto te permite ser parte activa de la moderación general de Habbo y contribuir con ello a crear una comunidad más segura y divertida.
   </p>
   <p>
      Puedes obtener más información en nuestra sección de Atención al Usuario en los apartados Herramientas de Moderación de Sala y Ajustes de Sala.
   </p>
   <h6 style="font-size:135%;">REPORTAR A UN HABBO</h6>
   <p>
      Si en tu sala se empiezan a dar las siguientes situaciones: los Habbos están hablando de encontrarse en la vida real, quieren una videollamada, algunos están intercambiando información personal de contacto o alguien está sufriendo bullying, puedes considerar reportar a esa persona. A nadie le gustan los soplones, así que recuerda usarlo sólo cuando se está dañando a otros intencionadamente o a sí mismos.
   </p>
   <ol>
      <li>1. Haz clic en el avatar del Habbo que crea problemas. Se desplegará un menú.</li>
      <li>2. Selecciona <i>Reportar</i>.</li>
      <li>3. Marca las líneas de chat que el equipo de moderación debería ver.</li>
      <li>4. Elige la mejor descripción de la situación.</li>
      <li>5. Dile al equipo de moderación lo que ha ocurrido.</li>
      <li>6. Finalmente haz clic en <i>Pedir Ayuda</i>. Si eliges <i>Acosos</i> un Guardián podrá intervenir.</li>
   </ol>
   <p>
      <img alt="Botón de ayuda" class="align-right" src="app/assets/img/Safety/help_button_es.png"
         style="-webkit-font-smoothing:antialiased; border:0px; box-sizing:border-box; display:inline-block; float:right; image-rendering:pixelated; margin:12px 0px 12px 24px; vertical-align:middle"/>
   </p>
   <p>
      Otra manera de hacer lo mismo es ésta:
   </p>
   <ol>
      <li>7. Haz clic en <i>Ayuda</i> en la esquina superior derecha.</li>
      <li>8. Selecciona <i>Reportar un acosador</i>. Verás una lista con todos los Habbos en la sala.</li>
      <li>9. Haz clic sobre el Habbo que se está comportando mal.</li>
      <li>10. Marca las líneas de chat que el equipo de moderación debería ver.</li>
      <li>11. Elige la mejor descripción de la situación.</li>
      <li>12. Dile al equipo de moderación lo que ha ocurrido.</li>
      <li>13. Manda el reporte y el equipo de moderación intentará resolver el asunto.</li>
   </ol>
   <br>
   <h2 style="font-size:200%;">EN CONSOLA/CHAT</h2>
   <br>
   <p>
      Si estás chateando con alguien en consola y te está haciendo sentir incómodo:
   </p>
   <ol>
      <li>1. Haz clic en el botón <i>Denunciar</i> que encontrarás debajo de la imagen del Habbo en la ventana de chat.</li>
      <li>2. Te preguntarán más detalles sobre lo ocurrido.</li>
      <li>3. Tras valorar lo sucedido, el equipo de moderación tomará la acción adecuada.</li>
   </ol>
   <p>
      <img alt="Reportar a un Habbo en consola" src="app/assets/img/Safety/report_im_es.png"
         style="-webkit-font-smoothing:antialiased; border:0px; box-sizing:border-box; image-rendering:pixelated; vertical-align:middle"/>
   </p>
   <br>
   <h2 style="font-size:200%;">EN UN FORO DE GRUPO</h2>
   <br>
   <p>
      <img alt="Bandera naranja para reportar hilos y post de un foro" class="align-right"
         src="app/assets/img/Safety/flag_3.png"
         style="-webkit-font-smoothing:antialiased; border:0px; box-sizing:border-box; display:inline-block; float:right; image-rendering:pixelated; margin:12px 0px 12px 24px; vertical-align:middle"/>
   </p>
   <p>
      Puedes reportar un hilo o post inapropiado de un foro de grupo:
   </p>
   <ol>
      <li>1. Haz clic sobre icono con forma de bandera naranja del foro.</li>
      <li>2. Te preguntarán más detalles sobre la situación.</li>
      <li>3. Tras valorar la situación, el equipo de moderación tomará las medidas oportunas.</li>
   </ol>
   <br>
   <h2 style="font-size:200%;">EN UNA PÁGINA WEB</h2>
   <br>
   <p>
      <img alt="White flag for reporting room home pages or camera pics" class="align-right"
         src="app/assets/img/Safety/flag_4.png"
         style="-webkit-font-smoothing:antialiased; border:0px; box-sizing:border-box; display:inline-block; float:right; image-rendering:pixelated; margin:12px 0px 12px 24px; vertical-align:middle"/>
   </p>
   <p>
      Puedes reportar una imagen inapropiada, sala o imagen de sala en una room homepage o página de fotos:
   </p>
   <ol>
      <li>1. Haz clic en el icono de la bandera blanca</li>
      <li>2. Elige el asunto para tu alerta que mejor se ajuste al asunto</li>
      <li>3. Indícanos qué hay de malo en la sala o foto</li>
      <li>4. El equipo de moderación tomará la acción apropiada</li>
   </ol>
   <br><br>
</div>
<?php }elseif($content == 6){ ?>
<?php } ?>