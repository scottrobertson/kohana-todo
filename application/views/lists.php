<?php echo View::factory('layout/header', array('title' => 'Todo List')); ?>
<script>
window.onload = function() {
  document.getElementById("addlist").focus();
}
</script>
<div class="page-header hero-unit">
    <h1 class="lead">
        Todo List
    </h1>
</div>

<form method="post">
    <div class="row-fluid">
        <div class="span12">
            <input required type="text" id="addlist" name="title" placeholder="List..." class="span12" />
        </div>
    </div>
</form>

<?php

if (count($lists))
{
    echo '<table class="table table-stripped table-hover well">';
    foreach ($lists as $list)
    {
        $count = $list->tasks->count_all();
        ?>
        <tr>
            <td width="99%">
                <a href="/list/<?php echo $list->id ?>">
                    <b><?php echo $list->title; ?></b> (<?php echo $count ?>)
                </a>
            </td>
            <td>
                <div class="btn-group">
                    <a class="btn btn-danger" href="/list/<?php echo $list->id ?>/delete">
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
        <p class="alert alert-danger">No lists found. Add one above.</p>
    <?php
}

?>
<?php echo View::factory('layout/footer'); ?>
