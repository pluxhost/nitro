<?php
	class TplClass{

		private $outputData;
		private $params = Array();
		private $tplName = '';
		public $user = Array();

		public function DisplayError($a, $b){
			echo '<h2>'. $a .'</h2>';
			echo $b;
		}

		public function Display($a){
			echo '<div id="'.$a.'">';
		}

		public function DisplayClosed(){
			echo '</div>';
		}

		public function AddTemplate($Dir, $Name){
			echo $this->GetHtml($Dir, $Name);
		}

		public function AddTemplateHK($Dir, $Name){
			echo $this->GetHtmlHK($Dir, $Name);
		}

		public function SetParam($param, $value){
			$this->params[$param] = $value;
		}

		public function UnsetParam($param){
			unset($this->params[$param]);
		}

		public function FilterParams($str){
			foreach ($this->params as $param => $value){
				$str = str_ireplace('{' . $param . '}', $value, $str);
			}
			return $str;
		}

		public function GetHTML($a, $b){
			extract($this->params);
			$file = DIR . SEPARATOR .'/vcd-files/' . $a . '/' . $b . '.php';
			if(!file_exists($file)){
				$this->DisplayError('Archivo PHP no Encontrado', 'No se ha podido cargar el siguiente PHP: <b>' . $b .'.php</b>');
			}else{
				ob_start();
				include($file);
				$data = ob_get_contents();
				ob_end_clean();
				return $this->FilterParams($data);
			}
		}

		public function GetHTMLHK($a, $b){
			extract($this->params);
			$file = DIR . SEPARATOR .'VCD-StaffPanel/' . $a . '/' . $b . '.php';
			if(!file_exists($file)){
				$this->DisplayError('Archivo PHP no Encontrado', 'No se ha podido cargar el siguiente PHP: <b>' . $b .'.php</b>');
			}else{
				ob_start();
				include($file);
				$data = ob_get_contents();
				ob_end_clean();
				return $this->FilterParams($data);
			}
		}    
	}
?>
