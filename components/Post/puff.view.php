<div class="col-xs-12">
    <hr>
</div>
<div class="col-sm-12 col-lg-3 catdate">
    <?= $component->shouldDisplayDate()
        ? '<p class="date">' . $component->getPostDate() . '</p>'
        : ''; ?>

    <?php
    foreach ($component->getPostCategories() as $category) {
        echo '<p class="category">' . $category->name . '</p>';
    }
    ?>
</div>
<div class="col-sm-12 col-lg-8">
    <h4><?= $component->getHeadline() ?></h4>

    <div class="text">
        <?= wpautop($component->getExcerpt()) ?>
        <?= $image ?>
    </div>

    <?= new \Component\Button([
        'text' => __('post.puffview.button.readmore', 'components'),
        'link' => $component->getLink()
    ]); ?>
</div>
