<div class="row">
<?php
    if ($image) {
    ?>
        <div class="col-md-5 col-xs-12 pull-right">
            <?= $image ?>
        </div>
    <?php
    }
    ?>

    <div class="col-md-<?= $image ? '7' : '12' ?> col-xs-12">
        <h2><?= $component->getHeadline() ?></h2>
        <?= $component->shouldDisplayDate()
            ? '<p class="date">'.$component->getPostDate().'</p>'
            : ''; ?>
        <?= wpautop($component->getExcerpt()) ?>
        <?= new \Component\Button([
            'text' => __('post.listview.button.readmore', 'components'),
            'link' => $component->getLink()
        ]); ?>
    </div>
</div>
