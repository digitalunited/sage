<? if ('vc_row' === $row_type) { ?>
    <section id="<?= $row_id ?>" class="full-width<?= $section_bg_class ?>"<?= $section_styles ?>>
    <div class="<?= $container_type_class ?>">
<? } ?>

    <div class="<?= $row_css_class ?>">
        <?= $content ?>

    </div><!-- row -->

<? if ('vc_row' === $row_type) { ?>
    <? if ($show_next_section_button) { ?>
        <a href="#<?= $row_id ?>" class="scroll-to-section" title="Gå till nästa section">Gå till nästa section<i class="icon icon-arrow-down-bold"></i></a>
    <? } ?>
    </div><!-- container -->
    </section><!-- section -->
<? } ?>