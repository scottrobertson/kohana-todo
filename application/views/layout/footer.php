        <hr />

        <?php

        $user = Auth::instance()->get_user();
        if ($user)
        {
        ?>
            (<?php echo $user->email ?>) <a href="/logout">Logout</a>
        <?php
        }
        ?>
    </div>
</body>
</html>