<?php
ob_start();
require_once '../../../global.php';
$Functions->Logged("true");
$Functions->LoggedHk(MAXRANK);
ob_end_flush();

if ($_POST) {
    //GENERAL
    $Hotelname     = $Functions->FilterText($_POST['Hotelname']);
    $RegUserIP = $Functions->FilterText($_POST['RegUserIP']);
    $mant   = $Functions->FilterTextF($_POST['mant']);
    $reg      = $Functions->FilterText($_POST['reg']);
    //CLIENT
    $host        = $Functions->FilterText($_POST['host']);
    $port       = $Functions->FilterText($_POST['port']);
    $productdata        = $Functions->FilterText($_POST['productdata']);
    $furnidata        = $Functions->FilterText($_POST['furnidata']);
    $figuremap        = $Functions->FilterText($_POST['figuremap']);
    $externaltexts        = $Functions->FilterText($_POST['externaltexts']);
    $externalvariables        = $Functions->FilterText($_POST['externalvariables']);
    $externalTextsOverride        = $Functions->FilterText($_POST['externalTextsOverride']);
    $externalVariablesOverride        = $Functions->FilterText($_POST['externalVariablesOverride']);
    $figuredata        = $Functions->FilterText($_POST['figuredata']);
    $flashclienturl        = $Functions->FilterText($_POST['flashclienturl']);
    $habboswf        = $Functions->FilterText($_POST['habboswf']);
    $camera        = $Functions->FilterText($_POST['camera']);

    if( empty($Hotelname) || empty($host) || empty($port) || empty($productdata) || empty($furnidata) || empty($figuremap) || empty($externaltexts) || empty($externalvariables) || empty($externalTextsOverride) || empty($externalVariablesOverride) || empty($figuredata) || empty($flashclienturl) || empty($habboswf)  ){

        $json["reponse"] = 'error';
        $json["message"] = '<div class="alert alert-danger" role="alert">
                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                           <span aria-hidden="true"> ×</span>
                        </button>
                        <strong>¡Error! </strong>Tienes que completar todos los campos.
                     </div>';
            echo json_encode($json);

            }elseif ($Functions->Me('rank') >= MAXRANK) {
       
            $json["reponse"] = 'ok';
            $json["message"] = '<div class="alert alert-success" role="alert">
                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                           <span aria-hidden="true"> ×</span>
                        </button>
                        <strong>¡Actualizado! </strong>La configuración del Hotel se ha actualizado exitosamente.
                     </div>';
            echo json_encode($json);
        
            $dbQuery             = array();
            $dbQuery['username'] = $Functions->Me('username');
            $dbQuery['message']  = 'Ha editado la configuración del Hotel.';
            $dbQuery['rank']     = $Functions->Me('rank');
            $dbQuery['action']   = 'Ha editado la configuración del Hotel.';
            $dbQuery['userid']   = $Functions->Me('id');
            $dbQuery['time']     = time();
            $query               = $db->insertInto('cms_stafflogs', $dbQuery);

            $db->query("UPDATE cms_settings SET reg_ip_users = '" . $RegUserIP . "', mantenimiento = '" . $mant . "', registros = '" . $reg . "' WHERE id = 1 LIMIT 1");

            $db->query("UPDATE cms_settings SET hotelname = '" . $Hotelname . "', host = '" . $host . "', port = '" . $port . "', productdata = '" . $productdata . "', furnidata = '" . $furnidata . "', figuremap = '" . $figuremap . "', external_texts = '" . $externaltexts . "', external_variables = '" . $externalvariables . "', external_Texts_Override = '" . $externalTextsOverride . "', external_Variables_Override = '" . $externalVariablesOverride . "', figuredata = '" . $figuredata . "', flash_client_url = '" . $flashclienturl . "', habbo_swf = '" . $habboswf . "' WHERE id = 1 LIMIT 1");

        //    $db->query("UPDATE emulator_settings SET camera.url = '" . $cameraurl . "");

        //   $db->query("UPDATE `emulator_settings` SET `value` = '".$camera . "' WHERE `emulator_settings`.`key` = 'camera.url'");



    }else{

        $json["reponse"] = 'error';
        $json["message"] = '<div class="alert alert-danger" role="alert">
                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                           <span aria-hidden="true"> ×</span>
                        </button>
                        <strong>¡Error! </strong>Algo ha salido mal, por favor vuelva a intentarlo.
                     </div>';
            echo json_encode($json);

            }


}
?>