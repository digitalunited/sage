<?php if ('vc_row' === $row_type) { ?>
    <section id="<?= $row_id ?>"
             class="full-width du-resp-div-bg lazyload cover <?= $column_padding ?> <?= $section_bg_image_fixed ?> <?= $padding_settings ?> <?= $section_bg_image ? 'background-image' : ''?>"
             <?= ($section_bg ? 'style="background-color: ' . $section_bg . ';"' : '') ?>
             data-bgset="<?= $srcset ?>">
    <div class="<?= $container_type_class ?>">
<?php } ?>

    <div class="<?= $row_css_class ?>">
        <?= $content ?>
    </div><!-- row -->

<?php if ('vc_row' === $row_type) { ?>
    </div><!-- container -->
    </section><!-- section -->
<?php } ?>