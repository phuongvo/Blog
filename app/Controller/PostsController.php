<?php
//Controller is the place where you play with the models and get post-related work done
class PostsController extends AppController { //plural, CamelCased + Controller
	
	var $name = 'Posts';
	
	//functions are actions: what people see on the website. Has it's own view.
	function hello_world() {
	}
	
	function index() {	//retreive all of our posts
			// $this->Post->find('all'); 	//find method for all posts
			
			$this->set('posts', $this->Post->find('all')); 
			//Set Method: Param 1 = variable, Param 2 = what to send to the view
			//In this case, we are sending all the posts to the view and assigning it to the variable posts
	}
	
	//retreive correponding post by id number. Ex. localhost/blog/posts/1. Set id to NULL by default just in case no id is provided
	function view($id = NULL){ 
		// $this->Post->read(NULL, $id); //Param 1 = list of fields. read(NULL) for all. Param 2 = id of post which matches the one passed into the URL
		$this->set('post', $this->Post->read(NULL, $id));
	}
	
	//add post	
	function add(){	
		if($this->request->is('post')) { //check if request type is a post (means form has been submitted)
			if($this->Post->save($this->request->data)) { //saves data and signals whether it is saved or not
				$this->Session->setFlash('The post was successfully added!'); //flash saved message
				$this->redirect(array('action'=>'index')); //redirect to home page
			}
			else{
				$this->Session->setFlash('The post was not saved, please try again'); //else re-render page for resubmition
			}
				
		}
		//	$this->request->data($name);
	}
	
	//edit post
	function edit($id = NULL){
		if($this->request->is('get')) { //checks that the request is a GET request. If so, find the post and hand it to the view.
			$this->request->data = $this->Post->read(NULL, $id); 
		}
		else { //request probably contains POST data
			if($this->Post->save($this->request->data)) { //update Post record 
				$this->Session->setFlash('Your post has been updated');
				$this->redirect(array('action'=>'view', $id)); //let user view newly edited post				
			}
			else{
				$this->Session->setFlash('Unable to update your post.');	//validation error		
			}
		}		
	}
	
	//delete post
	function delete($id = NULL){
		$this->Post->delete($id);
		$this->Session->setFlash('The post has been deleted.');
		$this->redirect(array('action'=>'index'));
	}
	
}