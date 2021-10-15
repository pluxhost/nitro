<?php
ob_start();
require_once '../../global.php';
ob_end_flush();

if ($_POST) {
    $type = $Functions->FilterText($_POST['type']);
    $userid = $Functions->FilterText($_POST['userid']);
    $postid = $Functions->FilterText($_POST['postid']);
    $content = $Functions->FilterText($_POST['content']);

    $result = $db->query("SELECT * FROM cms_timeline WHERE user_id = '" . $Functions->User('id') . "'");
    $info   = $result->fetch_array();

    $r = $db->query("SELECT * FROM cms_timeline WHERE user_id = '" . $Functions->User('id') . "' ORDER BY post_id DESC");
    $i = $r->fetch_array();

    if ($content == '') {
        $json["reponse"] = 'erreur';
        $json["message"] = 'Tienes que escribir algo.';
        echo json_encode($json);
    } elseif ($info['time'] >= time() - 60) {
        $json["reponse"] = 'erreur';
        $json["message"] = 'Debes esperar 1 min. para enviar otro tweet.';
        echo json_encode($json);
    } else {
        $json["reponse"]             = 'ok';

         $rreply = $db->query("SELECT * FROM cms_timeline WHERE post_id = '".$i['reply_id']."'");
                           $reply = $rreply->fetch_array();
                           $rreplyu = $db->query("SELECT * FROM $users WHERE id = '".$reply['user_id']."'");
                           $replyu = $rreplyu->fetch_array();

                           if ($type == "replying") {
                             $replytt = '<p style="color: #90949c;">
               Respondido</p> ';
                           }

        $json["post"] = '<div id="head24aaa"></div><div class="powerclub_box2">
            <ul class="mb0" id="pp9">
               <li style="width: 100%;">
                  <div id="pp7" style="
                     background: url('.AVATARIMAGE . $Functions->User("look").'&size=b&gesture=std) no-repeat;
                     background-color: '.$Functions->UserCustom('colour', $Functions->User("id")).';
                     background-position: center -18px, center right;
                     "></div>
                  <span style="font-weight: 600;font-size: 18px;">
                  <a  id="pp0" href="/profile/'.$Functions->User("username").'">'.$Functions->User("username").'</a>  </span>  · <span style="color: #90949c;;">Justo Ahora · </span><i title="Público" class="fa fa-globe" aria-hidden="true" style="font-size: 12px;color: #90949c;"></i>
                  <i class="fa fa-ellipsis-h" id="pp8"></i>
                  <div class="mb16" id="pp11">
                  '.$replytt.'
            '.str_replace(array("\r\n", "\n\r", "\r", "\n"), "<br>", $Functions->FilterTextTimeline($content)).'
            </div>
               </li>
            </ul>
            <ul style="margin-top: -15px">
               <li>
                  <div id="commentp">
                     <i class="zoom fal fa-comment"></i>
                     <span id="texttt">0</span>
                  </div>
                  <div onclick="tweetAction('.$i['id'].',"retweet","fil");" id="retweetp">
                     <i class="zoom fal fa-retweet"></i>
                     <span id="texttt">0</span>
                  </div>
                  <div onclick="tweetAction('.$i['id'].',"fav","fil");" id="heartp">
                     <i class="fal fa-heart"></i>
                     <span id="texttt">0</span>
                  </div>
                  <div id="sharep">
                     <i class="zoom far fa-share-square"></i>
                  </div>
               </li>
            </ul>
         </div>';
        echo json_encode($json);

        $dbQuery             = array();
        $dbQuery['user_id']  = $Functions->User('id');
        $dbQuery['content']  = $content;
        $dbQuery['type']     = $type;
        $dbQuery['userp_id'] = $userid;
        $dbQuery['time']     = time();
        if ($type == 'replying') { $dbQuery['reply_id'] = $postid; }
        $query               = $db->insertInto('cms_timeline', $dbQuery);

$c = $content;
$cc = explode('@',$c);

$foo = '@'.$cc[1];

$ru = $db->query("SELECT * FROM $users WHERE username = '" . $cc[1] . "'");
$uinfo = $ru->fetch_array();

if (strpos($foo, '@'.$cc[1]) !== false) {
  if ($ru->num_rows > 0) {
    $dbQuery             = array();
        $dbQuery['user_id']  = $Functions->User('id');
        $dbQuery['user_two_id']  = $uinfo['id'];
        $dbQuery['category']     = 'mention';
        $dbQuery['content'] = $content;
        $dbQuery['time']     = time();
        $query               = $db->insertInto('cms_notifications', $dbQuery);
}
}



    }
}
?>