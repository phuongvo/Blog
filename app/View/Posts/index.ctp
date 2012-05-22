<h2>View All Posts</h2>

<!-- Add Post Button -->
<table>
	<tr>
		<th>Title</th>
		<th>Body</th>	
		<th>Actions</th>
	</tr>
	
	<!-- Display Posts -->
	<?php foreach($posts as $post): ?>
		<tr>
			<td><?php echo $this->Html->link($post['Post']['title'], 
					array('action'=>'view', $post['Post']['id'])) ; ?></td> 
					<!-- Link helper method: $this->Html->link(text, array (key,value)); key = action, any passed in parameter-->	
			<td><?php echo $post['Post']['body']?></td><!-- 1st key = model, 2nd key = database field  --> 
			<td><?php echo $this->Html->link('Edit', array('action'=>'edit', $post['Post']['id'])); ?>
				<!--Html link helper has 4 params. 3rd Param = give link a class, id, set target attribute. 4th Param = Confirmation String -->
				<?php echo $this->Html->link('Delete', array('action'=>'delete', $post['Post']['id']), null, 'Are you sure you want to delete this Post?');?>
			</td>
		</tr>	
	<?php endforeach?>
</table>
<br />
<p><?php echo $this->Html->link('Add Post', array('controller' => 'posts', 'action'=>'add'));?></p>