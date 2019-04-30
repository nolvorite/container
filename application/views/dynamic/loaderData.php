<?php
	if(count($data) >= 2 && gettype($data[0]) === "string"){

		switch($data[0]){

			//all json requests
			case "admin":
			case "notes":
			case "userDataForController":
			case "forms":
			case "tableData":
			case "dataFetch":
			case "users":
			case "settings":
				header('Content-Type: application/json');
				switch($data[0]){
					case "notes":
					case "userDataForController":
					case "admin":
					case "forms":
					case "tableData":
					case "dataFetch":
					case "users":
						echo json_encode((array) $data);
					break;
					case "settings":
						echo json_encode((array) $data);
					break;
				}
			break;
			

		}
	}

?>