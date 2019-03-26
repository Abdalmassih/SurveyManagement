
<?php echo $this->Form->create('User', array(
    'class' => 'form-horizontal',
    'role' => 'form',
    'inputDefaults' => array(
        'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
        'div' => array('class' => 'form-group'),
        'class' => array('form-control'),
        'label' => array('class' => 'col-lg-2 control-label'),
        'between' => '<div class="col-lg-3">',
        'after' => '</div>',
        'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
    ))); ?>
<fieldset>
    <legend><?php echo __('Login'); ?></legend>
    <?php echo $this->Form->input('username'); ?>
    <?php echo $this->Form->input('password'); ?>
<?php echo $this->Form->end(__('Login')); ?>
No account? <?php echo $this->Html->link('Register Now!', array('action' => 'register')); ?>
</fieldset>
