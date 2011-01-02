<?php
$current_controller = $this->params['controller']; 
switch ($current_controller) {
	case "projects":
		$submenu_current = "dashboard";
		break;
	case "milestones":
		$submenu_current = "milestones_tasks";
		break;
	case "tasks":
		$submenu_current = "milestones_tasks";
		break;
	case "wikis":
		$submenu_current = "wikis";
		break;
	case "users":
		$submenu_current = "people";
		break;
	default:
		$submenu_current = "default";
}
if ($test == $submenu_current) {
	echo "button-current";
} else {
	echo "button-neutral";
}
?>