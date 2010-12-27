<?php
class Comment extends CommentsAppModel {

	var $name = 'Comment';
	var $order = "Comment.id DESC";
	var $validate = array(
		'comment' => array('notempty'),
		'model' => array('notempty'),
		'foreign_key' => array('numeric'),
		'created_by' => array('numeric'),
		'modified_by' => array('numeric')
	);			

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'Creator' => array('className' => 'User',
								'foreignKey' => 'created_by'
			),
			'Modifier' => array('className' => 'User',
								'foreignKey' => 'modified_by'
			)
	);
}
?>
