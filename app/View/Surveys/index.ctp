<?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?>

<div class="surveys index">
	<h2><?php echo __('Surveys'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('Added By'); ?></th>
			<!-- <th class="actions"><?php echo __('Actions'); ?></th> -->
	</tr>
	</thead>
	<tbody>
	<?php foreach ($surveys as $survey): ?>
	<tr>
		<td><?php echo h($survey['Survey']['title']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($survey['User']['username'], array('controller' => 'users', 'action' => 'view', $survey['User']['id'])); ?>
		</td>
		<?php if (AuthComponent::user('type') == 'admin'): ?>
		 <td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $survey['Survey']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $survey['Survey']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $survey['Survey']['id']))); ?>
		</td>
		<?php endif?>
		<?php if (AuthComponent::user('type') == 'normal'): ?>
		 <td class="actions">
			<?php echo $this->Html->link(__('Take Survey'), array('action' => 'take', $survey['Survey']['id'])); ?>
		</td>
		<?php endif?>

	</tr>
<?php endforeach;?>
	</tbody>
	</table>
	<p>
	<?php
echo $this->Paginator->counter(array(
    'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'),
));
?>	</p>
	<div class="paging">
	<?php
echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
echo $this->Paginator->numbers(array('separator' => ''));
echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
?>
	</div>
</div>

<?php if (AuthComponent::user('type') == 'admin'): ?>
<div class="actions">
		<li><?php echo $this->Html->link(__('New Survey'), array('action' => 'add')); ?></li>

</div>

<?php endif?>
