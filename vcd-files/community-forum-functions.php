<?php
   ob_start();
   require_once 'global.php';
   
   $Functions->Logged("true");
   
   
   $TplClass->SetParam('activeCForum', 'router-link-exact-active router-link-active');
   
   $type  = $Functions->FilterText($_GET['type']);
   $link = $Functions->FilterText($_GET['id']);
   
   $getlink = explode('-', $link);
   $id     = $getlink[0];
   
   
   if ( $type == 'create' ) {
   
   $TplClass->SetParam('title', 'Crear tema');
   $TplClass->SetParam('description', 'Crear tema');
   
   } else if ( $type == 'category' && !empty($id) ) {
   $resultfct      = $db->query("SELECT * FROM cms_forum_category WHERE id = '{$id}'");
   $forumCategoryT = $resultfct->fetch_array();
   
   $TplClass->SetParam('title', $Functions->FilterText($forumCategoryT['title']));
   $TplClass->SetParam('description', $Functions->FilterText($forumCategoryT['description']));
   
   } else if ( $type == 'thread' && !empty($id) ) {
   
   $thread = explode('-', $id);
   $getid = $thread[0];
   
   if(empty($getid)){
     $rf = $db->query("SELECT * FROM cms_forum ORDER BY id DESC LIMIT 1");
     $forum = $rf->fetch_array();
     $getid = $forum['id'];
     }else{
     $rf = $db->query("SELECT * FROM cms_forum WHERE id = '{$getid}' LIMIT 1");
     $forum = $rf->fetch_array();
     $db->query("UPDATE cms_forum SET views = views + '1' WHERE id = '{$forum['id']}'");
     }
   
   $TplClass->SetParam('title', $Functions->FilterText($forum['title']));
   $TplClass->SetParam('description', $Functions->FilterText($forum['title']));
   
   }
   
   $TplClass->AddTemplate("header", "header");
   ?>
