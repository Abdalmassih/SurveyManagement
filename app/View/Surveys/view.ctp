<div class="surveys view">
<h2><?php
	// pr($answers);
echo __($survey['Survey']['title']); ?></h2>

<h3><?php
	//pr($answers);
echo __($answers[0]['User']['username']); ?></h3>

</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Surveys'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Survey'), array('action' => 'add')); ?> </li>

	</ul>
</div>
<div class="related">
	<h3><?php echo __('User Answers'); ?></h3>
	<?php if (!empty($answers)): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Question'); ?></th>
		<th><?php echo __('Answer'); ?></th>
		<th><?php echo __('Notes'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($answers as $ans): ?>
		<tr>
			<td><?php echo $ans['Question']['question']; ?></td>
			<td><?php echo $ans['Answer']['answer'] == 'y' ? 'Yes' : 'No'; ?></td>
			<td><?php echo $ans['Answer']['notes']; ?></td>

		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>


</div>
