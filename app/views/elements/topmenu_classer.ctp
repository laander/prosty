<?php
$current_controller = $this->params['controller']; 
$current_action = $this->params['action'];
switch ($current_controller) {
	case "projects":
		$topmenu_current = "manage";
		if ($current_action == "index") {
			$topmenu_current = "projects";
		}
		break;
	case "users":
		$topmenu_current = "manage";	
		if ($current_action == "index") {
			$topmenu_current = "people";
		} if ($current_action == "login") {
			$topmenu_current = "help";
		}
		break;
	case "help":
		$topmenu_current = "manage";	
		break;
	default:
		$topmenu_current = "manage";
}
if ($test == $topmenu_current) {
	echo "current-sublevel";
}
?>