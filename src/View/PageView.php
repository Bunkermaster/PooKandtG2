<?php

namespace View;

/**
 * Class PageView
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package View
 */
class PageView
{
    public function index(?array $data): string
    {
        ob_start();
?>
        <table>
            <tr>
                <th>ID</th>
                <th>Slug</th>
                <th>Action</th>
            </tr>
            <?php if (null === $data) :?>
                <tr>
                    <td colspan="3">No pages</td>
                </tr>
            <?php else:?>
                <?php foreach ($data as $onePage):?>
                <tr>
                    <td>
                        <a href="<?=KANDT_ROOT_URI.KANDT_ACTION_PARAM?>=page.show&id=<?=$onePage['id'] ?? ''?>">
                            <?=$onePage['id'] ?? ''?>
                        </a>
                    </td>
                    <td><?=$onePage['slug'] ?? ''?></td>
                    <td>
                        <a href="<?=KANDT_ROOT_URI.KANDT_ACTION_PARAM?>=page.edit&id=<?=$onePage['id'] ?? ''?>">Edit</a>
                        <a href="<?=KANDT_ROOT_URI.KANDT_ACTION_PARAM?>=page.delete&id=<?=$onePage['id'] ?? ''?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach;?>
            <?php endif;?>
        </table>
<?php
        $this->form();
        return \ob_get_clean();
    }

    public function edit($data): string
    {
        ob_start();
        $this->form($data, 'page.edit', "Modifier");

        return \ob_get_clean();
    }

    public function form(array $data = [], $formAction = 'page.add', $buttonValue = "Ajouter"): void
    {
        ?>
    <form action="<?=KANDT_ROOT_URI.KANDT_ACTION_PARAM?>=<?=$formAction?>" method="post">
        <input type="hidden" name="page[id]" value="<?=$data['id'] ?? ''?>">
        <label for="">Title</label><br><input type="text" name="page[title]" value="<?=$data['title'] ?? ''?>"><br>
        <label for="">slug</label><br><input type="text" name="page[slug]" value="<?=$data['slug'] ?? ''?>"><br>
        <label for="">H1</label><br><input type="text" name="page[h1]" value="<?=$data['h1'] ?? ''?>"><br>
        <label for="">Nav Title</label><br><input type="text" name="page[nav-title]" value="<?=$data['nav-title'] ?? ''?>"><br>
        <label for="">P</label><br><textarea name="page[p]" id="" cols="30" rows="10"><?=$data['p'] ?? ''?></textarea><br>
        <label for="">Span text</label><br><input type="text" name="page[span-text]" value="<?=$data['span-text'] ?? ''?>"><br>
        <label for="">Span class</label><br><input type="text" name="page[span-class]" value="<?=$data['span-class'] ?? ''?>"><br>
        <label for="">Alt text</label><br><input type="text" name="page[img-alt]" value="<?=$data['img-alt'] ?? ''?>"><br>
        <label for="">File</label><br><input type="text" name="page[img-src]" value="<?=$data['img-src'] ?? ''?>"><br>
        <input type="submit" value="<?=$buttonValue?>">
    </form>
<?php
    }

    public function delete(array $data): string
    {
        ob_start();
?>
        <form action="<?=KANDT_ROOT_URI.KANDT_ACTION_PARAM?>=page.delete" method="post">
            <input type="hidden" name="page[id]" value="<?=$data['id'] ?? ''?>">
            <h2>Etes vous certain de supprimer <i><?=$data['slug'] ?? ''?></i></h2>
            <input type="submit" value="Supprimer">
        </form>
<?php

        return \ob_get_clean();
    }


}
