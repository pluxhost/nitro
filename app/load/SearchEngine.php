<?php
   ob_start();
   require_once '../../global.php';
   
   $q = $Functions->FilterText($_POST[words]);
   $type = $Functions->FilterText($_POST[search]);
   
   
   
if($type == 'news'){
    
   $sql = $db->query("SELECT * FROM cms_news WHERE title LIKE '%".$q."%' ORDER BY title DESC");
   if($sql->num_rows == 0){
   
   echo '<center>
                  <br><br><br><br><br><br><br><br><br><br><br><br><p style="color:white;font-size:400%;">No hay ninguna noticia llamada <b>'.$q.'</p>
               </center>';
   
   }else{
   
   while($fila = $sql->fetch_array()){
   
   echo '<a id="closesearch4" place="'.$Functions->FilterText($fila['title']).' - '.$Functions->HotelName().'" style="color:black;" href="'.PATH.'/news/'.$fila['id'].'-'.$Functions->FilterTextLink($fila['title']).'">
   <div id="searchcase">
   <div id="search10"><img src="'.$fila['image'].'"></div>
   <div id="search11">'.$Functions->FilterText($fila['title']).'</div>
   </div>
   </a>';
   
   }
   }  
    
   }
   ?>