<?php
class Functions
{

    //MANTENIMIENTO
    public function CheckMaintenance($a){
       global $db;
        $result = $db->query("SELECT * FROM cms_settings WHERE id = 1 LIMIT 1");
        while($mant = $result->fetch_array()){
                if($mant['mantenimiento'] == 1 AND $this->Me('rank') <= MINRANK){
                     header("LOCATION: ". PATH ."/maintenance");
                }
            }
        }
    //END MANTENIMIENTO


    //SEND EMAIL
    public function SendEmail($etitle, $emsg, $email)
    {
        require 'vcd-config/PHPmailer/PHPMailerAutoload.php';
        $mail = new PHPMailer(); // create a new object
        $mail->IsSMTP(); // send via SMTP
        $mail->SMTPDebug = 2; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'SSL'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = 'privauk-15.privatednsorg.com';
        $mail->Port = 26;
        $mail->IsHTML(true);
        $mail->Username = 'support@habboplux.online';
        $mail->Password = 'Password159159';
        $mail->setFrom('support@habboplux.online', $this->WebSettings('hotelname'));
        $mail->Subject = $etitle;
        $mail->Body = $emsg;
        $mail->AddAddress($email);
        $mail->Send();
    }
    //END SEND EMAIL


 //YO
 public function Me($text)
 {
     global $db;
     $userquery = $db->query("SELECT * FROM users WHERE username = '{$_SESSION['username']}' AND password = '{$_SESSION['password']}'");
     $user      = $userquery->fetch_array();
     
     if ($text == 'pixels') {
     $userc = $db->query("SELECT * FROM users_currency WHERE user_id = '{$user['id']}' AND type = '0'");
     $userscurrency      = $userc->fetch_array();
     return $userscurrency['amount'];
     } else if ($text == 'points') {
     $userc = $db->query("SELECT * FROM users_currency WHERE user_id = '{$user['id']}' AND type = '5'");
     $userscurrency      = $userc->fetch_array();
     return $userscurrency['amount'];
     } else {
     return $user[$text];
     }
 }
 //END YO


   //USER
   public function User($text, $id)
   {
       global $db;
       $userquery = $db->query("SELECT * FROM users WHERE id = '{$id}'");
       $user = $userquery->fetch_array();

       if ($text == 'pixels') {
       $userc = $db->query("SELECT * FROM users_currency WHERE user_id = '{$user['id']}' AND type = '0'");
       $userscurrency=$userc->fetch_array();
       return $userscurrency['amount'];
       } else if ($text == 'points') {
       $userc = $db->query("SELECT * FROM users_currency WHERE user_id = '{$user['id']}' AND type = '5'");
       $userscurrency=$userc->fetch_array();
       return $userscurrency['amount'];
       } else {
       return $user[$text];
       }
   }
   //END USER
	




    //USER SETTINGS
    public function UserSettings($text, $id)
    {
        global $db;
        $userquery = $db->query("SELECT * FROM users_settings WHERE user_id = '{$id}'");
        $user      = $userquery->fetch_array();
        return $user[$text];
    }
    //END USER SETTINGS


    //USER CUSTOM
    public function UserCustom($text, $id)
    {
        global $db;
        $userquery = $db->query("SELECT * FROM cms_users WHERE id = '{$id}'");
        $user      = $userquery->fetch_array();
        return $user[$text];
    }
    //END USER Custom

    //MONTH
    public function FMonth($month)
    {
        if ($month == 1) { 
            $monthn = 'Enero';
        }elseif ($month == 2) { 
            $monthn = 'Febrero';
        }elseif ($month == 3) { 
            $monthn = 'Marzo';
        }elseif ($month == 4) { 
            $monthn = 'Abril';
        }elseif ($month == 5) { 
            $monthn = 'Mayo';
        }elseif ($month == 6) { 
            $monthn = 'Junio';
        }elseif ($month == 7) { 
            $monthn = 'Julio';
        }elseif ($month == 8) { 
            $monthn = 'Agosto';
        }elseif ($month == 9) { 
            $monthn = 'Septiembre';
        }elseif ($month == 10) { 
            $monthn = 'Octubre';
        }elseif ($month == 11) { 
            $monthn = 'Noviembre';
        }elseif ($month == 12) { 
            $monthn = 'Diciembre';
        }
        return $monthn;
    }
    //END MONTH


