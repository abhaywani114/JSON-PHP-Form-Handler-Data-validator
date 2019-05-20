<?php

	/*BismillahHiraManNiraheem
	Ya Allah, Ya Hayyo Ya Qayoom, Ya Wawhaabo
	Hazaaa min fazli Rabi.  
      Allah Hu Akbar,
      Hasbunallah wa Namal wakeel,
	Salat wa salam ala sayeidnaa Muhammad wa aalihi wa ashabil kiraam wa ambiyaa kiram wa mashakinaa wa malaikate kar muqarbeen wa sidiqeen na wa shodai wa soleheen
	Madatt Ya Rasool Allah (SAW), Madatt Ya Gousul Azam, Madatt YA Faiz Ad Destani, Madatt Ya Khaliq Gudjwani, Madatt Ya Sheikh Mahmood Bukhari, Madatt Ya Sheikh NAzim Adil Al Haqqani, Madatt Ya Sahibul saif, Madatt Ya Sheikh Lokman Efenndi, Madatt ya Siqiqeen wa sohdai Bi iznillah
	      Allah Huma Baarik lana fir rizq wal umer e wal hasanaat...
	   Saqaqallah Hul azeem, wa sadqa e Rasool e Kareem (SAW)*/


	   // Author: Abrar Ajaz Wani
	   // Project Name: Json-PHP Form Handler & Data-validator

class json_form 
{

	protected $json_string = null;
	protected $json_res = null;
	protected $json_form_data = [];
	protected $json_form_secure = null;
	public $debug = false;

	public $json_upload_dir = null;

	public function __construct($json = '[]') {
		$this->json_string($json);
	}

	
	// function acceptes the json string and update it at $this->josn_String
	public function json_string($string) {
		if ($this->isJson($string)) {
			$this->json_string  = $string;
			if ($this->debug == true) var_dump($this->json_array());
		} else {
			throw new Exception("Invalid JSON format", 1);
			end();
		}
	}


	public function json_resultant($string) {
			if ($this->isJson($string)) {
			$this->json_res  = $string;
			if ($this->debug == true) var_dump($this->json_array());
		} else {
			throw new Exception("Invalid JSON format", 1);
			end();
		}
	}



	//drops form in html format given in the function $fn
	public function new_form($fn, $var = false) {


				ob_start();
			
				$this->json_disturbute_v1($this->json_array(),$fn);

				$result =   ob_get_clean();

				if ($var == true) {return $result;} else {echo $result;}

				// var_dump($key,gettype($value));
	}




	//drops update form in html format given in the function $fn with values defined in $res
	public function update_form($fn,$res,$var = false) {

				ob_start();
			
				$this->json_disturbute_v2($this->json_array(),$res,$fn);

				$result =   ob_get_clean();

				if ($var == true) {return $result;} else {echo $result;}

	} 


		private function json_disturbute_v2($array,$res,$fn) {

					foreach ($array as $key => $value) {
				if (gettype($value) == 'array' && $this->isAssoc($value) == true) {

						call_user_func($fn,$key,'group_caption',null);

						//go ahead!
						$this->json_disturbute_v2($value,$res[$key],$fn);


				} else if (gettype($value) == 'string') {
						if (!isset($res[$key])) {continue;}
						call_user_func($fn,$key,$value,null,$res[$key]);

				} else 	if (!$this->isAssoc($value)) {

						call_user_func($fn,$key,'option',$value,$res[$key]);
				}
	}
}


	private function json_disturbute_v1($array,$fn) {

					foreach ($array as $key => $value) {
				if (gettype($value) == 'array' && $this->isAssoc($value) == true) {

						call_user_func($fn,$key,'group_caption',null);

						//go ahead!
						$this->json_disturbute_v1($value,$fn);


				} else if (gettype($value) == 'string') {

						call_user_func($fn,$key,$value,$value);

				} else 	if (!$this->isAssoc($value)) {

						call_user_func($fn,$key,'option',$value);
				}
	}
	}

		private function json_disturbute_v3($array) {

				if (!isset($return)) $return = [];
				foreach ($array as $key => $value) {
				if (gettype($value) == 'array' && $this->isAssoc($value) == true) {
						//go ahead!
					
					$return[$key]  = 	$this->json_disturbute_v3($value);

				} else if ($value == 'img') {

				$ext = array('image/jpg','image/jpe','image/jpeg','image/jfif','image/png','image/bmp','image/dib','image/gif');
				$fileN = $this->save_file($key, $ext );
				$return[$key] = $this->json_data_check($key,$fileN);

				} else if ($value  == 'docs') {

				$ext = array('text/pdf');
				$fileN = $this->save_file($key, $ext );
				$return[$key] = $this->json_data_check($key,$fileN);

				} else  {
				
					$return[$key] = $this->json_data_check($key,$_REQUEST[str_replace(" ", "_", $key)]);
				} 
			}
			return $return;
}

