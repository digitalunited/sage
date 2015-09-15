<?php
$sb = new \Component\Sidebar(['theme' => 'archive']);
echo $sb->render();
?>
<div class="col-xs-12 col-sm-12 col-md-9 col-md-pull-3">
    <div class="row">
        <?php
        if ($image) {
            ?>
            <div class="col-xs-12">
                <?= $image ?>
            </div>
        <?php
        }
        ?>
        <div class="col-xs-12 col-md-3 meta">
            <?= $component->shouldDisplayDate()
                ? '<p class="date">' . $component->getPostDate() . '</p>'
                : ''; ?>
            <?php foreach ($component->getPostCategories() as $category) {
                echo '<span class="category"><a href="' . get_term_link($category) . '">' . $category->name . '</a></span>';
            } ?>

        </div>
        <div class="col-xs-12 col-md-9">
            <h1><?= $component->getHeadline() ?></h1>
            <?= wpautop($post->post_content) ?>
            <nav>
                <hr>
                <?php if (($prevLink = $component->getPrevPostLink())) { ?>
                    <a href="<?= $prevLink ?>" class="btn--link"><i class="icon icon-round-arrow-left"></i><?= __('prev.posts', 'components') ?></a>
                <?php } ?>
                <?php if (($nextLink = $component->getNextPostLink())) { ?>
                    <a href="<?= $nextLink ?>" class="btn--link next-post"><?= __('next.posts', 'components') ?><i class="icon icon-round-arrow-right"></i></a>
                <?php } ?>
            </nav>
        </div>
    </div>
</div>