    //HOTEL CONFIG
    public function WebSettings($text)
    {
        global $db;
        $squery = $db->query("SELECT * FROM cms_settings WHERE id = 1 LIMIT 1");
        $websettings      = $squery->fetch_array();
        return $websettings[$text];
    }

    public function CameraSettings()
    {
        global $db;
        $squery = $db->query("SELECT * FROM emulator_settings WHERE `KEY` = 'camera.url'");
        $CameraSettings      = $squery->fetch_array();
        return $CameraSettings['value'];
    }


    //END HOTEL CONFIG



    //CHEQUEAR LOGIN EN LA HK
		public function LoggedHk($rank){
			global $db;
			if($this->Me('rank') >= $rank){
			}else{
                if($this->Me('rank') >= MINRANK){
                	header("LOCATION: ". HK);
                	}else{
                	header("LOCATION: ". PATH);
                   }
				exit;
			}
		}
    //END CHEQUEAR LOGIN EN LA HK


    //ACORTADOR DE CIFRAS 
    function number_format_short($n, $precision = 1)
    {
        if ($n < 900) {
            // 0 - 900
            $n_format = number_format($n, $precision);
            $suffix   = '';
        } else if ($n < 900000) {
            // 0.9k-850k
            $n_format = number_format($n / 1000, $precision);
            $suffix   = 'K';
        } else if ($n < 900000000) {
            // 0.9m-850m
            $n_format = number_format($n / 1000000, $precision);
            $suffix   = 'M';
        } else if ($n < 900000000000) {
            // 0.9b-850b
            $n_format = number_format($n / 1000000000, $precision);
            $suffix   = 'B';
        } else {
            // 0.9t+
            $n_format = number_format($n / 1000000000000, $precision);
            $suffix   = 'T';
        }
        if ($precision > 0) {
            $dotzero  = '.' . str_repeat('0', $precision);
            $n_format = str_replace($dotzero, '', $n_format);
        }
        return $n_format . $suffix;
    } //END ACORTADOR DE CIFRAS 


    //GENERAR FECHA (NORMAL)
    public function GetLast($a)
    {
        if (!empty($a) || !$a == '') {
            if (is_numeric($a)) {
                $date       = $a;
                $date_now   = time();
                $difference = $date_now - $date;
                if ($difference <= '59') {
                    $echo = 'Justo ahora';
                } elseif ($difference <= '3599' && $difference >= '60') {
                    $minutos = date('i', $difference);
                    if ($minutos[0] == 0) {
                        $minutos = $minutos[1];
                    }
                    if ($minutos == 1) {
                        $minutos_str = 'minuto';
                    } else {
                        $minutos_str = 'minutos';
                    }
                    $echo = 'Hace ' . $minutos . ' ' . $minutos_str; //Minutos
                } elseif ($difference <= '82799' && $difference >= '3600') {
                    $horas = date('G', $difference);
                    if ($horas == 1) {
                        $horas_str = 'hora';
                    } else {
                        $horas_str = 'horas';
                    }
                    $echo = 'Hace ' . $horas . ' ' . $horas_str; //Minutos
                } elseif ($difference <= '518399' && $difference >= '82800') {
                    $dias = date('j', $difference);
                    if ($dias == 1) {
                        $dias_str = 'd&iacute;a';
                    } else {
                        $dias_str = 'd&iacute;as';
                    }
                    $echo = 'Hace ' . $dias . ' ' . $dias_str; //Minutos
                } elseif ($difference <= '2678399' && $difference >= '518400') {
                    $semana = floor(date('j', $difference) / 7) . '<!-- WTF -->';
                    if ($semana == 1) {
                        $semana_str = 'semana';
                    } else {
                        $semana_str = 'semanas';
                    }
                    $echo = 'Hace ' . floor($semana) . ' ' . $semana_str; //Minutos
                } else {
                    $echo = 'Hace ' . date('n', $difference) . ' mes(es)';
                }
                return $echo;
            } else {
                return $a;
            }
        } else {
            return 'A&uacute;n no te has conectado';
        }
    }
    //END GENERAR FECHA (NORMAL)


