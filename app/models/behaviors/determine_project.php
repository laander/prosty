<?php

class DetermineProjectBehavior extends ModelBehavior {

	protected $_defaults = array(
    'auth_session' => 'Auth',  //name of Auth session key
    'project_model' => 'Project',    //name of User model
	'project_id_field' => 'project_id',    //the name of the "created_by" field in DB (default 'created_by')
	'auto_bind' => true     //automatically bind the model to the User model (default true)
	);

	function setup(&$model, $config = array()) {
		//assigne default settings
		$this->settings[$model->alias] = $this->_defaults;

		//merge custom config with default settings
		$this->settings[$model->alias] = array_merge($this->settings[$model->alias], (array)$config);
		$hasFieldProjectId = $model->hasField($this->settings[$model->alias]['project_id_field']);
		$this->settings[$model->alias]['has_project_id'] = $hasFieldProjectId;

		//handles model binding to the User model
		//according to the auto_bind settings (default true)
		if($this->settings[$model->alias]['auto_bind'])
		{
			if ($hasFieldProjectId) {
				$commonBelongsTo = array(
    				'ProjectId' => array('className' => $this->settings[$model->alias]['project_model'],
    									'foreignKey' => $this->settings[$model->alias]['project_id_field'])
				);
				$model->bindModel(array('belongsTo' => $commonBelongsTo), false);
			}
		}
	}
	/**
	 * Before save callback
	 *
	 * @param object $model Model using this behavior
	 * @return boolean True if the operation should continue, false if it should abort
	 * @access public
	 */
	function beforeSave($model) {
		if ($this->settings[$model->alias]['has_project_id']) {
			$AuthSession = $this->settings[$model->alias]['auth_session'];
			$ProjectSession = $this->settings[$model->alias]['project_model'];
			$projectId = Set::extract($_SESSION, $AuthSession.'.'.$ProjectSession.'.'.'id');
			if ($projectId) {
				$data = array($this->settings[$model->alias]['project_id'] => $projectId);
				$model->set($data);
			}
		}
		return true;
	}
}
?>