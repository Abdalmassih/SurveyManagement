<?php echo $this->Html->script('survey_validation'); ?>
<?php echo $this->Html->script('jquery.hortree'); ?>
<?php echo $this->Html->script('jquery.line'); ?>
<?php echo $this->Html->css('jquery.hortree'); ?>


<div id="questions" style=""></div>
<br>

<div id="success"></div>
<div class="surveys form">
<?php echo $this->Form->create('Survey'); ?>
	<fieldset>
		<legend><?php echo __('Add Survey'); ?></legend>
	<?php
echo $this->Form->input('title', ['id' => 'title']);
?>
	</fieldset>
<?php //echo $this->Form->end(__('Submit')); ?>
<?php echo $this->Js->submit('Submit JS',
    [
        'before' => $this->Js->get('#sending')->effect('fadeIn'),
        'success' => $this->Js->get('#sending')->effect('fadeOut'),
        'update' => '#success',
    ]); ?>
</div>

<div id="sending" style="display: none;"> Sending...</div>

<!-- <div style="clear: both; height: 1%;"></div> -->



<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Surveys'), array('action' => 'index')); ?></li>

	</ul>
</div>

<button id="addQ">Add Question</button>
