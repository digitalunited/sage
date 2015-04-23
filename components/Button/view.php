<a href="<?= $link->url ?>" class="btn btn-primary <?= $position ?>" title="<?= $link->title ?>" target="<?= $link->target ?>" role="button">

    <?php if ($theme == 'btn-banner') { ?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <?php } ?>

                <?php if ($theme == 'btn-banner') { ?>
                        <h2>
                <?php } ?>

                    <?= $text ?>

                <?php if ($theme == 'btn-banner') { ?>
                    </h2>
                <?php } ?>

                <?php if ($theme == 'btn-banner') { ?>
                <i class="icon icon-arrow-right"></i>
            </div>
        </div>
    </div>
<?php } ?>

</a>
