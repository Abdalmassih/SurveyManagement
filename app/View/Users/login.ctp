<h2>Login</h2>

<?php

echo $this->Form->create('User');
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->end('Login');

?>

No account? <?php echo $this->Html->link('Register Now!', array('action' => 'register', 'class'=>"btn btn-primary")); ?>
