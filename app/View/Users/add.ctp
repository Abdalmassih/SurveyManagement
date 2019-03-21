<h1>Add User</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('username');
echo $this->Form->input('email', array('rows' => '3'));
echo $this->Form->end('Save User');
?>
