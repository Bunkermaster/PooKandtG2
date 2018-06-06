<?php

namespace View;

/**
 * Class UserView
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package View
 */
class UserView
{
    public function form(): string
    {
        ob_start();
        ?>
        <form action="<?= KANDT_ROOT_URI.KANDT_ACTION_PARAM ?>=user.manager" method="post">
            <h2>C'est quoi ton nom maudit?</h2>
            <input type="text" name="user[name]">
            <input type="submit" value="Nommer!">
        </form>
        <?php
        return \ob_get_clean();
    }
}
