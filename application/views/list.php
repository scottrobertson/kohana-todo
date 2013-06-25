<?php echo View::factory('layout/header', array('title' => $list->title)); ?>

<?php $tasks = $list->tasks->find_all(); ?>
<script>
window.onload = function() {
  document.getElementById("addtask").focus();
}
</script>
<div class="page-header hero-unit">
    <div class="pull-right">
        <a href='/'>
            <i class="icon-level-up"></i> Back to Lists
        </a> |
        <a href="/list/<?php echo $list->id ?>/delete">
            <i class="icon-remove"></i>
            Delete
        </a>
    </div>
    <h1 class="lead"><?php echo $list->title ?> (<?php echo count($tasks) ?>)</h1>
</div>

<form method="post">
    <div class="row-fluid">
        <div class="span12">
            <input required type="text" id="addtask" name="title" placeholder="Task..." class="span12" />
        </div>
    </div>
</form>

<?php

if (count($tasks))
{
    echo '<table class="table table-stripped table-hover well">';
    foreach ($tasks as $task)
    {
        ?>
        <tr <?php if ($task->status) { ?> class="success"  <?php } ?> >
            <td width="99%">
                <a href="/task/<?php echo $task->id ?>">
                    <?php echo $task->title; ?>
                </a>
            </td>
            <td style="text-align:right">
                <div class="btn-group">
                    <?php if (!$task->status) { ?>
                        <a class="btn btn-success" href="/task/<?php echo $task->id ?>/complete">
                            <i class="icon-thumbs-up"> </i>
                        </a>
                    <?php } ?>

                    <a class="btn btn-danger" href="/task/<?php echo $task->id ?>/delete">
                        <i class="icon-remove"> </i>
                    </a>
                </div>
            </td>
        </tr>
        <?php
    }
    echo '</table>';
}
else
{
    ?>
        <p class="alert alert-danger">No tasks. Add one above.</p>
    <?php
}

?>

<?php echo View::factory('layout/footer'); ?>

