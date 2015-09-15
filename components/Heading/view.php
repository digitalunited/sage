<?php if ($link->url) { ?>
   <a href="<?= $link->url ?>" title="<?= $link->title ?>" target="<?= $link->target ?>">
<?php } ?>

<<?= $tag ?> class="<?= $size ?> <?= $color ?>">
    <?= $heading ?>
</<?= $tag ?>>

<?php if ($link->url) { ?>
    </a>
<?php } ?>