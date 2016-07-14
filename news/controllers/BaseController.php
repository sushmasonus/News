<?php

class BaseController{
 
	public function renderView($view="",$args=[])
	{
        
		if(!empty($args)){
			extract($args);
		}
		$array = explode('::',$view);
		if(isset($array[0]) && isset($array[1])){
			$file = "../views/".$array[0]."/".$array[1].".php";
			if(file_exists($file)){
				include($file);
			}else{
				include("../views/default.php");
			}
		}else{
			include("../views/default.php");
		}

	}

}