<div class="app">
   <style type="text/css">.icon {
      position: relative;
      display: inline-block;
      vertical-align: middle;
      width: 0.8rem;
      height: 0.8rem;
      margin: 0 0.3rem;
      top: 1px;
      fill: white;
      color: white;
      }
      .icon__svg {
      display: inline-block;
      vertical-align: top;
      width: 100%;
      height: 100%;
      }
      .icon:first-child {
      margin-left: 0;
      }
      .icon:last-child {
      margin-right: 0;
      }
      body > svg path,
      body > svg rect,
      body > svg circle,
      body > svg g,
      .icon use > svg path,
      .icon use > svg rect,
      .icon use > svg circle,
      .icon use > svg g,
      symbol path,
      symbol rect,
      symbol circle,
      symbol g {
      fill: currentColor;
      stroke: none;
      }
      body > svg *[d="M0 0h24v24H0z"],
      .icon use > svg *[d="M0 0h24v24H0z"],
      symbol *[d="M0 0h24v24H0z"] {
      display: none;
      }
   </style>
   <svg data-v-14731da8="" xmlns="http://www.w3.org/2000/svg" style="position: absolute; width: 0px; height: 0px; display: none;">
      <symbol data-v-14731da8="" viewBox="0 0 24 24" id="icon--add_col_after">
         <path data-v-14731da8="" d="M5 14a5 5 0 110 10 5 5 0 010-10zm2.5 5.938a.937.937 0 100-1.875H6.25a.312.312 0 01-.313-.313V16.5a.937.937 0 10-1.875 0v1.25c0 .173-.14.313-.312.313H2.5a.937.937 0 100 1.875h1.25c.173 0 .313.14.313.312v1.25a.937.937 0 101.875 0v-1.25c0-.173.14-.313.312-.313H7.5zM16 19a3 3 0 006 0V5a3 3 0 00-6 0v14zm-2 0V5a5 5 0 0110 0v14a5 5 0 01-10 0z"></path>
      </symbol>
      <symbol data-v-14731da8="" viewBox="0 0 24 24" id="icon--add_col_before">
         <path data-v-14731da8="" d="M19 14a5 5 0 110 10 5 5 0 010-10zm2.5 5.938a.937.937 0 100-1.875h-1.25a.312.312 0 01-.313-.313V16.5a.937.937 0 10-1.875 0v1.25c0 .173-.14.313-.312.313H16.5a.937.937 0 100 1.875h1.25c.173 0 .313.14.313.312v1.25a.937.937 0 101.875 0v-1.25c0-.173.14-.313.312-.313h1.25zM2 19a3 3 0 006 0V5a3 3 0 10-6 0v14zm-2 0V5a5 5 0 1110 0v14a5 5 0 01-10 0z"></path>
      </symbol>
      <symbol data-v-14731da8="" viewBox="0 0 24 24" id="icon--add_row_after">
         <path data-v-14731da8="" d="M19 0a5 5 0 110 10 5 5 0 010-10zm2.5 5.938a.937.937 0 100-1.875h-1.25a.312.312 0 01-.313-.313V2.5a.937.937 0 10-1.875 0v1.25c0 .173-.14.313-.312.313H16.5a.937.937 0 100 1.875h1.25c.173 0 .313.14.313.312V7.5a.937.937 0 101.875 0V6.25c0-.173.14-.313.312-.313h1.25zM5 16a3 3 0 000 6h14a3 3 0 000-6H5zm0-2h14a5 5 0 010 10H5a5 5 0 010-10z"></path>
      </symbol>
      <symbol data-v-14731da8="" viewBox="0 0 24 24" id="icon--add_row_before">
         <path data-v-14731da8="" d="M19 14a5 5 0 110 10 5 5 0 010-10zm2.5 5.938a.937.937 0 100-1.875h-1.25a.312.312 0 01-.313-.313V16.5a.937.937 0 10-1.875 0v1.25c0 .173-.14.313-.312.313H16.5a.937.937 0 100 1.875h1.25c.173 0 .313.14.313.312v1.25a.937.937 0 101.875 0v-1.25c0-.173.14-.313.312-.313h1.25zM5 2a3 3 0 100 6h14a3 3 0 000-6H5zm0-2h14a5 5 0 010 10H5A5 5 0 115 0z"></path>
      </symbol>
      <symbol data-v-14731da8="" viewBox="0 0 24 24" id="icon--bold">
         <path data-v-14731da8="" d="M17.194 10.962A6.271 6.271 0 0012.844.248H4.3a1.25 1.25 0 000 2.5h1.013a.25.25 0 01.25.25V21a.25.25 0 01-.25.25H4.3a1.25 1.25 0 100 2.5h9.963a6.742 6.742 0 002.93-12.786zm-4.35-8.214a3.762 3.762 0 010 7.523H8.313a.25.25 0 01-.25-.25V3a.25.25 0 01.25-.25zm1.42 18.5H8.313a.25.25 0 01-.25-.25v-7.977a.25.25 0 01.25-.25h5.951a4.239 4.239 0 010 8.477z"></path>
      </symbol>
      <symbol data-v-14731da8="" viewBox="0 0 24 24" id="icon--checklist">
         <path data-v-14731da8="" d="M21 0H3a3 3 0 00-3 3v18a3 3 0 003 3h18a3 3 0 003-3V3a3 3 0 00-3-3zm1 21a1 1 0 01-1 1H3a1 1 0 01-1-1V3a1 1 0 011-1h18a1 1 0 011 1z"></path>
         <path data-v-14731da8="" d="M11.249 4.5a1.251 1.251 0 00-1.75.25L7.365 7.6l-.482-.481a1.25 1.25 0 00-1.767 1.764l1.5 1.5a1.262 1.262 0 001.884-.134l3-4a1.25 1.25 0 00-.251-1.749zm0 9a1.251 1.251 0 00-1.75.25L7.365 16.6l-.482-.481a1.25 1.25 0 10-1.767 1.768l1.5 1.5a1.265 1.265 0 001.884-.138l3-4a1.25 1.25 0 00-.251-1.749zM18.5 7.749H14a1.25 1.25 0 000 2.5h4.5a1.25 1.25 0 000-2.5zm0 8H14a1.25 1.25 0 000 2.5h4.5a1.25 1.25 0 100-2.5z"></path>
      </symbol>
      <symbol data-v-14731da8="" viewBox="0 0 24 24" id="icon--code">
         <path data-v-14731da8="" d="M9.147 21.552a1.244 1.244 0 01-.895-.378L.84 13.561a2.257 2.257 0 010-3.125l7.412-7.613a1.25 1.25 0 011.791 1.744l-6.9 7.083a.5.5 0 000 .7l6.9 7.082a1.25 1.25 0 01-.9 2.122zm5.707 0a1.25 1.25 0 01-.9-2.122l6.9-7.083a.5.5 0 000-.7l-6.9-7.082a1.25 1.25 0 011.791-1.744l7.411 7.612a2.257 2.257 0 010 3.125l-7.412 7.614a1.244 1.244 0 01-.89.38zm6.514-9.373z"></path>
      </symbol>
      <symbol data-v-14731da8="" viewBox="0 0 24 24" id="icon--combine_cells">
         <path data-v-14731da8="" d="M2 19a3 3 0 003 3h14a3 3 0 003-3V5a3 3 0 00-3-3H5a3 3 0 00-3 3v14zm-2 0V5a5 5 0 015-5h14a5 5 0 015 5v14a5 5 0 01-5 5H5a5 5 0 01-5-5zm12-9a1 1 0 011 1v2a1 1 0 01-2 0v-2a1 1 0 011-1zm0 6a1 1 0 011 1v3a1 1 0 01-2 0v-3a1 1 0 011-1zm0-13a1 1 0 011 1v3a1 1 0 01-2 0V4a1 1 0 011-1z"></path>
      </symbol>
      <symbol data-v-14731da8="" viewBox="0 0 24 24" id="icon--delete_col">
         <path data-v-14731da8="" d="M12.641 21.931a7.01 7.01 0 001.146 1.74A5 5 0 017 19V5a5 5 0 1110 0v7.29a6.972 6.972 0 00-2 .965V5a3 3 0 00-6 0v14a3 3 0 003.641 2.931zM19 14a5 5 0 110 10 5 5 0 010-10zm-2.5 5.938h5a.937.937 0 100-1.875h-5a.937.937 0 100 1.875z"></path>
      </symbol>
      <symbol data-v-14731da8="" viewBox="0 0 24 24" id="icon--delete_row">
         <path data-v-14731da8="" d="M13.255 15a6.972 6.972 0 00-.965 2H5A5 5 0 015 7h14a5 5 0 014.671 6.787 7.01 7.01 0 00-1.74-1.146A3 3 0 0019 9H5a3 3 0 000 6h8.255zM19 14a5 5 0 110 10 5 5 0 010-10zm-2.5 5.938h5a.937.937 0 100-1.875h-5a.937.937 0 100 1.875z"></path>
      </symbol>
      <symbol data-v-14731da8="" viewBox="0 0 24 24" id="icon--delete_table">
         <path data-v-14731da8="" d="M19 14a5 5 0 110 10 5 5 0 010-10zm-2.5 5.938h5a.937.937 0 100-1.875h-5a.937.937 0 100 1.875zM12.29 17H9v5h3.674c.356.75.841 1.426 1.427 2H5a5 5 0 01-5-5V5a5 5 0 015-5h14a5 5 0 015 5v2.823a.843.843 0 010 .354V14.1a7.018 7.018 0 00-2-1.427V9h-5v3.29a6.972 6.972 0 00-2 .965V9H9v6h4.255a6.972 6.972 0 00-.965 2zM17 7h5V5a3 3 0 00-3-3h-2v5zm-2 0V2H9v5h6zM7 2H5a3 3 0 00-3 3v2h5V2zM2 9v6h5V9H2zm0 8v2a3 3 0 003 3h2v-5H2z"></path>
      </symbol>
      <symbol data-v-14731da8="" viewBox="0 0 24 24" id="icon--github">
         <path data-v-14731da8="" d="M11.999.5C5.649.5.5 5.648.5 12c0 5.082 3.294 9.392 7.865 10.914.574.103.756-.236.756-.541 0-.274.006-1.037 0-1.997-3.198.694-3.861-1.515-3.861-1.515-.523-1.329-1.275-1.682-1.275-1.682-1.045-.714.077-.699.077-.699 1.153.08 1.762 1.184 1.762 1.184 1.026 1.758 2.691 1.25 3.346.956.106-.742.402-1.251.731-1.536-2.554-.292-5.238-1.277-5.238-5.686 0-1.255.448-2.281 1.184-3.086-.118-.289-.514-1.46.112-3.043 0 0 .967-.309 3.162 1.18a11.011 11.011 0 012.88-.388c.976.005 1.96.132 2.88.388 2.195-1.488 3.159-1.18 3.159-1.18.627 1.583.232 2.754.114 3.043.736.805 1.183 1.831 1.183 3.086 0 4.42-2.689 5.391-5.251 5.674.412.357.787 1.047.787 2.12v3.184c0 .308.186.647.77.536C20.209 21.389 23.5 17.08 23.5 12 23.5 5.648 18.352.5 11.999.5z"></path>
      </symbol>
      <symbol data-v-14731da8="" viewBox="0 0 24 24" id="icon--hr">
         <path data-v-14731da8="" d="M5 13a1 1 0 010-2h14a1 1 0 010 2H5z"></path>
      </symbol>
      <symbol data-v-14731da8="" viewBox="0 0 24 24" id="icon--image">
         <circle data-v-14731da8="" cx="9.75" cy="6.247" r="2.25"></circle>
         <path data-v-14731da8="" d="M16.916 8.71A1.027 1.027 0 0016 8.158a1.007 1.007 0 00-.892.586l-1.558 3.434a.249.249 0 01-.422.053l-.82-1.024a1 1 0 00-.813-.376 1.007 1.007 0 00-.787.426L7.59 15.71a.5.5 0 00.41.79h12a.5.5 0 00.425-.237.5.5 0 00.022-.486z"></path>
         <path data-v-14731da8="" d="M22 0H5.5a2 2 0 00-2 2v16.5a2 2 0 002 2H22a2 2 0 002-2V2a2 2 0 00-2-2zm-.145 18.354a.5.5 0 01-.354.146H6a.5.5 0 01-.5-.5V2.5A.5.5 0 016 2h15.5a.5.5 0 01.5.5V18a.5.5 0 01-.145.351z"></path>
         <path data-v-14731da8="" d="M19.5 22h-17a.5.5 0 01-.5-.5v-17a1 1 0 00-2 0V22a2 2 0 002 2h17.5a1 1 0 000-2z"></path>
      </symbol>
      <symbol data-v-14731da8="" viewBox="0 0 24 24" id="icon--italic">
         <path data-v-14731da8="" d="M22.5.248h-7.637a1.25 1.25 0 000 2.5h1.086a.25.25 0 01.211.384L4.78 21.017a.5.5 0 01-.422.231H1.5a1.25 1.25 0 000 2.5h7.637a1.25 1.25 0 000-2.5H8.051a.25.25 0 01-.211-.384L19.22 2.98a.5.5 0 01.422-.232H22.5a1.25 1.25 0 000-2.5z"></path>
      </symbol>
      <symbol data-v-14731da8="" viewBox="0 0 24 24" id="icon--link">
         <path data-v-14731da8="" d="M12.406 14.905a1 1 0 00-.543 1.307 1 1 0 01-.217 1.09l-2.828 2.829a2 2 0 01-2.828 0L3.868 18.01a2 2 0 010-2.829L6.7 12.353a1.013 1.013 0 011.091-.217 1 1 0 00.763-1.849 3.034 3.034 0 00-3.268.652l-2.832 2.828a4.006 4.006 0 000 5.657l2.122 2.121a4 4 0 005.656 0l2.829-2.828a3.008 3.008 0 00.651-3.27 1 1 0 00-1.306-.542z"></path>
         <path data-v-14731da8="" d="M7.757 16.241a1.011 1.011 0 001.414 0l7.779-7.778a1 1 0 00-1.414-1.414l-7.779 7.778a1 1 0 000 1.414z"></path>
         <path data-v-14731da8="" d="M21.546 4.574l-2.121-2.121a4.006 4.006 0 00-5.657 0l-2.829 2.828a3.006 3.006 0 00-.651 3.269 1 1 0 101.849-.764 1 1 0 01.217-1.086l2.828-2.828a2 2 0 012.829 0l2.121 2.121a2 2 0 010 2.829L17.3 11.645a1.015 1.015 0 01-1.091.217 1 1 0 00-.765 1.849 3.026 3.026 0 003.27-.651l2.828-2.828a4.007 4.007 0 00.004-5.658z"></path>
      </symbol>
      <symbol data-v-14731da8="" viewBox="0 0 24 24" id="icon--mention">
         <path data-v-14731da8="" d="M12 .5A11.634 11.634 0 00.262 12 11.634 11.634 0 0012 23.5a11.836 11.836 0 006.624-2 1.25 1.25 0 10-1.393-2.076A9.34 9.34 0 0112 21a9.132 9.132 0 01-9.238-9A9.132 9.132 0 0112 3a9.132 9.132 0 019.238 9v.891a1.943 1.943 0 01-3.884 0V12A5.355 5.355 0 1012 17.261a5.376 5.376 0 003.861-1.634 4.438 4.438 0 007.877-2.736V12A11.634 11.634 0 0012 .5zm0 14.261A2.763 2.763 0 1114.854 12 2.812 2.812 0 0112 14.761z"></path>
      </symbol>
      <symbol data-v-14731da8="" viewBox="0 0 24 24" id="icon--ol">
         <path data-v-14731da8="" d="M7.75 4.5h15a1 1 0 000-2h-15a1 1 0 000 2zm15 6.5h-15a1 1 0 100 2h15a1 1 0 000-2zm0 8.5h-15a1 1 0 000 2h15a1 1 0 000-2zM2.212 17.248a2 2 0 00-1.933 1.484.75.75 0 101.45.386.5.5 0 11.483.63.75.75 0 100 1.5.5.5 0 11-.482.635.75.75 0 10-1.445.4 2 2 0 103.589-1.648.251.251 0 010-.278 2 2 0 00-1.662-3.111zm2.038-6.5a2 2 0 00-4 0 .75.75 0 001.5 0 .5.5 0 011 0 1.031 1.031 0 01-.227.645L.414 14.029A.75.75 0 001 15.248h2.5a.75.75 0 000-1.5h-.419a.249.249 0 01-.195-.406L3.7 12.33a2.544 2.544 0 00.55-1.582zM4 5.248h-.25A.25.25 0 013.5 5V1.623A1.377 1.377 0 002.125.248H1.5a.75.75 0 000 1.5h.25A.25.25 0 012 2v3a.25.25 0 01-.25.25H1.5a.75.75 0 000 1.5H4a.75.75 0 000-1.5z"></path>
      </symbol>
      <symbol data-v-14731da8="" viewBox="0 0 24 24" id="icon--paragraph">
         <path data-v-14731da8="" d="M22.5.248H7.228a6.977 6.977 0 100 13.954h2.318a.25.25 0 01.25.25V22.5a1.25 1.25 0 002.5 0V3a.25.25 0 01.25-.25h3.682a.25.25 0 01.25.25v19.5a1.25 1.25 0 002.5 0V3a.249.249 0 01.25-.25H22.5a1.25 1.25 0 000-2.5zM9.8 11.452a.25.25 0 01-.25.25H7.228a4.477 4.477 0 110-8.954h2.318A.25.25 0 019.8 3z"></path>
      </symbol>
      <symbol data-v-14731da8="" viewBox="0 0 24 24" id="icon--quote">
         <path data-v-14731da8="" d="M18.559 3.932a4.942 4.942 0 100 9.883 4.609 4.609 0 001.115-.141.25.25 0 01.276.368 6.83 6.83 0 01-5.878 3.523 1.25 1.25 0 000 2.5 9.71 9.71 0 009.428-9.95V8.873a4.947 4.947 0 00-4.941-4.941zm-12.323 0a4.942 4.942 0 000 9.883 4.6 4.6 0 001.115-.141.25.25 0 01.277.368 6.83 6.83 0 01-5.878 3.523 1.25 1.25 0 000 2.5 9.711 9.711 0 009.428-9.95V8.873a4.947 4.947 0 00-4.942-4.941z"></path>
      </symbol>
      <symbol data-v-14731da8="" viewBox="0 0 24 24" id="icon--redo">
         <path data-v-14731da8="" d="M22.608.161a.5.5 0 00-.545.108L19.472 2.86a.25.25 0 01-.292.045 12.537 12.537 0 00-12.966.865A12.259 12.259 0 006.1 23.632a1.25 1.25 0 001.476-2.018 9.759 9.759 0 01.091-15.809 10 10 0 019.466-1.1.25.25 0 01.084.409l-1.85 1.85a.5.5 0 00.354.853h6.7a.5.5 0 00.5-.5V.623a.5.5 0 00-.313-.462z"></path>
      </symbol>
      <symbol data-v-14731da8="" viewBox="0 0 24 24" id="icon--remove">
         <path data-v-14731da8="" d="M20.485 3.511A12.01 12.01 0 1024 12a12.009 12.009 0 00-3.515-8.489zm-1.767 15.21A9.51 9.51 0 1121.5 12a9.508 9.508 0 01-2.782 6.721z"></path>
         <path data-v-14731da8="" d="M16.987 7.01a1.275 1.275 0 00-1.8 0l-3.177 3.177L8.829 7.01a1.277 1.277 0 00-1.805 1.806l3.176 3.177-3.176 3.178a1.277 1.277 0 001.805 1.806l3.176-3.177 3.177 3.178a1.277 1.277 0 001.8-1.806l-3.176-3.178 3.176-3.177a1.278 1.278 0 00.005-1.807z"></path>
      </symbol>
      <symbol data-v-14731da8="" viewBox="0 0 24 24" id="icon--strike">
         <path data-v-14731da8="" d="M23.75 12.952A1.25 1.25 0 0022.5 11.7h-8.936a.492.492 0 01-.282-.09c-.722-.513-1.482-.981-2.218-1.432-2.8-1.715-4.5-2.9-4.5-4.863 0-2.235 2.207-2.569 3.523-2.569a4.54 4.54 0 013.081.764 2.662 2.662 0 01.447 1.99v.3a1.25 1.25 0 102.5 0v-.268a4.887 4.887 0 00-1.165-3.777C13.949.741 12.359.248 10.091.248c-3.658 0-6.023 1.989-6.023 5.069 0 2.773 1.892 4.512 4 5.927a.25.25 0 01-.139.458H1.5a1.25 1.25 0 000 2.5h10.977a.251.251 0 01.159.058 4.339 4.339 0 011.932 3.466c0 3.268-3.426 3.522-4.477 3.522-1.814 0-3.139-.405-3.834-1.173a3.394 3.394 0 01-.65-2.7 1.25 1.25 0 00-2.488-.246A5.76 5.76 0 004.4 21.753c1.2 1.324 3.114 2 5.688 2 4.174 0 6.977-2.42 6.977-6.022a6.059 6.059 0 00-.849-3.147.25.25 0 01.216-.377H22.5a1.25 1.25 0 001.25-1.255z"></path>
      </symbol>
      <symbol data-v-14731da8="" viewBox="0 0 24 24" id="icon--table">
         <path data-v-14731da8="" fill-rule="evenodd" d="M17 17v5h2a3 3 0 003-3v-2h-5zm-2 0H9v5h6v-5zm2-2h5V9h-5v6zm-2 0V9H9v6h6zm2-8h5V5a3 3 0 00-3-3h-2v5zm-2 0V2H9v5h6zm9 9.177V19a5 5 0 01-5 5H5a5 5 0 01-5-5V5a5 5 0 015-5h14a5 5 0 015 5v2.823a.843.843 0 010 .354v7.646a.843.843 0 010 .354zM7 2H5a3 3 0 00-3 3v2h5V2zM2 9v6h5V9H2zm0 8v2a3 3 0 003 3h2v-5H2z"></path>
      </symbol>
      <symbol data-v-14731da8="" viewBox="0 0 24 24" id="icon--ul">
         <circle data-v-14731da8="" cx="2.5" cy="3.998" r="2.5"></circle>
         <path data-v-14731da8="" d="M8.5 5H23a1 1 0 000-2H8.5a1 1 0 000 2z"></path>
         <circle data-v-14731da8="" cx="2.5" cy="11.998" r="2.5"></circle>
         <path data-v-14731da8="" d="M23 11H8.5a1 1 0 000 2H23a1 1 0 000-2z"></path>
         <circle data-v-14731da8="" cx="2.5" cy="19.998" r="2.5"></circle>
         <path data-v-14731da8="" d="M23 19H8.5a1 1 0 000 2H23a1 1 0 000-2z"></path>
      </symbol>
      <symbol data-v-14731da8="" viewBox="0 0 24 24" id="icon--underline">
         <path data-v-14731da8="" d="M22.5 21.248h-21a1.25 1.25 0 000 2.5h21a1.25 1.25 0 000-2.5zM1.978 2.748h1.363a.25.25 0 01.25.25v8.523a8.409 8.409 0 0016.818 0V3a.25.25 0 01.25-.25h1.363a1.25 1.25 0 000-2.5H16.3a1.25 1.25 0 000 2.5h1.363a.25.25 0 01.25.25v8.523a5.909 5.909 0 01-11.818 0V3a.25.25 0 01.25-.25H7.7a1.25 1.25 0 100-2.5H1.978a1.25 1.25 0 000 2.5z"></path>
      </symbol>
      <symbol data-v-14731da8="" viewBox="0 0 24 24" id="icon--undo">
         <path data-v-14731da8="" d="M17.786 3.77a12.542 12.542 0 00-12.965-.865.249.249 0 01-.292-.045L1.937.269A.507.507 0 001.392.16a.5.5 0 00-.308.462v6.7a.5.5 0 00.5.5h6.7a.5.5 0 00.354-.854L6.783 5.115a.253.253 0 01-.068-.228.249.249 0 01.152-.181 10 10 0 019.466 1.1 9.759 9.759 0 01.094 15.809 1.25 1.25 0 001.473 2.016 12.122 12.122 0 005.013-9.961 12.125 12.125 0 00-5.127-9.9z"></path>
      </symbol>
   </svg>
   <div class="website-bg">
      <div class="mid"></div>
   </div>
   <div class="page online forum <?php if ( $type == 'create' ) { echo "create"; } ?>">
      <?php $TplClass->AddTemplate("header", "menu"); ?>
      <?php $TplClass->AddTemplate("others", "users-currency"); ?>
      <?php if ( $type == 'create' ) { ?>
      <div class="forum global-box">
         <div class="header category">
            <h1><img src="<?php echo FILES; ?>/assets/img/forum/duck.gif">
               Crea un tema
            </h1>
            <a>Volver atrás</a> 
            <a href="/community/forum" class="router-link-active">Inicio del foro</a>
         </div>
      </div>
      <div class="content">
         <div class="background">
            <h1>NUEVO TEMA</h1>
         </div>
         <div class="global-box form">
            <div class="title">Crea un nuevo tema en el foro de <?php echo $Functions->WebSettings('hotelname'); ?></div>
            <div class="content">
               <div class="form">
                  <div class="input demi z">
                     <label for="rank">Categoría elegida</label> 
                     <div class="select-options">
                        <div class="select-button">
                           <span id="c_title">Seleccione una categoría</span> 
                           <div class="chevron"></div>
                        </div>
                        <div class="options" style="display: none;">
                           <input type="hidden" id="category" value="">
                           <?php
                              $resultfc              = $db->query("SELECT * FROM cms_forum_category WHERE rank_min <= '{$Functions->Me('rank')}' ORDER BY id ASC");
                              while ( $forumCategory = $resultfc->fetch_array() ) {
                              
                              ?>
                           <span option_id="<?php echo $forumCategory['id']; ?>" c_title="<?php echo $Functions->FilterText($forumCategory['title']); ?>" class="option">
                           <?php echo $Functions->FilterText($forumCategory['title']); ?>
                           </span>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
                  <div class="input demi right"><label for="title">Título del tema</label> <input type="text" placeholder="Ej. nuevo tema" id="title"></div>
                  <div class="input">
                     <label for="content">Contenido de su tema</label> 
                     <div class="tt-editor-menubar">
                        <button type="button" class="tt-btn" onclick="balise('bold');">
                           <div data-v-270fc2a9="" class="icon icon--bold icon--normal has-align-fix">
                              <svg data-v-270fc2a9="" class="icon__svg">
                                 <use data-v-270fc2a9="" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--bold"></use>
                              </svg>
                           </div>
                        </button>
                        <button type="button" class="tt-btn" onclick="balise('italic')">
                           <div data-v-270fc2a9="" class="icon icon--italic icon--normal has-align-fix">
                              <svg data-v-270fc2a9="" class="icon__svg">
                                 <use data-v-270fc2a9="" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--italic"></use>
                              </svg>
                           </div>
                        </button>
                        <button type="button" class="tt-btn">
                           <div data-v-270fc2a9="" class="icon icon--strike icon--normal has-align-fix" onclick="balise('strikeThrough')">
                              <svg data-v-270fc2a9="" class="icon__svg">
                                 <use data-v-270fc2a9="" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--strike"></use>
                              </svg>
                           </div>
                        </button>
                        <button type="button" class="tt-btn" onclick="balise('underline')">
                           <div data-v-270fc2a9="" class="icon icon--underline icon--normal has-align-fix">
                              <svg data-v-270fc2a9="" class="icon__svg">
                                 <use data-v-270fc2a9="" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--underline"></use>
                              </svg>
                           </div>
                        </button>
                        <button type="button" class="tt-btn" onclick="balise('code')">
                           <div data-v-270fc2a9="" class="icon icon--code icon--normal has-align-fix">
                              <svg data-v-270fc2a9="" class="icon__svg">
                                 <use data-v-270fc2a9="" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--code"></use>
                              </svg>
                           </div>
                        </button>
                        <button type="button" class="tt-btn is-active">
                           <div data-v-270fc2a9="" class="icon icon--paragraph icon--normal has-align-fix">
                              <svg data-v-270fc2a9="" class="icon__svg">
                                 <use data-v-270fc2a9="" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--paragraph"></use>
                              </svg>
                           </div>
                        </button>
                        <button type="button" class="tt-btn" onclick="balise('H1')">
                        H1
                        </button>
                        <button type="button" class="tt-btn" onclick="balise('H2')">
                        H2
                        </button>
                        <button type="button" class="tt-btn" onclick="balise('H3')">
                        H3
                        </button>
                        <button type="button" class="tt-btn" onclick="balise('square');">
                           <div data-v-270fc2a9="" class="icon icon--ul icon--normal has-align-fix">
                              <svg data-v-270fc2a9="" class="icon__svg">
                                 <use data-v-270fc2a9="" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--ul"></use>
                              </svg>
                           </div>
                        </button>
                        <button type="button" class="tt-btn" onclick="balise('number');">
                           <div data-v-270fc2a9="" class="icon icon--ol icon--normal has-align-fix">
                              <svg data-v-270fc2a9="" class="icon__svg">
                                 <use data-v-270fc2a9="" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--ol"></use>
                              </svg>
                           </div>
                        </button>
                        <button type="button" class="tt-btn">
                           <div data-v-270fc2a9="" class="icon icon--quote icon--normal has-align-fix">
                              <svg data-v-270fc2a9="" class="icon__svg">
                                 <use data-v-270fc2a9="" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--quote"></use>
                              </svg>
                           </div>
                        </button>
                        <button type="button" class="tt-btn" onclick="balise('insertImage');">
                           <div data-v-270fc2a9="" class="icon icon--image icon--normal has-align-fix">
                              <svg data-v-270fc2a9="" class="icon__svg">
                                 <use data-v-270fc2a9="" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--image"></use>
                              </svg>
                           </div>
                        </button>
                        <div class="tt-btn" style="align-self: end;" onclick="balise('undo')">
                           <div data-v-270fc2a9="" class="icon icon--undo icon--normal has-align-fix">
                              <svg data-v-270fc2a9="" class="icon__svg">
                                 <use data-v-270fc2a9="" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--undo"></use>
                              </svg>
                           </div>
                        </div>
                        <div class="tt-btn" style="align-self: end;" onclick="balise('redo')">
                           <div data-v-270fc2a9="" class="icon icon--redo icon--normal has-align-fix">
                              <svg data-v-270fc2a9="" class="icon__svg">
                                 <use data-v-270fc2a9="" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--redo"></use>
                              </svg>
                           </div>
                        </div>
                     </div>
                     <div class="tt-txtarea markdown-formatter">
                        <div type="text" contenteditable="true" tabindex="0" class="ProseMirror" id="content">
                           <p>Escriba aquí...</p>
                        </div>
                     </div>
                  </div>
                  <div class="input input-help">
                     <svg viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true">
                        <path fill="#ffffff" fill-rule="evenodd" d="M14.85 3H1.15C.52 3 0 3.52 0 4.15v7.69C0 12.48.52 13 1.15 13h13.69c.64 0 1.15-.52 1.15-1.15v-7.7C16 3.52 15.48 3 14.85 3zM9 11H7V8L5.5 9.92 4 8v3H2V5h2l1.5 2L7 5h2v6zm2.99.5L9.5 8H11V5h2v3h1.5l-2.51 3.5z"></path>
                     </svg>
                     <b>Se admite el formato de texto Markdown</b>
                  </div>
                  <div class="input checkbox"><input type="checkbox" name="comments_enabled" id="comments_enabled" checked> <label for="comments_enabled">Habilitar comentarios</label></div>
                  <div class="input checkbox"><input type="checkbox" name="pinned" id="pinned"> <label for="pinned">Fijar el tema</label></div>
                  <div class="input">
                     <input type="submit" id="btnSubmit" value="Publicar tema" onclick="addPostForum()"> <!---->
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php } else if ( $type == 'category' && !empty($id) ) { ?>
      <div class="forum global-box">
         <div class="header category">
            <h1><img src="<?php echo FILES; ?>/assets/img/forum/duck.gif">
               <?php echo $Functions->FilterText($forumCategoryT['title']); ?>
            </h1>
            <a>Volver atrás</a> 
            <a href="/community/forum" class="router-link-active">Inicio del foro</a>
         </div>
         <div class="content category">
            <div class="line head">
               <span class="title">Título</span> 
               <span class="users">Usuarios activos</span> 
               <span class="nb_responses">Respuestas</span> 
               <span class="last_activity">Última actividad</span>
            </div>
            <?php 
               $resultpc     = $db->query("SELECT * FROM cms_forum WHERE category = '{$id}'");
               if ( $resultpc->num_rows > 0 ) {
               while ( $post = $resultpc->fetch_array() ) {
               ?>
            <div class="line">
               <a href="/community/forum/thread/<?php echo $post['id']; ?>-<?php echo $Functions->FilterTextLink($post['title']); ?>" class="col title has-tooltip" data-original-title="null">
               <?php if ( $post['pinned'] == '1' ) { ?><span style="margin-right: 15px;">📌</span><?php } ?>
               <?php echo $Functions->FilterText($post['title']); ?>
               </a> 
               <div class="col users">
                  <?php 
                     $resultc     = $db->query("SELECT * FROM cms_forum_comments WHERE post_id = '{$post['id']}' GROUP BY user_id ORDER BY id DESC LIMIT 5");
                     while ( $u_a = $resultc->fetch_array() ) {
                     ?>
                  <div class="response-avatar has-tooltip" data-original-title="null">
                     <img src="<?php echo AVATARIMAGE . $Functions->User('look', $u_a['user_id']); ?>&headonly=1&size=s">
                  </div>
                  <?php } 
                     $more_ua = $db->query("SELECT * FROM cms_forum_comments WHERE post_id = '{$post['id']}' GROUP BY user_id ORDER BY id DESC");
                     $total_more = $more_ua->num_rows - 5;
                     if ( $total_more > 0 ) {
                     ?>
                  <div class="response-more-counter"><span>+<?php echo $total_more; ?></span></div>
                  <?php } ?>
               </div>
               <div class="col nb_responses"><?php $comments = $db->query("SELECT * FROM cms_forum_comments WHERE post_id = '{$post['id']}'"); echo $comments->num_rows; ?></div>
               <div class="col last_activity">
                  <?php 
                     $rt     = $db->query("SELECT * FROM cms_forum_comments WHERE post_id = '{$post['id']}' ORDER BY time DESC");
                     $CommentTime = $rt->fetch_array();
                     
                     if ( $rt->num_rows > 0 ) {
                        echo $Functions->GetLast($CommentTime['time']);
                     } else {
                        echo $Functions->GetLast($post['time']);
                     }
                     
                     ?>
               </div>
            </div>
            <?php }} else { ?>
            <div class="box-error error" style="margin: 10px 0 10px 0">
               <img src="<?php echo FILES; ?>/assets/img/error/avatar.png" class="error-avatar"> 
               <span>Aún no hay temas en esta categoría.</span>
            </div>
            <?php } ?>
         </div>
      </div>
      <?php } else if ( $type == 'thread' && !empty($id) ) {
         $resultfc      = $db->query("SELECT * FROM cms_forum_category WHERE id = '{$forum['category']}'");
         $forumCategory = $resultfc->fetch_array();
         
          ?>
      <div class="forum">
         <div class="global-box header">
            <h1><img src="<?php echo FILES; ?>/assets/img/forum/duck.gif"><?php echo $Functions->FilterText($forum['title']); ?>
            </h1>
            <a href="/community/forum/create" class="">Nuevo tema</a> 
            <a href="/community/forum" class="router-link-active">Inicio del foro</a>
         </div>
         <div class="global-box content thread">
            <div class="body">
               <div class="top">
                  <div class="avatar">
                     <img src="<?php echo AVATARIMAGE . $Functions->User('look', $forum['user_id']); ?>">
                  </div>
                  <div class="informations">
                     <span>
                     Escrito por <a href="#" class=""><?php echo $Functions->User('username', $forum['user_id']); ?></a>
                     </span> 
                     <span>Publicado <?php echo $Functions->GetLast2($forum['time']); ?></span> 
                     <span>En la categoria <a href="/community/forum/category/<?php echo $forumCategory['id']; ?>-<?php echo $Functions->FilterTextLink($forumCategory['title']); ?>" class=""><?php echo $forumCategory['title']; ?></a>
                     </span>
                  </div>
                  <div class="status">
                     <img src="<?php echo FILES; ?>/assets/img/forum/sujet.png" data-original-title="null" class=" has-tooltip"> <!---->
                  </div>
               </div>
               <div class="thread markdown-formatter">
                  <p><?php echo $Functions->FilterTextF($forum['content']); ?></p>
               </div>
               <div class="informations">
                  <span> Escrito por: <?php echo $Functions->User('username', $forum['user_id']); ?></span> 
                  <div class="right">
                    
                  </div>
               </div>
            </div>
         </div>
         <div class="content comments">
            <?php if ( $forum['comments'] == '1' ) { ?>
            <div thread_id="521" class="btn goDown">
               Escribe una respuesta
            </div>
            <?php } ?>
            <?php
               $resultfc              = $db->query("SELECT * FROM cms_forum_comments WHERE post_id = '{$forum['id']}' ORDER BY id ASC");
               while ( $forumComments = $resultfc->fetch_array() ) {
               ?>
            <div class="global-box content thread comment">
               <div class="body">
                  <div class="top">
                     <div class="avatar">
                        <img src="<?php echo AVATARIMAGE . $Functions->User('look', $forumComments['user_id']); ?>">
                     </div>
                     <div class="informations">
                        <span>Escrito por <a href="#" class=""><?php echo $Functions->User('username', $forumComments['user_id']); ?></a></span> 
                        <span>Publicado <?php echo $Functions->GetLast2($forumComments['time']); ?></span>
                     </div>
                     <div class="status"></div>
                  </div>
                  <div class="thread markdown-formatter">
                     <p><?php echo $Functions->FilterTextF($forumComments['content']); ?></p>
                  </div>
                  <div class="informations">
                     <span>No se ha realizado ninguna modificación a esta respuesta hasta la fecha</span> 
                     <div class="right">
                      
                     </div>
                  </div>
               </div>
            </div>
            <?php } ?>
            <div id="forumposts"></div>
            <?php if ( $forum['comments'] == '1' ) { ?>
            <div class="global-box create-response">
               <div class="title">
                  Escribe una respuesta
               </div>
               <div class="content">
                  <div class="input-create">
                     <div class="tt-editor-menubar">
                        <button type="button" class="tt-btn" onclick="balise('bold');">
                           <div data-v-270fc2a9="" class="icon icon--bold icon--normal has-align-fix">
                              <svg data-v-270fc2a9="" class="icon__svg">
                                 <use data-v-270fc2a9="" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--bold"></use>
                              </svg>
                           </div>
                        </button>
                        <button type="button" class="tt-btn" onclick="balise('italic')">
                           <div data-v-270fc2a9="" class="icon icon--italic icon--normal has-align-fix">
                              <svg data-v-270fc2a9="" class="icon__svg">
                                 <use data-v-270fc2a9="" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--italic"></use>
                              </svg>
                           </div>
                        </button>
                        <button type="button" class="tt-btn">
                           <div data-v-270fc2a9="" class="icon icon--strike icon--normal has-align-fix" onclick="balise('strikeThrough')">
                              <svg data-v-270fc2a9="" class="icon__svg">
                                 <use data-v-270fc2a9="" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--strike"></use>
                              </svg>
                           </div>
                        </button>
                        <button type="button" class="tt-btn" onclick="balise('underline')">
                           <div data-v-270fc2a9="" class="icon icon--underline icon--normal has-align-fix">
                              <svg data-v-270fc2a9="" class="icon__svg">
                                 <use data-v-270fc2a9="" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--underline"></use>
                              </svg>
                           </div>
                        </button>
                        <button type="button" class="tt-btn" onclick="balise('code')">
                           <div data-v-270fc2a9="" class="icon icon--code icon--normal has-align-fix">
                              <svg data-v-270fc2a9="" class="icon__svg">
                                 <use data-v-270fc2a9="" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--code"></use>
                              </svg>
                           </div>
                        </button>
                        <button type="button" class="tt-btn is-active">
                           <div data-v-270fc2a9="" class="icon icon--paragraph icon--normal has-align-fix">
                              <svg data-v-270fc2a9="" class="icon__svg">
                                 <use data-v-270fc2a9="" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--paragraph"></use>
                              </svg>
                           </div>
                        </button>
                        <button type="button" class="tt-btn" onclick="balise('H1')">
                        H1
                        </button>
                        <button type="button" class="tt-btn" onclick="balise('H2')">
                        H2
                        </button>
                        <button type="button" class="tt-btn" onclick="balise('H3')">
                        H3
                        </button>
                        <button type="button" class="tt-btn" onclick="balise('square');">
                           <div data-v-270fc2a9="" class="icon icon--ul icon--normal has-align-fix">
                              <svg data-v-270fc2a9="" class="icon__svg">
                                 <use data-v-270fc2a9="" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--ul"></use>
                              </svg>
                           </div>
                        </button>
                        <button type="button" class="tt-btn" onclick="balise('number');">
                           <div data-v-270fc2a9="" class="icon icon--ol icon--normal has-align-fix">
                              <svg data-v-270fc2a9="" class="icon__svg">
                                 <use data-v-270fc2a9="" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--ol"></use>
                              </svg>
                           </div>
                        </button>
                        <button type="button" class="tt-btn">
                           <div data-v-270fc2a9="" class="icon icon--quote icon--normal has-align-fix">
                              <svg data-v-270fc2a9="" class="icon__svg">
                                 <use data-v-270fc2a9="" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--quote"></use>
                              </svg>
                           </div>
                        </button>
                        <button type="button" class="tt-btn" onclick="balise('insertImage');">
                           <div data-v-270fc2a9="" class="icon icon--image icon--normal has-align-fix">
                              <svg data-v-270fc2a9="" class="icon__svg">
                                 <use data-v-270fc2a9="" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--image"></use>
                              </svg>
                           </div>
                        </button>
                        <div class="tt-btn" style="align-self: end;" onclick="balise('undo')">
                           <div data-v-270fc2a9="" class="icon icon--undo icon--normal has-align-fix">
                              <svg data-v-270fc2a9="" class="icon__svg">
                                 <use data-v-270fc2a9="" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--undo"></use>
                              </svg>
                           </div>
                        </div>
                        <div class="tt-btn" style="align-self: end;" onclick="balise('redo')">
                           <div data-v-270fc2a9="" class="icon icon--redo icon--normal has-align-fix">
                              <svg data-v-270fc2a9="" class="icon__svg">
                                 <use data-v-270fc2a9="" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--redo"></use>
                              </svg>
                           </div>
                        </div>
                     </div>
                     <div class="tt-txtarea markdown-formatter">
                        <div type="text" contenteditable="true" tabindex="0" class="ProseMirror" id="content">
                           <p>Escriba aquí...</p>
                        </div>
                     </div>
                  </div>
                  <div class="input-help">
                     <svg viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true">
                        <path fill="#ffffff" fill-rule="evenodd" d="M14.85 3H1.15C.52 3 0 3.52 0 4.15v7.69C0 12.48.52 13 1.15 13h13.69c.64 0 1.15-.52 1.15-1.15v-7.7C16 3.52 15.48 3 14.85 3zM9 11H7V8L5.5 9.92 4 8v3H2V5h2l1.5 2L7 5h2v6zm2.99.5L9.5 8H11V5h2v3h1.5l-2.51 3.5z"></path>
                     </svg>
                     <b>Se admite el formato de texto Markdown</b>
                  </div>
                  <input type="submit" id="btnSubmit" value="Publicar respuesta" onclick="addCommentForum(<?php echo $forum['id']; ?>)">
               </div>
            </div>
            <?php } ?>
         </div>
      </div>
      <?php } ?>
      <?php $TplClass->AddTemplate("others", "footer"); ?>
   </div>
</div>