<div class="users index">

	<h1>Users</h1>
	
	<?php echo $this->Html->link('Add a New User', '/admin/users/add', array('class' => 'admin-link pages-add')); ?>
	
	<div id="admin-content">
		
		<?php if (!empty($users)) : ?>

			<table class="admin-table" cellpadding="0" cellspacing="0">			
				<tr>
					<th><?php echo $this->Paginator->sort('username');?></th>
					<th><?php echo $this->Paginator->sort('role');?></th>
					<th><?php echo $this->Paginator->sort('active');?></th>
					<th><?php echo $this->Paginator->sort('created');?></th>
					<th><?php echo $this->Paginator->sort('modified');?></th>
					<th>&nbsp;</th>
				</tr>

				<?php foreach($users as $user) : ?>
				<tr>
					<td><?php echo $this->Html->link($user['User']['username'], "/admin/users/edit/{$user['User']['id']}"); ?></td>
					<td><?php echo $user['User']['role']; ?></td>
					<td><?php echo $user['User']['active'] ? '&#10003;' : '&#10007;' ?></td>
					<td><?php echo date(DF_SHORT, strtotime($user['User']['created'])); ?></td>
					<td><?php echo date(DF_SHORT, strtotime($user['User']['modified'])); ?></td>
					<td>
						<div class="form-table-actions">
							<?php echo $this->Html->link('Edit', "/admin/users/edit/{$user['User']['id']}", array('class' => 'form-block-link')); ?>
							<?php echo $this->Html->link('Delete', "/admin/users/delete/{$user['User']['id']}", array('class' => 'post form-block-link')); ?>
						</div>
					</td>
				</tr>					
				<?php endforeach; ?>
			
			</table>
			
			<p class="paging-text">
				<?php echo $this->Paginator->counter(
					'Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'
				); ?>	
			</p>
		
			<div class="paging">
				<?php echo $this->Paginator->prev('<< ' . __('previous'), array(), null, array('class'=>'disabled'));?> | 
			  	<?php echo $this->Paginator->numbers();?> | 
		 	  	<?php echo $this->Paginator->next(__('next') . ' >>', array(), null, array('class' => 'disabled'));?>
			</div>
			
		<?php endif ?>
	
	</div>

</div>