<?php echo $this->Html->script('take_survey'); ?>


<div class="surveys form">
<?php echo $this->Form->create('Survey'); ?>
	<fieldset>
		<legend><?php echo __('Take Survey'); ?></legend>
	<?php
echo $this->Form->input('Question', ['id' => $q['Question']['id'], 'class' => 'q', 'value' => $q['Question']['question'], 'disabled']);

echo $this->Form->input('Answer', array(
    'id' => 'answer',
    'name' => 'answer',
    'options' => array('Yes', 'No'),
    'type' => 'radio',
    'default' => 0,
));
?>
	</fieldset>
<!-- <button type="button" id="nxt">Next</button>
<button type="button" id="prv">Previous</button> -->
</div>
