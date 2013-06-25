<?php echo View::factory('layout/header', array('title' => 'Signup')); ?>
    <div class="page-header hero-unit">
        <h1>Signup</h1>
    </div>

    <?php

    if (isset($error))
    {
        echo '<p class="alert alert-danger">' . $error . '</p>';
    }

    ?>

    <form method="post">
        <div class="row-fluid">
            <div class="span12">
                <input required type="email" id="email" name="email" placeholder="Email" class="span12" />
                <input required type="password" name="password" placeholder="Password" class="span12" />
                <div class="btn-group">
                    <button type="submit" class="btn btn-primary btn-small">Signup</button>
                    <a href="/login" class="btn btn-warning btn-small">Login</a>
                </div>
            </div>
        </div>
    </form>
<?php echo View::factory('layout/footer'); ?>