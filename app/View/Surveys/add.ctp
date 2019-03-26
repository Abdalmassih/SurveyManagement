<?php echo $this->Html->script('survey_validation'); ?>
<?php echo $this->Html->script('jquery.hortree'); ?>
<?php echo $this->Html->script('jquery.line'); ?>
<?php echo $this->Html->css('jquery.hortree'); ?>
<div id="questions" style="z-index: -1;"></div>
<br>
<div id="page-container" class="row">



<div class="qform"
	 style="
    width: 80%;
    padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	display: none;
	position:absolute;
	left:0;
right:0;
margin-left:auto;
margin-right:auto;
  top: 50px;
  background-color: powderblue;
	z-index: 100;
	">
    <button id="qform-close" class="btn btn-danger" style="float: right; height: 20px; width: 20px">&times;</button>
    <form action="/action_page.php">
        Question:<br>
        <textarea id="qtext" placeholder="Enter a question..." autofocus></textarea>
        <br><br>
        Next Question on "YES":<br>
        <textarea id="yq" placeholder="Enter a &quot;YES&quot; question..."></textarea>
        <br><br>
        Next Question on "NO":<br>
        <textarea  id="nq" placeholder="Enter a &quot;NO&quot; question..."></textarea>
        <br><br><br>
        <input type="button" id="save-q" value="Save">
    </form>
</div>


	<div id="sidebar" class="col-sm-3">

		<div class="actions">

			<ul class="list-group">
				<li class="list-group-item"><?php echo $this->Html->link(__('List Surveys'), array('action' => 'index')); ?></li>
			</ul><!-- /.list-group -->

		</div><!-- /.actions -->

	</div><!-- /#sidebar .col-sm-3 -->

	<div id="page-content" class="col-sm-9">

		<h2><?php echo __('Add Survey'); ?></h2>

		<div class="surveys form">

			<?php echo $this->Form->create('Survey', array('role' => 'form')); ?>

				<fieldset>

					<div class="form-group">
						<?php echo $this->Form->input('title', array('class' => 'form-control', 'id'=> 'title')); ?>
					</div><!-- .form-group -->


					<button type="button" id="submit" class="btn btn-large btn-primary">Submit</button>

				</fieldset>

			<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->

	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
