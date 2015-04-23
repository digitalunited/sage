<div class="related <?= $component->getType() ?>">
    <div class="head">
        <i class="icon <?= $component->getIcon() ?>"></i><span class="heading"><?= $headline ?></span>
    </div>
    <hr/>
    <div class="related-linksandfiles">
        <?= $component->getRelatedDocuments(); ?>
    </div>
</div>