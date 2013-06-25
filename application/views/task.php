<?php echo View::factory('layout/header', array('title' => $task->title)); ?>

<script>
window.onload = function() {
  document.getElementById("title").focus();
}
</script>
<div class="page-header hero-unit">
    <div class="pull-right">
        <a href="/list/<?php echo $task->list->id ?>">
            Back
        </a>

    </div>
    <h1 class="lead"><?php echo $task->title ?></h1>
</div>

<?php
if ($task->status)
{
    echo '<p class="alert alert-success">This task is complete.</p>';
}
else
{
    echo '<p class="alert alert-danger">This task is not yet complete</p>';
}
?>

<form method="post" class="form-horizontal well well-small">
    <label>
        Title
        <input type="text" id="title" name="title" value="<?php echo $task->title ?>" class="span12">
    </label>

    <label>
        Description
        <textarea name="description" class="span12"><?php echo $task->description ?></textarea>
    </label>

    <label class="checkbox">
        <input name="status" <?php echo $task->status ? 'checked' : null ?> type="checkbox"> Complete?
    </label>

    <button class='btn btn-primary'>Save</button>

</form>



<?php echo View::factory('layout/footer'); ?>

