<?php echo $this->Html->script('take_survey'); ?>


<div class="container">
<?php echo $this->Form->create('Survey'); ?>
	<fieldset id="fset">
		<legend><?php echo __($q['Survey']['title']); ?></legend>
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
<textarea name="note" class="note" cols="5" rows="10" placeholder="Add your note here..."></textarea>
<button type="button" id="add-note">New Note</button>
</div>
