<!-- <?php echo "<pre>";
print_r($surveys);
echo "</pre>"; ?> -->

<?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?>

<h2>Taken Surveys</h2>

<table class="table-striped table-bordered table-condensed table-hover">
    <tr>
        <th>Survey Title</th>
        <th>Answering User</th>
    </tr>
    <?php foreach ($surveys as $s): ?>
    <tr>
        <td><?php echo h($s['survey']['title']); ?></td>
        <td><?php echo h($s['answering_user']['username']); ?></td>

        <td class="actions">
			<?php
$params = $s['survey']['id'] . "|" . $s['answering_user']['id'];
echo $this->Html->link('View', array('action' => 'view', $params), array('class' => 'btn btn-default btn-xs'));?>

        </td>
    </tr>
    <?php endforeach;?>
</table>
