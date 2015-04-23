<?= $image ?>
<?= $heading ? "<h4 class='heading'>$heading</h4>" : ''; ?>
<?= wpautop($text) ?>
<?= $component->renderButtonIfLinkExists() ?>