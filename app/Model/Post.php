<?php

class Post extends AppModel { //class name is a CamelCased version of file name
	
	var $name = 'Post'; //set name = file name
	
	//all validations must be in the Model, they are stored in a multidimensional validate array
	public $validate = array (
			'title' => array(
					'title_must_not_be_blank'=>array(
						'rule' => 'notEmpty',
						'message' => 'This post is missing a title!'
					),
					'title_must_be_unique'=>array(
						'rule'=>'isUnique',
						'message'=>'A post with this title already exists!'		
					)
			),
			'body' => array (
					'rule'=>'notEmpty',
					'message'=>'This post is missing its body!'
			)	
		);
}