<?php 
	if(isset($type) && isset($data) && gettype($type) === "string"){
		switch($type){
			case "notes":
			case "admin":
			case "template":
			case "forms":
			case "tableDisplay":
			case "users":
			case "settings":
				switch($type){
					case "settings":
						echo $this->load->view("dynamic/templates/settings.php", $data, TRUE);
					break;
					case "tableDisplay":
						echo $this->load->view("dynamic/templates/bits/tableDisplay.php", $data, TRUE);
					break;
					case "admin":
						echo $this->load->view("dynamic/templates/admin/panel.php",$data,TRUE);
					break;
					case "forms":
					case "users":
					case "notes": 
						echo $this->load->view("dynamic/templates/".$type.".php",$data,TRUE); 
					break;

					case "template":
						if(isset($view) && gettype($view) === "string"){
							switch($view){
								case "menuitem":
									echo $this->load->view("dynamic/templates/admin/editdata/".$view.".php",["data" => $data],TRUE);
								break;
							}
						}
					break;
				}
			break;
		}
	}