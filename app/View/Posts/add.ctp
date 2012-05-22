
<h2>Add a Post</h2>

<!-- Form Helper Method -->
<?php 
	echo $this->Form->create('Post');
	echo $this->Form->input('title');
	echo $this->Form->input('body');
	echo $this->Form->end('Create a Post');
?>