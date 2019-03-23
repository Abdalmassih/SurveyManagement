<?php echo $this->Html->script('survey_validation'); ?>
<?php echo $this->Html->script('jquery.hortree'); ?>
<?php echo $this->Html->script('jquery.line'); ?>
<?php echo $this->Html->css('jquery.hortree'); ?>


<div id="questions" style=""></div>
<br>

<div class="qform"
	 style="
	margin: auto;
    width: 60%;
    padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	display: none;
	z-index: 1;
	">
    <button id="qform-close" class="btn btn-danger" style="float: right; height: 20px; width: 20px">&times;</button>
    <form action="/action_page.php">
        Question:<br>
        <input type="text" name="q" placeholder="Enter a question...">
        <br><br>
        Next Question on "YES":<br>
        <input type="text" name="yq" placeholder="Enter a &quot;YES&quot; question...">
        <br><br>
        Next Question on "NO":<br>
        <input type="text" name="nq" placeholder="Enter a &quot;NO&quot; question...">
        <br><br><br>
        <input type="submit" value="Submit">
    </form>
</div>

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

<!-- <button id="addQ">Add Question</button> -->

