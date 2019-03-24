<?php 
	if(isset($type) && isset($data) && gettype($type) === "string"){
		switch($type){
			case "notes":
			case "admin":
			case "template":
			case "forms":
				switch($type){
					case "notes": 
						echo $this->load->view("dynamic/templates/notes.php",['notes' => $data],TRUE);
					break;
					case "admin":
						echo $this->load->view("dynamic/templates/admin/panel.php",$data,TRUE);
					break;
					case "forms":
						echo $this->load->view("dynamic/templates/forms.php",$data,TRUE); 
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