    //GENERAR FECHA (NORMAL)
    public function GetLast2($a)
    {
        if (!empty($a) || !$a == '') {
            if (is_numeric($a)) {
                $date       = $a;
                $date_now   = time();
                $difference = $date_now - $date;
                if ($difference <= '59') {
                    $echo = 'justo ahora';
                } elseif ($difference <= '3599' && $difference >= '60') {
                    $minutos = date('i', $difference);
                    if ($minutos[0] == 0) {
                        $minutos = $minutos[1];
                    }
                    if ($minutos == 1) {
                        $minutos_str = 'minuto';
                    } else {
                        $minutos_str = 'minutos';
                    }
                    $echo = 'hace ' . $minutos . ' ' . $minutos_str; //Minutos
                } elseif ($difference <= '82799' && $difference >= '3600') {
                    $horas = date('G', $difference);
                    if ($horas == 1) {
                        $horas_str = 'hora';
                    } else {
                        $horas_str = 'horas';
                    }
                    $echo = 'hace ' . $horas . ' ' . $horas_str; //Minutos
                } elseif ($difference <= '518399' && $difference >= '82800') {
                    $dias = date('j', $difference);
                    if ($dias == 1) {
                        $dias_str = 'd&iacute;a';
                    } else {
                        $dias_str = 'd&iacute;as';
                    }
                    $echo = 'hace ' . $dias . ' ' . $dias_str; //Minutos
                } elseif ($difference <= '2678399' && $difference >= '518400') {
                    $semana = floor(date('j', $difference) / 7) . '<!-- WTF -->';
                    if ($semana == 1) {
                        $semana_str = 'semana';
                    } else {
                        $semana_str = 'semanas';
                    }
                    $echo = 'hace ' . floor($semana) . ' ' . $semana_str; //Minutos
                } else {
                    $echo = 'hace ' . date('n', $difference) . ' mes(es)';
                }
                return $echo;
            } else {
                return $a;
            }
        } else {
            return 'A&uacute;n no te has conectado';
        }
    }
    //END GENERAR FECHA (NORMAL)


    //GENERAR FECHA (FACEBOOK)
    public function GetLastFace($a)
    {
        if (!empty($a) || !$a == '') {
            if (is_numeric($a)) {
                $date       = $a;
                $date_now   = time();
                $difference = $date_now - $date;
                if ($difference <= '59') {
                    $echo = '1s';
                } elseif ($difference <= '3599' && $difference >= '60') {
                    $minutos = date('i', $difference);
                    if ($minutos[0] == 0) {
                        $minutos = $minutos[1];
                    }
                    if ($minutos == 1) {
                        $minutos_str = 'm';
                    } else {
                        $minutos_str = 'm';
                    }
                    $echo = $minutos . $minutos_str; //Minutos
                } elseif ($difference <= '82799' && $difference >= '3600') {
                    $horas = date('G', $difference);
                    if ($horas == 1) {
                        $horas_str = 'h';
                    } else {
                        $horas_str = 'h';
                    }
                    $echo = $horas . $horas_str; //Minutos
                } elseif ($difference <= '518399' && $difference >= '82800') {
                    $dias = date('j', $difference);
                    if ($dias == 1) {
                        $dias_str = 'd';
                    } else {
                        $dias_str = 'd';
                    }
                    $echo = $dias . $dias_str; //Minutos
                } elseif ($difference <= '2678399' && $difference >= '518400') {
                    $semana = floor(date('j', $difference) / 7) . '<!-- WTF -->';
                    if ($semana == 1) {
                        $semana_str = 's';
                    } else {
                        $semana_str = 's';
                    }
                    $echo = floor($semana) . $semana_str; //Minutos
                } else {
                    $echo = date('n', $difference) . 'm';
                }
                return $echo;
            } else {
                return $a;
            }
        } else {
            return 'A&uacute;n no te has conectado';
        }
    }
    //END GENERAR FECHA (FACEBOOK)


    //GENERAR NOMBRE
    public function Get($a)
    {
        global $db;
        $result = $db->query("SELECT {$a} FROM users WHERE username = '" . $this->FilterText($_SESSION['username']) . "' LIMIT 1");
        $data   = $result->fetch_array();
        return $data[$a];
    }
    //END GENERAR NOMBRE


    //CANTIDAD DE USUARIOS
    public function GetCount($a)
    {
        global $db;
        $userquery = $db->query("SELECT * FROM {$a}");
        $cnt       = $userquery->num_rows;
        return $cnt;
    }
    //END CANTIDAD DE USUARIOS


    //CANTIDAD DE ONS 
    public function GetOns()
    {
        global $db;
        $ad = $db->query("SELECT * FROM users WHERE online = '1'");
		$add = $ad->num_rows;
		//if($add >= 10){$add = $add;}else{$add = "Muchos";}
		return $add;
    }
    //END CANTIDAD DE ONS 


