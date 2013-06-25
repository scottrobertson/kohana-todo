<?php echo View::factory('layout/header', array('title' => 'Login')); ?>
    <div class="page-header hero-unit">
        <h1>Login</h1>
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
                    <button type="submit" class="btn btn-primary btn-small">Login</button>
                    <a href="/signup" class="btn btn-warning btn-small">Signup</a>
                </div>
            </div>
        </div>
    </form>
<?php echo View::factory('layout/footer'); ?>