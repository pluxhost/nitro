<?php
   ob_start();
    require_once '../global.php';
   
    $Functions->Logged("true");
    $Functions->LoggedHk(MERANK);
      
    $TplClass->SetParam('add', 'selected');
    $TplClass->SetParam('sub', '<li class="breadcrumb-item"><a href="'.HK.'news.php">Add</a></li>
                                <li class="breadcrumb-item"><span>News</span></li>');
   
    $TplClass->AddTemplateHK("templates", "menu");          
    ob_end_flush(); 

    $action = $Functions->FilterText($_GET['action']);
    $id = $Functions->FilterText($_GET['id']);

           if($_POST['addnew']){
       if(isset($_POST['title']) && isset($_POST['content']) && isset($_POST['longcontent']) && isset($_POST['image'])){
        $title = $Functions->FilterText($_POST['title']);
        $content = $_POST['content'];
        $longcontent = $_POST['longcontent'];
        $image = $Functions->FilterText($_POST['image']);
    
        if(empty($title) || empty($image) || empty($content) || empty($longcontent)){
            $_SESSION['ERROR_RETURN'] = "Has dejado campos vac&iacute;os";
            header("LOCATION: ". HK ."news.php");
        }else{
            $dbQuery= array();
            $dbQuery['user_id'] = $Functions->Me('id');
            $dbQuery['title'] = $title;
            $dbQuery['story'] = $content;
            $dbQuery['longstory'] = $longcontent;
            $dbQuery['image'] = $image;                
            $dbQuery['time'] = time();
            $query = $db->insertInto('cms_news', $dbQuery);
            ///////////////////////////////////////////////////////////////////////
            $dbQuery             = array();
            $dbQuery['username'] = $Functions->Me('username');
            $dbQuery['message']  = 'Ha creado una nueva noticia.';
            $dbQuery['rank']     = $Functions->Me('rank');
            $dbQuery['action']   = 'El usuerio '.$Functions->Me('username').' ha creado una nueva noticia, con el título de "'.$title.'".';
            $dbQuery['userid']   = $Functions->Me('id');
            $dbQuery['time']     = time();
            $query               = $db->insertInto('cms_stafflogs', $dbQuery);

            $_SESSION['GOOD_RETURN'] = "Noticia creada correctamente";
            header("LOCATION: ". HK ."news.php");
        }
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($_POST['editnew']){
    if(isset($_POST['title']) && isset($_POST['content']) && isset($_POST['longcontent']) && isset($_POST['image'])){
        $title = $Functions->FilterText($_POST['title']);
        $content = $_POST['content'];
        $longcontent = $_POST['longcontent'];
        $image = $Functions->FilterText($_POST['image']);
        if(empty($_POST['title']) || empty($_POST['content']) || empty($_POST['longcontent']) || empty($_POST['image'])){
            $_SESSION['ERROR_RETURN'] = "Has dejado campos vac&iacute;os";
            header("LOCATION: ". HK ."news.php?action=edit&id=".$id."");
        }else{
            $db->query("UPDATE cms_news SET title = '{$title}', story = '{$content}', image = '{$image}', longstory = '{$longcontent}', time = '".time()."' WHERE id = '{$id}' LIMIT 1");
            ///////////////////////////////////////////////////////////////////////
            $dbQuery             = array();
            $dbQuery['username'] = $Functions->Me('username');
            $dbQuery['message']  = 'Ha editado una noticia.';
            $dbQuery['rank']     = $Functions->Me('rank');
            $dbQuery['action']   = 'El usuerio '.$Functions->Me('username').' ha editado una noticia, con el título "'.$title.'" ("'.$id.'").';
            $dbQuery['userid']   = $Functions->Me('id');
            $dbQuery['time']     = time();
            $query               = $db->insertInto('cms_stafflogs', $dbQuery);

            $_SESSION['GOOD_RETURN'] = "Promo editado correctamente";
            header("LOCATION: ". HK ."news.php?action=edit&id=".$id."");
        }
    }
}
  
   
   ?>


<div class="content-i">
   <div class="content-box">
      <div class="row">
          <?php global $db;
         if($action == "edit" && !empty($id)){
         $hj = $db->query("SELECT * FROM cms_news WHERE id = '". $id ."'");
         $h_edit = $hj->fetch_array();
         ?>


<div class="col-lg-6">
      <div class="element-wrapper">
         <h6 class="element-header">Editar noticia</h6>
         <div class="element-box">
<?php
 //COLUMNA ERROR
 $TplClass->AddTemplateHK("templates", "error");
?>
            <h5 class="form-header">Editar noticia </h5>
            <div class="form-desc">En este apartado tienes la libertad de editar una noticia. </div>

            <form action="" method="post">

      <div class="form-group">
         <label for=""> Título</label>
         <input class="form-control" placeholder="Title" type="text" name="title" value="<?php echo $h_edit['title']; ?>">
      </div>


<div class="form-group">
   <label> ¿De qué trata la noticia?</label>
   <textarea class="form-control" rows="3" name="content"><?php echo $h_edit['story']; ?></textarea>
</div>




<div class="form-group">
         <label for=""> Imagen</label>
         <input class="form-control" placeholder="Imagen" type="text" name="image" value="<?php echo $h_edit['image']; ?>">
      </div>


            <textarea cols="80" id="editor1" name="longcontent" rows="10" class="md-textarea"><?php echo $h_edit['longstory']; ?></textarea>

            <br>

             <center><input name="editnew" type="submit" class="btn btn-primary" value="Editar"></center>
 

</form>

         </div>
      </div>
      </div>





<?php }else{ ?>
<div class="col-lg-6">
      <div class="element-wrapper">
         <h6 class="element-header">Crear noticia</h6>
         <div class="element-box">
<?php
 //COLUMNA ERROR
 $TplClass->AddTemplateHK("templates", "error");
?>
            <h5 class="form-header">Crear noticia </h5>
            <div class="form-desc">En este apartado tienes la libertad de crear una noticia. </div>

            <form action="" method="post">

      <div class="form-group">
         <label for=""> Título</label>
         <input class="form-control" placeholder="Title" type="text" name="title">
      </div>


<div class="form-group">
   <label> ¿De qué trata la noticia?</label>
   <textarea class="form-control" rows="3" name="content"></textarea>
</div>




<div class="form-group">
         <label for=""> Imagen</label>
         <input class="form-control" placeholder="Imagen" type="text" name="image">
      </div>


            <textarea cols="80" id="editor1" name="longcontent" rows="10" class="md-textarea"></textarea>

            <br>

             <center><input name="addnew" type="submit" class="btn btn-primary" value="Publicar"></center>
 

</form>

         </div>
      </div>
      </div>
<?php } ?>







   <div class="col-lg-6">
      <div class="element-wrapper">
         <h6 class="element-header">Noticias creadas</h6>
         <div class="element-box-tp">

<?php    global $db;
            $result = $db->query("SELECT * FROM cms_news ORDER BY id DESC LIMIT 7");
            if($result->num_rows > 0){
              while($data = $result->fetch_array()){
                  
                  $buscuser = $db->query("SELECT * FROM $users WHERE id = '".$data['user_id']."'");
                     $userinfo = $buscuser->fetch_array();?>


            <div class="post-box">
               <div class="post-media" style="background-image: url(<?php echo $data['image']; ?>)"></div>
               <div class="post-content">
                  <h6 class="post-title"><?php echo $data['title']; ?> </h6>
                  <div class="post-text"><?php echo $data['story']; ?> </div>
                  <div class="post-foot">
                     <div class="post-tags">
                        <div class="badge badge-primary"><?php echo $userinfo['username']; ?></div>
                     </div>
                     <a class="post-link" href="<?php echo HK; ?>news.php?action=edit&id=<?php echo $data['id']; ?>"><span>Editar</span><i class="os-icon os-icon-arrow-right7"></i></a>
                  </div>
               </div>
            </div>
<?php } } ?>



         </div>
      </div>
   </div>




</div>







</div>




<?php
   $TplClass->AddTemplateHK("templates", "footer");          
   ?>
</body>
</html>

<script type="text/javascript">
   <?php 
   if($action == "edit"){
   ?>
   CKEDITOR.inline("editor1");
   <?php 
   }else{
   ?>
    CKEDITOR.replace("editor1");
   <?php 
   }
   ?>

   //CKEDITOR.inline(
</script>