    //COMPROBAR SI ESTAS LOGEADO
    public function Logged($a)
    {
        $b = $this->CheckLogged($_SESSION['username'], $_SESSION['password']);
        if ($a == "allow") {
            if ($b) {
                $_SESSION['IS_LOGGED'] = true;
            } else {
                $_SESSION['IS_LOGGED'] = false;
            }
        } elseif ($a == "false" AND $b) {
            $_SESSION['IS_LOGGED'] = true;
            header("LOCATION: " . PATH . "/home");
            exit;
        } elseif ($a == "true" AND !$b) {
            header("LOCATION: " . PATH . "/index");
            exit;
        } elseif ($b) {
            $_SESSION['IS_LOGGED'] = true;
        }
    }
    //END COMPROBAR SI ESTAS LOGEADO


    //FILTRO EN EL TEXTO
    public function FilterText($a)
    {
        $a = stripslashes($a);
        $a = trim($a);
        $a = str_replace('"', '&#34;', $a);
        $a = str_replace("'", "&#39;", $a);
        $a = str_replace("<script", "", $a);
        $a = str_replace("(", "", $a);
        $a = str_replace(")", "", $a);

        $a = str_replace("{hotelname}", $this->WebSettings('hotelname'), $a);
        return $a;
    }
    //END FILTRO EN EL TEXTO


    //FILTRO EN EL PASS
    public function FilterPASS($a)
    {
        $a = str_replace('"', '&#34;', $a);
        $a = str_replace("'", "&#39;", $a);
        $a = str_replace("<script", "", $a);
        $a = str_replace("<", "", $a);
        $a = str_replace(">", "", $a);
        $a = str_replace("(", "", $a);
        $a = str_replace(")", "", $a);
        return $a;
    }
    //END FILTRO EN EL PASS


    //FILTRO EN EL FORO
    public function FilterTextF($a)
    {
        $a = trim($a);
        $a = str_replace('"', '', $a);
        $a = str_replace("'", "", $a);
        $a = str_replace("<script", "", $a);
        $a = str_replace("(", "", $a);
        $a = str_replace(")", "", $a);

        $a = str_replace(":addict:", '<img src="'.FILES.'/assets/img/emojis/addict.png">', $a);
        $a = str_replace(":angry:", '<img src="'.FILES.'/assets/img/emojis/angry.png">', $a);
        $a = str_replace(":blush:", '<img src="'.FILES.'/assets/img/emojis/blush.png">', $a);
        $a = str_replace(":broken_heart:", '<img src="'.FILES.'/assets/img/emojis/broken_heart.png">', $a);
        $a = str_replace(":clown:", '<img src="'.FILES.'/assets/img/emojis/clown.png">', $a);
        $a = str_replace(":cry:", '<img src="'.FILES.'/assets/img/emojis/cry.png">', $a);
        $a = str_replace(":cute:", '<img src="'.FILES.'/assets/img/emojis/cute.png">', $a);
        $a = str_replace(":drool:", '<img src="'.FILES.'/assets/img/emojis/drool.png">', $a);
        $a = str_replace(":fearful:", '<img src="'.FILES.'/assets/img/emojis/fearful.png">', $a);
        $a = str_replace(":happy:", '<img src="'.FILES.'/assets/img/emojis/happy.png">', $a);
        $a = str_replace(":heart:", '<img src="'.FILES.'/assets/img/emojis/heart.png">', $a);
        $a = str_replace(":inlove:", '<img src="'.FILES.'/assets/img/emojis/in_love.png">', $a);
        $a = str_replace(":innocent:", '<img src="'.FILES.'/assets/img/emojis/innocent.png">', $a);
        $a = str_replace(":joy:", '<img src="'.FILES.'/assets/img/emojis/joy.png">', $a);
        $a = str_replace(":loved:", '<img src="'.FILES.'/assets/img/emojis/loved.png">', $a);
        $a = str_replace(":mad:", '<img src="'.FILES.'/assets/img/emojis/mad.png">', $a);
        $a = str_replace(":mouth_closed:", '<img src="'.FILES.'/assets/img/emojis/mouth_closed.png">', $a);
        $a = str_replace(":neutral:", '<img src="'.FILES.'/assets/img/emojis/neutral.png">', $a);
        $a = str_replace(":shocked:", '<img src="'.FILES.'/assets/img/emojis/shocked.png">', $a);
        $a = str_replace(":smiling:", '<img src="'.FILES.'/assets/img/emojis/smiling.png">', $a);
        $a = str_replace(":sob:", '<img src="'.FILES.'/assets/img/emojis/sob.png">', $a);
        $a = str_replace(":sunglasses:", '<img src="'.FILES.'/assets/img/emojis/sunglasses.png">', $a);
        $a = str_replace(":suspect:", '<img src="'.FILES.'/assets/img/emojis/suspect.png">', $a);
        $a = str_replace(":tongue_out:", '<img src="'.FILES.'/assets/img/emojis/tongue_out.png">', $a);
        $a = str_replace(":twisted:", '<img src="'.FILES.'/assets/img/emojis/twisted.png">', $a);
        $a = str_replace(":wink:", '<img src="'.FILES.'/assets/img/emojis/wink.png">', $a);
        return $a;
    }
    //END FILTRO EN EL FORO


