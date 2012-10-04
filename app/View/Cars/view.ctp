<div class="cars index">

	<?php echo $this->Html->link('Add car Details', '/cars/add', array('class' => 'admin-link pages-add')); ?>
	
	<div id="admin-content">

		<?php if (!empty($cars)) : ?>

			<table class="admin-table" cellpadding="0" cellspacing="0">			
				<tr>
					<th><?php echo $this->Paginator->sort('id');?></th>
					<th><?php echo $this->Paginator->sort('make');?></th>
					<th><?php echo $this->Paginator->sort('model');?></th>
					<th><?php echo $this->Paginator->sort('fueltype');?></th>
					<th><?php echo $this->Paginator->sort('price');?></th>
					<th><?php echo $this->Paginator->sort('age');?></th>
					<th><?php echo $this->Paginator->sort('color');?></th>
					<th><?php echo $this->Paginator->sort('bodytype');?></th>
					<th><?php echo $this->Paginator->sort('transmission');?></th>
					<th><?php echo $this->Paginator->sort('enginesize');?></th>
					<th><?php echo $this->Paginator->sort('noofdoors');?></th>
					<th><?php echo $this->Paginator->sort('sellerid');?></th>
					<th><?php echo $this->Paginator->sort('mileage');?></th>
					<th><?php echo $this->Paginator->sort('description');?></th>
					<th><?php echo $this->Paginator->sort('active');?></th>
					<th><?php echo $this->Paginator->sort('created');?></th>											
					<th class="actions">Actions </th>		
					<th>&nbsp;</th>
				</tr>
				<?php foreach ($cars as $key => $value): ?>

				<tr>
					<td><?php echo $value['Car']['id'];?></td>
					<td><?php echo $value['Car']['make'];?></td>
					<td><?php echo $value['Car']['model'];?></td>
					<td><?php echo $value['Car']['fueltype'];?></td>
					<td><?php echo $value['Car']['price'];?></td>
					<td><?php echo $value['Car']['age'];?></td>
					<td><?php echo $value['Car']['color'];?></td>
					<td><?php echo $value['Car']['bodytype'];?></td>
					<td><?php echo $value['Car']['transmission'];?></td>
					<td><?php echo $value['Car']['enginesize'];?></td>
					<td><?php echo $value['Car']['noofdoors'];?></td>
					<td><?php echo $value['Car']['sellerid'];?></td>
					<td><?php echo $value['Car']['mileage'];?></td>
					<td><?php echo $value['Car']['description'];?></td>
					<td><?php echo $value['Car']['active'];?></td>
					<td><?php echo $value['Car']['created'];?></td>	
					<td class="actions">
						<div class="form-slidele-actions">
							<?php echo $this->Html->link('Edit', "/cars/edit/{$value['Car']['id']}", array('class' => 'form-block-link')); ?>
							<?php echo $this->Html->link('Delete', "/cars/delete/{$value['Car']['id']}", array('class' => 'post form-block-link')); ?>
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