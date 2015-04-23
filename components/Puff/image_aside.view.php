<div class="col-md-4 col-xs-3 image <?= $image_position ?>">
    <?= $image ?>
</div>
<div class="col-md-8 col-xs-9 content">
    <?= $heading ? "<strong class='heading'>$heading</strong>" : ''; ?>
    <?= wpautop($text) ?>
    <?= $component->renderButtonIfLinkExists() ?>
</div>