    //FILTRO EN EL TEXTO2
    public function FilterText2($a)
    {
        $a = trim($a);
        $a = str_replace('"', '&#34;', $a);
        $a = str_replace("'", "&#39;", $a);
        $a = str_replace("<script", "", $a);
        return $a;
    }
    //END FILTRO EN EL TEXTO2


    //FILTRO de link
    public function FilterTextLink($a)
    {
        $a = stripslashes(htmlspecialchars($a));
        $a = trim($a);
        $a = str_replace('"', '&#34;', $a);
        $a = str_replace("'", "&#39;", $a);
        $a = str_replace("<script", "", $a);
        $a = str_replace(" ", "-", $a);
        $a = str_replace("[", "(", $a);
        $a = str_replace("]", ")", $a);
        $a = str_replace("á", "a", $a);
        $a = str_replace("é", "e", $a);
        $a = str_replace("í", "i", $a);
        $a = str_replace("ó", "o", $a);
        $a = str_replace("ú", "u", $a);

        $a = str_replace("&aacute;", "a", $a);
        $a = str_replace("&eacute;", "e", $a);
        $a = str_replace("&iacute;", "i", $a);
        $a = str_replace("&oacute;", "o", $a);
        $a = str_replace("&uacute;", "u", $a);

        $a = str_replace("!", "", $a);
        $a = str_replace("¡", "", $a);
        $a = str_replace("?", "", $a);
        $a = str_replace("¿", "", $a);
        $a = str_replace("/", "", $a);
        $a = str_replace(".", "", $a);
        $a = str_replace(",", "", $a);
        $a = str_replace("ñ", "n", $a);
        $a = str_replace($a, strtolower($a), $a);
        return $a;
    }
    //END FILTRO de link


    //FILTRO Timeline
    public function FilterTextTimeline($text)
    {
        preg_match_all("/[@]+([A-Za-z0-9-_]+)/", $text, $users);
        $mentions = $users[1];
        foreach ($mentions as $key => $user) {
            if (!empty($user)) {
                $find    = '@' . $user;
                $replace = '<a id="pp0" place="' . $user . '" href="profile/' . $user . '"><b>@' . $user . '</b></a> ';
                $text    = str_replace($find, $replace, $text);
                $text    = trim($text);
                $text    = str_replace('"', '', $text);
                $text    = str_replace("'", "", $text);
                $text    = str_replace("<script", "", $text);
                $text    = str_replace("(", "", $text);
                $text    = str_replace(")", "", $text);
                $text    = str_replace("\r", "<br>", $text);
                $text    = str_replace("\n", "<br>", $text);
            }
        }
        return $text;
    }
    //END FILTRO Timeline



    public function explodeX($delimiters, $string)
    {
        $ready  = str_replace($delimiters, $delimiters[0], $string);
        $launch = explode($delimiters[0], $ready);
        return $launch;
    }


    //LOGIN AND REGISTER
    public function Hash($b)
    {
        // $a = username || $b = password
        $c = md5($b);
        $c = hash('gost', $c);
        $c = hash('whirlpool', $c);
        $c = hash('sha512', $c);
        return $c;
    }
    //LOGIN AND REGISTER


    public function Encriptado($a, $b)
    {
        $c = sha1(strtolower($a) . md5($b));
        $c = hash('gost', $c);
        $c = hash('whirlpool', $c);
        $c = hash('sha512', $c);
        return $c;
    }


