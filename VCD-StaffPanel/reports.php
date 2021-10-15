<?php
   ob_start();
    require_once '../global.php';
   
    $Functions->Logged("true");
    $Functions->LoggedHk(MERANK);
      
    $TplClass->SetParam('home', 'selected');
    $TplClass->SetParam('sub', '<li class="breadcrumb-item"><a href="'.HK.'">Inicio</a></li>
                                <li class="breadcrumb-item"><span>Reportes</span></li>');
   
    $TplClass->AddTemplateHK("templates", "menu");          
    ob_end_flush();    
   
   ?>


<div class="content-i">
   <div class="content-box">
      <div class="support-index">
         <div class="support-tickets">
            <div class="support-tickets-header">
               <div class="tickets-control">
                  <h5>Tickets</h5>
               </div>
            </div>



            <div class="support-ticket active">
               <div class="st-meta">
                  <div class="badge badge-warning-inverted">Restaurants</div>
                  <i class="os-icon os-icon-ui-09"></i>
                  <div class="status-pill yellow"></div>
               </div>
               <div class="st-body">
                  <div class="avatar"><img alt="" src="img/avatar3.jpg"></div>
                  <div class="ticket-content">
                     <h6 class="ticket-title">Settings page is not working</h6>
                     <div class="ticket-description">I have enabled the software for you, you can try now...</div>
                  </div>
               </div>
               <div class="st-foot"><span class="label">Agent:</span><a class="value with-avatar" href="#"><img alt="" src="img/avatar1.jpg"><span>John Mayers</span></a><span class="label">Updated:</span><span class="value">Jan 12th 7:32am</span></div>
            </div>

            
            
            <div class="load-more-tickets"><a href="#"><span>Load More Tickets...</span></a></div>
         </div>
         <div class="support-ticket-content-w" style="height: 660px">
            <div class="support-ticket-content">
 
               <div class="ticket-thread" style="overflow-y:auto; min-height:55%; max-height: 55%;">


                  <div class="ticket-reply">
                     <div class="ticket-reply-info">
                        <a class="author with-avatar" href="#"><img alt="" src="img/avatar1.jpg"><span>John Mayers</span></a><span class="info-data"><span class="label">replied on</span><span class="value">May 27th, 2017 at 7:42am</span></span>
                        <div class="actions" href="#">
                           <i class="os-icon os-icon-ui-46"></i>
                           <div class="actions-list"><a href="#"><i class="os-icon os-icon-ui-49"></i><span>Edit</span></a><a href="#"><i class="os-icon os-icon-ui-09"></i><span>Mark Private</span></a><a href="#"><i class="os-icon os-icon-ui-03"></i><span>Favorite</span></a><a class="danger" href="#"><i class="os-icon os-icon-ui-15"></i><span>Delete</span></a></div>
                        </div>
                     </div>
                     <div class="ticket-reply-content">
                        <p>El escribe</p>
                     </div>
                  </div>



                  <div class="ticket-reply highlight">
                     <div class="ticket-reply-info">
                        <a class="author with-avatar" href="#"><img alt="" src="img/avatar3.jpg"><span>Phil Collins</span></a><span class="info-data"><span class="label">replied on</span><span class="value">May 12th, 2017 at 11:23am</span></span><span class="badge badge-success">support agent</span>
                        <div class="actions" href="#">
                           <i class="os-icon os-icon-ui-46"></i>
                           <div class="actions-list"><a href="#"><i class="os-icon os-icon-ui-49"></i><span>Edit</span></a><a href="#"><i class="os-icon os-icon-ui-09"></i><span>Mark Private</span></a><a href="#"><i class="os-icon os-icon-ui-03"></i><span>Favorite</span></a><a class="danger" href="#"><i class="os-icon os-icon-ui-15"></i><span>Delete</span></a></div>
                        </div>
                     </div>
                     <div class="ticket-reply-content">
                        <p>Yo escribo</p>
                     </div>
                  </div>

                  


               </div>

               <div class="form-group" style="position: absolute;bottom: 0;width:88%;top: 318px">
                  <script type="text/javascript" src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
                           <script type="text/javascript">
                              tinymce.init({
                                 selector: "textarea",
                                 plugins: [
                                    "advlist autolink lists link image charmap print preview anchor",
                                    "searchreplace visualblocks code fullscreen",
                                    "insertdatetime media table contextmenu paste"
                                 ],
                                 toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
                              });
                           </script>
                  <textarea class="form-control" rows="3"></textarea>

                  <div class="form-buttons-w"><button class="btn btn-primary" type="submit"> Submit</button></div>

               </div>

            </div>
            <div class="support-ticket-info">
               <div class="customer">
                  <div class="avatar"><img alt="" src="img/avatar1.jpg"></div>
                  <h4 class="customer-name">John Mayers</h4>
                  <div class="customer-tickets">12 Tickets</div>
               </div>
               <h5 class="info-header">Ticket Details</h5>
               <div class="info-section text-center">
                  <div class="label">Created:</div>
                  <div class="value">Jan 24th, 8:15am</div>
                  <div class="label">Category</div>
                  <div class="value">
                     <div class="badge badge-primary">Photobook</div>
                  </div>
               </div>
               <h5 class="info-header">Agents Assigned</h5>
               <div class="info-section">
                  <ul class="users-list as-tiles">
                     <li>
                        <a class="author with-avatar" href="#">
                           <div class="avatar" style="background-image: url('img/avatar1.jpg')"></div>
                           <span>John Mayers</span>
                        </a>
                     </li>
                     
                     <li><a class="add-agent-btn" href="#"><i class="os-icon os-icon-ui-22"></i><span>Add Agent</span></a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>

   </div>
</div>




<?php
   $TplClass->AddTemplateHK("templates", "footer");          
   ?>
<script src="<?php echo HK; ?>/app/assets/js/vicode.js"></script>
</body>
</html>