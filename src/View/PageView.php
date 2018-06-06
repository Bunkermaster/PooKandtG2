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
        $this->form();
    }

    public function edit($data){
        $this->form($data, 'page.edit', "Modifier");
    }

    public function form(array $data = [], $formAction = 'page.add', $buttonValue = "Ajouter")
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
}