    //CHEQUEAR USUARIO AL HACER EL LOGIN
    public function CheckLogged($a, $b)
    {
        if (!empty($a) AND !empty($b)) {
            $banned = $this->CheckBanned($_SESSION['username'], USER_IP);
            if ($banned) {
                $_SESSION['LOGIN_ERROR'] = $banned;
                $bu                      = $_SESSION['username'];
                unset($_SESSION['username']);
                unset($_SESSION['password']);
                $_SESSION['ERROR_RETURN'] = "¡Su cuenta ha sido baneada!. Si cree que esto es un error contáctanos en Soporte@HabboPlux.com";
                header("LOCATION: " . PATH . "/?username=" . $bu . "&rememberme=false&focus=login-username");
                exit;
            } else {
                global $db;
                $Checked = $db->query("SELECT null FROM users WHERE username = '{$a}' AND password = '{$b}'");
                if ($Checked->num_rows > 0) {
                    $_SESSION['username'] = $a;
                    $_SESSION['password'] = $b;
                    return true;
                } else {
                    return false;
                }
            }
        }
    }
    //END CHEQUEAR USUARIO AL HACER EL LOGIN



    //GENERAR CAPTCHA
    public function GenerateCaptcha()
    {
        $string              = $this->generarCodigo(5);
        $_SESSION["captcha"] = strtoupper($string);
        return $string;
    }
    //END GENERAR CAPTCHA


    public function generarCodigo($longitud)
    {
        $key     = '';
        $pattern = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $max     = strlen($pattern) - 1;
        for ($i = 0; $i < $longitud; $i++)
            $key .= $pattern{mt_rand(0, $max)};
        return $key;
    }


    public function reloadxxx($longitud)
    {
        $key     = '';
        $pattern = '1234567890';
        $max     = strlen($pattern) - 1;
        for ($i = 0; $i < $longitud; $i++)
            $key .= $pattern{mt_rand(0, $max)};
        return $key;
    }


    //GENERAR CODE
    public function GenerateCode()
    {
        $string              = substr(md5(rand() * time()), 0, 50);
        $string              = strtoupper($string);
        $string              = str_replace("O", "B", $string);
        $string              = str_replace("0", "C", $string);
        $_SESSION["captcha"] = strtoupper($string);
        return $string;
    }
    //END GENERAR CODE


    //GENERAR TICKET
    public function GenerateTicket()
    {
        $sessionKey = 'VCD-' . rand(9, 999) . '-' . substr(sha1(time()) . '-' . rand(9, 9999999) . '-' . rand(9, 9999999) . '-' . rand(9, 9999999), 0, 33);
        return $sessionKey;
    }
    //END GENERAR TICKET


    //GENERAR IP
    public function getRealIP()
    {
        if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            return $_SERVER["HTTP_CLIENT_IP"];
        } elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            return $_SERVER["HTTP_X_FORWARDED_FOR"];
        } elseif (isset($_SERVER["HTTP_X_FORWARDED"])) {
            return $_SERVER["HTTP_X_FORWARDED"];
        } elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])) {
            return $_SERVER["HTTP_FORWARDED_FOR"];
        } elseif (isset($_SERVER["HTTP_FORWARDED"])) {
            return $_SERVER["HTTP_FORWARDED"];
        } else {
            return $_SERVER["REMOTE_ADDR"];
        }
    }
    //END GENERAR IP


    //CHECK BANEO
    public function CheckBanned($u, $ip)
    {
        $H     = date('H');
        $i     = date('i');
        $s     = date('s');
        $m     = date('m');
        $d     = date('d');
        $Y     = date('Y');
        $j     = date('j');
        $n     = date('n');
        $today = $d;
        $month = $m;
        $year  = $Y;
        global $db;
        $u        = $this->FilterText($u);
        $ip       = $this->FilterText($ip);
        $checkban = $db->query("SELECT * FROM bans WHERE value = '{$u}' LIMIT 1");
        if ($checkban->num_rows < 1) {
            return false;
        } else {
            $bandata   = $checkban->fetch_array();
            $reason    = $bandata['reason'];
            $expire    = $bandata['expire'];
            $xbits     = explode(" ", $expire);
            $xtime     = explode(":", $xbits[1]);
            $xdate     = explode("-", $xbits[0]);
            $stamp_now = mktime(date('H'), date('i'), date('s'), $today, $month, $year);
            $datetoex  = date("d-m-y", $expire);
            if (time() < $bandata['expire']) {
                $login_error = "Has sido banedo por esta razón: \"" . $reason . "\". Tu baneo expira el: " . $datetoex . ".";
                return $login_error;
            } else {
                $db->query("DELETE FROM bans WHERE value = '{$u}' OR value = '{$ip}' LIMIT 1");
                return false;
            }
        }
    }
    //END CHECK BANEO
}
?>
