<?php
require_once '../../global.php';

    $id = $Functions->FilterText($_POST['id']);

    $rsb       = $db->query("SELECT * FROM cms_shop_badges WHERE id = '{$id}' ");
    $shopbagde = $rsb->fetch_array();

    $badCodes = explode(',', $shopbagde['code']);

    
    $amountFinal = $shopbagde['price'] - $Functions->Me('points');
    $available = $shopbagde['available'] - 1;

        if ( $Functions->Me('points') < $shopbagde['price'] ) {
            $json["reponse"] = 'error';
            $json["msg"] = 'Le falta '.$amountFinal.' Diamantes para comprar la placa';
            echo json_encode($json);
        } elseif ( $shopbagde['available'] == 0 ) {
            $json["reponse"] = 'error';
            $json["msg"] = 'La placa que intentas comprar, esta agotada';
            echo json_encode($json);



        } else if ( $shopbagde['type'] == '0' ) {
        $security = $db->query("SELECT * FROM users_badges WHERE user_id = '{$Functions->Me('id')}' AND badge_code = '{$shopbagde['code']}' ");
        $sec      = $security->fetch_array();

        if ( $security->num_rows > 0 ) {
            $json["reponse"] = 'error';
            $json["msg"] = 'Usted ya posee esta placa.';
            echo json_encode($json);
        } else {
            

            $dbQuery               = array();
            $dbQuery['user_id']    = $Functions->Me('id');
            $dbQuery['badge_code'] = $shopbagde['code'];
            $query                 = $db->insertInto('users_badges', $dbQuery);
            $db->query("UPDATE cms_shop_badges SET available = available - '1' WHERE id = '{$shopbagde['id']}'");
         //   $db->query("UPDATE $users SET points = points - '{$shopbagde['price']}' WHERE id = '{$Functions->Me('id')}'");

            $db->query("UPDATE users_currency SET amount = amount - '{$shopbagde['price']}'  WHERE user_id  = '{$Functions->Me('id')}' AND type = '5' ");




            $json["reponse"] = 'ok';
            $json["msg"] = 'Placa '.$shopbagde['code'].' comprada con éxito.';
            if ( $available > 0 ) {
                $json["available"] = $available.' restante';
            } else {
                $json["available"] = 'Stock agotado';
            }

            echo json_encode($json);
        }


        } else if ( $shopbagde['type'] == '1' ) {


            $json["reponse"] = 'ok';
            $json["msg"] = 'Paquete de placa comprada con éxito.';
            if ( $available > 0 ) {
                $json["available"] = $available.' restante';
            } else {
                $json["available"] = 'Stock agotado';
            }
            echo json_encode($json);

            $b1 = $db->query("SELECT * FROM users_badges WHERE user_id = '{$Functions->Me('id')}' AND badge_code = '{$badCodes[0]}' ");
            $b2 = $db->query("SELECT * FROM users_badges WHERE user_id = '{$Functions->Me('id')}' AND badge_code = '{$badCodes[1]}' ");
            $b3 = $db->query("SELECT * FROM users_badges WHERE user_id = '{$Functions->Me('id')}' AND badge_code = '{$badCodes[2]}' ");
            $b4 = $db->query("SELECT * FROM users_badges WHERE user_id = '{$Functions->Me('id')}' AND badge_code = '{$badCodes[3]}' ");
            $b5 = $db->query("SELECT * FROM users_badges WHERE user_id = '{$Functions->Me('id')}' AND badge_code = '{$badCodes[4]}' ");
            $b6 = $db->query("SELECT * FROM users_badges WHERE user_id = '{$Functions->Me('id')}' AND badge_code = '{$badCodes[5]}' ");


    $com = substr_count($shopbagde['code'],",");

    if ( $com == '1' ) {
        //if ( !empty($badCodes[1]) ) {
          if ( $b1->num_rows == 0 ) {
          $dbQuery               = array();
          $dbQuery['user_id']    = $Functions->Me('id');
          $dbQuery['badge_code'] = $badCodes[0];
          $query                 = $db->insertInto('users_badges', $dbQuery);
          }
          if ( $b2->num_rows == 0 ) {
          $dbQuery               = array();
          $dbQuery['user_id']    = $Functions->Me('id');
          $dbQuery['badge_code'] = $badCodes[1];
          $query                 = $db->insertInto('users_badges', $dbQuery);
          }


    } else if ( $com == '2' ) {
         //} else if ( !empty($badCodes[2]) ) {
          if ( $b1->num_rows == 0 ) {
          $dbQuery               = array();
          $dbQuery['user_id']    = $Functions->Me('id');
          $dbQuery['badge_code'] = $badCodes[0];
          $query                 = $db->insertInto('users_badges', $dbQuery);
          }
          if ( $b2->num_rows == 0 ) {
          $dbQuery               = array();
          $dbQuery['user_id']    = $Functions->Me('id');
          $dbQuery['badge_code'] = $badCodes[1];
          $query                 = $db->insertInto('users_badges', $dbQuery);
          }
          if ( $b3->num_rows == 0 ) {
          $dbQuery               = array();
          $dbQuery['user_id']    = $Functions->Me('id');
          $dbQuery['badge_code'] = $badCodes[2];
          $query                 = $db->insertInto('users_badges', $dbQuery);
          }


    } else if ( $com == '3' ) {
         //} else if ( !empty($badCodes[3]) ) {
          if ( $b1->num_rows == 0 ) {
          $dbQuery               = array();
          $dbQuery['user_id']    = $Functions->Me('id');
          $dbQuery['badge_code'] = $badCodes[0];
          $query                 = $db->insertInto('users_badges', $dbQuery);
          }
          if ( $b2->num_rows == 0 ) {
          $dbQuery               = array();
          $dbQuery['user_id']    = $Functions->Me('id');
          $dbQuery['badge_code'] = $badCodes[1];
          $query                 = $db->insertInto('users_badges', $dbQuery);
          }
          if ( $b3->num_rows == 0 ) {
          $dbQuery               = array();
          $dbQuery['user_id']    = $Functions->Me('id');
          $dbQuery['badge_code'] = $badCodes[2];
          $query                 = $db->insertInto('users_badges', $dbQuery);
          }
          if ( $b4->num_rows == 0 ) {
          $dbQuery               = array();
          $dbQuery['user_id']    = $Functions->Me('id');
          $dbQuery['badge_code'] = $badCodes[3];
          $query                 = $db->insertInto('users_badges', $dbQuery);
          }


    } else if ( $com == '4' ) {
         //} else if ( !empty($badCodes[4]) ) {
          if ( $b1->num_rows == 0 ) {
          $dbQuery               = array();
          $dbQuery['user_id']    = $Functions->Me('id');
          $dbQuery['badge_code'] = $badCodes[0];
          $query                 = $db->insertInto('users_badges', $dbQuery);
          }
          if ( $b2->num_rows == 0 ) {
          $dbQuery               = array();
          $dbQuery['user_id']    = $Functions->Me('id');
          $dbQuery['badge_code'] = $badCodes[1];
          $query                 = $db->insertInto('users_badges', $dbQuery);
          }
          if ( $b3->num_rows == 0 ) {
          $dbQuery               = array();
          $dbQuery['user_id']    = $Functions->Me('id');
          $dbQuery['badge_code'] = $badCodes[2];
          $query                 = $db->insertInto('users_badges', $dbQuery);
          }
          if ( $b4->num_rows == 0 ) {
          $dbQuery               = array();
          $dbQuery['user_id']    = $Functions->Me('id');
          $dbQuery['badge_code'] = $badCodes[3];
          $query                 = $db->insertInto('users_badges', $dbQuery);
          }
          if ( $b5->num_rows == 0 ) {
          $dbQuery               = array();
          $dbQuery['user_id']    = $Functions->Me('id');
          $dbQuery['badge_code'] = $badCodes[4];
          $query                 = $db->insertInto('users_badges', $dbQuery);
          }


    } else if ( $com == '5' ) {
         //} else if ( !empty($badCodes[5]) ) {
          if ( $b1->num_rows == 0 ) {
          $dbQuery               = array();
          $dbQuery['user_id']    = $Functions->Me('id');
          $dbQuery['badge_code'] = $badCodes[0];
          $query                 = $db->insertInto('users_badges', $dbQuery);
          }
          if ( $b2->num_rows == 0 ) {
          $dbQuery               = array();
          $dbQuery['user_id']    = $Functions->Me('id');
          $dbQuery['badge_code'] = $badCodes[1];
          $query                 = $db->insertInto('users_badges', $dbQuery);
          }
          if ( $b3->num_rows == 0 ) {
          $dbQuery               = array();
          $dbQuery['user_id']    = $Functions->Me('id');
          $dbQuery['badge_code'] = $badCodes[2];
          $query                 = $db->insertInto('users_badges', $dbQuery);
          }
          if ( $b4->num_rows == 0 ) {
          $dbQuery               = array();
          $dbQuery['user_id']    = $Functions->Me('id');
          $dbQuery['badge_code'] = $badCodes[3];
          $query                 = $db->insertInto('users_badges', $dbQuery);
          }
          if ( $b5->num_rows == 0 ) {
          $dbQuery               = array();
          $dbQuery['user_id']    = $Functions->Me('id');
          $dbQuery['badge_code'] = $badCodes[4];
          $query                 = $db->insertInto('users_badges', $dbQuery);
          }
          if ( $b6->num_rows == 0 ) {
          $dbQuery               = array();
          $dbQuery['user_id']    = $Functions->Me('id');
          $dbQuery['badge_code'] = $badCodes[5];
          $query                 = $db->insertInto('users_badges', $dbQuery);
          }

    }

         $db->query("UPDATE cms_shop_badges SET available = available - '1' WHERE id = '{$shopbagde['id']}'");
         $db->query("UPDATE $users SET points = points - '{$shopbagde['price']}' WHERE id = '{$Functions->Me('id')}'");




        }





?>
