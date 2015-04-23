<?php
if ($tabs) {
?>

<div role="tabpanel">

  <ul class="nav nav-tabs" role="tablist">

    <?php
    foreach ($tabs as $i => $tab) {
    ?>
        <li role="presentation" class="<?= $i == 0 ? 'active' : '' ?>">
            <a href="#<?= $tab['tab_id'] ?>"
               aria-controls="<?= $tab['tab_id'] ?>"
               role="tab"
               data-toggle="tab"><?= $tab['title'] ?></a>
        </li>
    <?php
    }
    ?>
  </ul>

  <div class="tab-content">

    <?php
    foreach ($tabs as $i => $tab) {
    ?>
        <div role="tabpanel"
             class="tab-pane <?= $i == 0 ? 'active' : '' ?>"
             id="<?= $tab['tab_id'] ?>">
            <?= $tab['content'] ?>
        </div>
    <?php
    }
    ?>

  </div>

</div>


<?php
}
