<?php
echo $name;
?>
<div class="form-group">
	<a href="<?php echo HTML::url('user/create');?>" class="btn btn-success">Add user</a>	
</div>
<table class="table table-bordered table-striped">
	<thead>
		<th>Id</th>
		<th>Name</th>
		<th>Email</th>
		<th>Password</th>
		
		
		<th colspan="2">Actions</th>
	</thead>
	<tbody>
		<?php 
		foreach ($users as $user) {
		?>
			<tr>
				<td><?php echo $user['id'];?></td>
				<td><?php echo $user['name'];?></td>
				<td><?php echo $user['email'];?></td>
				<td><?php echo $user['password'];?></td>
				
				
				<td>
					<a class="btn btn-info btn-block" href="<?php echo HTML::url('user/create',array('id'=>$user['id']));?>" >Update</a>				
				</td>
				<td>
						<a class="btn btn-danger btn-block" href="<?php echo HTML::url('user/delete',array('id'=>$user['id']));?>">Delete</a>
				</td>
		</tr>

		<?php }?>

	</tbody>


</table>