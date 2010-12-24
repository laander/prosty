<?php
class MilestonesController extends AppController {
	var $helpers = array ('Html','Form');
	var $name = 'Milestones';
	
	var $scaffold;
	
	function upcoming() {
		$this->helpers[] = 'Time';
		$this->set( 'title_for_layout', 'Upcoming milestone' );
		$this->set('milestone', $this->Milestone->find('first'));
	}	
	
}
?>