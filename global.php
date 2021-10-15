<?php
    error_reporting(0);
    
    session_set_cookie_params(94608000);
    ini_set('session.gc_maxlifetime', 94608000);
    
    session_start();
        
    define('SEPARATOR', DIRECTORY_SEPARATOR);
    define('DIR', __DIR__);
    define('WEB', true);
    define('VCD', true);
    define('CHARSET', 'UTF-8');
    header('Content-type: text/html; charset=' . CHARSET);
    
    include('vcd-config/class.core.php');
    
    //ERROR
    $TplClass->SetParam('error', '');
    
    //HOTELNAME
    $TplClass->SetParam('HOTELNAME', $Functions->WebSettings('hotelname'));
    $TplClass->SetParam('SHORTNAME', $Functions->WebSettings('hotelname'));
    
    //LINKS SOCIAL
    $TplClass->SetParam('TWITTER', TWITTER);
    $TplClass->SetParam('LINKTWITTER', LINKTWITTER);
    $TplClass->SetParam('FACE', FACE);
    $TplClass->SetParam('IDFACE', IDFACE);
    
    //LINKS HOTEL
    $TplClass->SetParam('AVATARIMAGE', AVATARIMAGE);
    $TplClass->SetParam('PATH', PATH);
    $TplClass->SetParam('PATHCLIENT', PATHCLIENT);
    $TplClass->SetParam('HK', HK);
    
    //FOOTER
    $TplClass->SetParam('FECHAF', '2014-2021');
    $TplClass->SetParam('FOOTER', '© Todos los derechos reservados a sus respectivos autores.');
    $TplClass->SetParam('FOOTER2', 'VCD CMS v12 by FORBI');

    //USERS
    if($Functions->Me('id') > 0){
        $TplClass->SetParam('USERNAME',  $Functions->Me('username'));
        $TplClass->SetParam('MYID', $Functions->Me('id'));
        $TplClass->SetParam('RANK', $Functions->Me('rank'));
        $TplClass->SetParam('REGTIME', $Functions->Me('account_created'));
        $TplClass->SetParam('LOOK', $Functions->Me('look'));
        $TplClass->SetParam('CRE', $Functions->Me('credits'));
        $TplClass->SetParam('DUC', $Functions->Me('pixels'));
        $TplClass->SetParam('DIAM', $Functions->Me('points'));
        $TplClass->SetParam('MOOD_D', $Functions->UserCustom('night_mode' , $Functions->Me('id')));
     }else{
        $TplClass->SetParam('USERNAME', 'Invitado');
        $TplClass->SetParam('MYID', '0');
        $TplClass->SetParam('RANK', '1');
        $TplClass->SetParam('REGTIME', '0');
        $TplClass->SetParam('LOOK', 'ch-3015-110.ha-1002-110.hd-190-28.lg-281-110.hr-831-61');
        $TplClass->SetParam('CRE', '100000');
        $TplClass->SetParam('DUC', '10000');
        $TplClass->SetParam('DIAM', '5000');
    }

    //HK
    if ($Functions->Me('rank') >= MINRANK) {
        $TplClass->SetParam('HKLINK', '<li><span>STAFF</span><ul class="sub"><li><a href="'.HK.'/index.php" target="_blank">HK</a></li></ul></li>');
        $HKLINK = '<li><span>STAFF</span><ul class="sub"><li><a href="'.HK.'/index.php" target="_blank">HK</a></li></ul></li>';
    } else {
        $TplClass->SetParam('HKLINK', '');
        $HKLINK = '';
    }

    if ($_SERVER["REQUEST_URI"] !== "/maintenance") {
        $Functions->CheckMaintenance("true");    
    }

    $TplClass->SetParam('USERSON', $Functions->GetOns());
    $TplClass->SetParam('USERREG', $Functions->GetCount('users'));
    
    $TplClass->SetParam('url', $_SERVER["REQUEST_URI"]);
    $url = $_SERVER["REQUEST_URI"];

    $TplClass->SetParam('rrx', $Functions->reloadxxx(5));

    $TplClass->SetParam('users', USERS_NAME_DB);
    $users = USERS_NAME_DB;

    date_default_timezone_set(timezone);
    setlocale(LC_TIME, timeLocation);
?>
