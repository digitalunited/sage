<div class="col-xs-12">
    <h1><?= $component->getHeadline() ?></h1>

    <?= $component->shouldDisplayDate()
        ? '<p class="date">' . $component->getPostDate() . '</p>'
        : ''; ?>

    <?= $image ?>

    <?= wpautop($post->post_content) ?>

    <?= new \Component\Button([
        'text' => __('post.single.button.to.archive.link', 'components'),
        'link' => $component->getPostTypeArchiveLink(),
        'position' => 'align-center'
    ]); ?>
</div>