	public function json_handle_request($type = "POST")
	{
		if ($_SERVER['REQUEST_METHOD'] == $type) {

			$this->json_form_data = json_encode($this->json_disturbute_v3($this->json_array()));
			return $this->get_json_request();
		}
	}


	//returrns $json_form_data
	public function get_json_request(bool $is_array = true) {
			if ($is_array == true) {
		return  json_decode($this->json_form_data,true);		
	}		else {
		return $this->json_form_data;
	}
	}
	//returns the $this->res ; returns array or object
		public function get_json_res( bool $is_array = true){
		
			if ($is_array == true) {
		return  json_decode($this->json_res,$is_array);
		} else {
			return $this->json_res;
		}		
		}

	//returns the json_string ; returns array or object
	public function json_array( bool $is_array = true) {
			if ($is_array == true) {
			return  json_decode($this->json_string,$is_array);
		}	else {
			return $this->json_string;
		}
		
	}


	// Evlauate if the given $string is a valid JSON doc
	public function isJson($string) {
    $decoded = json_decode($string);
    if ( !is_object($decoded) && !is_array($decoded) ) {
        return false;
    }
    return (json_last_error() == JSON_ERROR_NONE);
	}


	// Evlauate if the given $string is a Associative array
	private function  isAssoc($array)
	{
   return !isset($array[0]);//(count($array) != count($array, 1));
	}

	//secures data
	public function json_secureRule($string) {
		 if (!$this->isJson($string)) {
		 	throw new Exception("Invalid JSON DATA", 1);
		 }

		 $this->json_form_secure = $string;
	}

		//returns the $this->res ; returns array or object
		public function get_json_secureRule( bool $is_array = true){
		
			if ($is_array == true) {
		return  json_decode($this->json_form_secure,$is_array);
		} else {
			return $this->json_form_secure;
		}		
		}
	


	public function json_data_check($key,$data) {
		if (!is_array($this->get_json_secureRule())) {return $data;}

		if (array_key_exists($key, $this->get_json_secureRule()) || array_key_exists('main_rule', $this->get_json_secureRule())) {

			if (array_key_exists($key, $this->get_json_secureRule())) {$rule  = $this->get_json_secureRule()[$key];}

			if (array_key_exists('main_rule', $this->get_json_secureRule())) { foreach ($this->get_json_secureRule()['main_rule'] as $k) {$rule[] = $k;}}



			foreach ($rule as $rule_index) {

				# code...
				$rule_p  = explode(":", $rule_index);
				if ($rule_p[0] == "max") {
					if(strlen($data) > $rule_p[1]) {
						throw new Exception("$key: MAX Invalid input length", 1);
							return false;
					}
				} else if ($rule_p[0] == "min") {
						if(strlen($data) < $rule_p[1]) {
								throw new Exception("$key: MIN Invalid input length", 1);
							return false;
					}
				} else if ($rule_p[0] == "filter") {
						# code...
						if (!filter_var($data, $rule_p[1])) {
							throw new Exception("$key: Filter validation: Invalid Data found", 1);
							return false;
						} 
				} else if ($rule_p[0] == "func") {
							$data = call_user_func($rule_p[1],$data);
				} else if ($rule_p[0] == 'preg') {
					if (!preg_match($rule_p[1], $data)) {
							throw new Exception("$key Preg validation: Invalid Data found", 1);
							return false;
					}
				}
			}
		} 
		return $data;
	}

	       public function  save_file($Key, $exts )
    {
        global $_FILES;
       
        $dir = $this->json_upload_dir;

        if ($_FILES) {
            $fileformat = $_FILES[$Key]["type"];
            if (!in_array($fileformat, $exts)) {
                return null;
            }
        }

        $rand = md5(rand());
        if (strlen($_FILES[$Key]["name"]) != 0) {
            $name = ($_FILES[$Key]["name"]);
            $fileN = $rand . ($name);
            $fileformat = $_FILES[$Key]["type"];
            $target_dir = __dir__ . $dir;
            $path_parts = pathinfo($fileN);

            $ext = $path_parts['extension'];
             $fileN = $rand .'.'.$ext;
            $target_file = $target_dir . (basename($fileN));


            $move = move_uploaded_file($_FILES[$Key]["tmp_name"], $target_file);

        } else {
            $fileN = null;
            return null;
        }

        if ($move) {
            return $fileN;
        } else {
            return null;
        }
    }
}
?>