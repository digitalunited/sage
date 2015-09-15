<?php if ($image) { ?>
    <a href="<?= get_permalink() ?>">
        <div class="component-post--list__image du-resp-div-bg lazyload cover" data-bgset="<?= $srcset ?>">
        </div>
    </a>
<?php } ?>

<div class="component-post--list__body <?= $image ? '' : 'full' ?>">
    <div class="meta">
        <?php foreach ($component->getPostCategories() as $category) {
            echo '<span class="category"><a href="' . get_term_link($category) . '">' . $category->name . '</a></span>';
        } ?>
        <span class="author"><?= __('By', 'sage'); ?> Author here</span>
        <time class="date" datetime="<?= get_post_time('c', true); ?>">
            <?= $component->getPostDate() ?>
        </time>
    </div>

    <a href="<?= get_permalink() ?>" class="title-link"><h2><?= $component->getHeadline() ?></h2></a>
    <p><?= $component->getExcerpt() ?></p>
    <a href="<?= get_permalink() ?>" class="read-more"><i class="icon icon-round-arrow-right"></i></a>
</div>