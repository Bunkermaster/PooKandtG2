<?php

namespace View;

/**
 * Class PageView
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package View
 */
class PageView
{
    public function index(?array $data): void
    {
?>
        <table>
            <tr>
                <th>id</th>
                <th>slug</th>
                <th>action</th>
            </tr>
            <?php if (null === $data) :?>
                <tr>
                    <td colspan="3">No pages</td>
                </tr>
            <?php else:?>
                <?php foreach ($data as $onePage):?>
                <tr>
                    <td><?=$onePage['id'] ?? ''?></td>
                    <td><?=$onePage['slug'] ?? ''?></td>
                    <td>Action</td>
                </tr>
            <?php endforeach;?>
            <?php endif;?>
        </table>
<?php
    }
}
