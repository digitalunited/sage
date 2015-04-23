<?= $link->url
    ? $link->renderTag($heading.'<span class="icon-arrow-right-bold"></span>', ['class' => 'heading'])
    :'<div class="heading">'.$heading.'</div>'
?>
<div class="image-and-text">
    <?= $image ?>
    <div class="text">
        <?= wpautop($text) ?>
    </div>
</div>