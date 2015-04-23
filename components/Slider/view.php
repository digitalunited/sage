<div id="carousel-main" class="carousel slide" data-ride="carousel">

    <div class="carousel-inner" role="listbox">
        <div class="container ind" role="option">
            <ol class="carousel-indicators">
                <? foreach ($slides as $i => $slide) { ?>
                    <li data-target="#carousel-main"
                        data-slide-to="<?= $i ?>"<?= $i === 0 ? ' class="active"' : '' ?>></li>
                <? } ?>
            </ol>
        </div>

        <? foreach ($slides as $i => $slide) { ?>
            <div class="item<?= $i === 0 ? ' active' : '' ?> <?= $slide->background_color ?>" style="background-image: url('<?= $slide->bg_image_href ?>');" role="presentation">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-6 slider-info">
                            <h1><?= $slide->title ?></h1>

                            <p><?= $slide->text ?></p>
                            <a href="<?= $slide->url ?>" class="btn btn-default btn-lg" role="button">Läs mer</a>
                        </div>
                        <div class="col-xs-12 col-md-6 slider-image">
                            <div class="form-img" style="background-image: url('<?= $slide->image ?>');"></div>
                        </div>
                    </div>
                </div>
            </div>
        <? } ?>

        <a class="left carousel-control hidden-xs hidden-sm" href="#carousel-main" role="button" data-slide="prev">
            <span class="icon icon-arrow-left" aria-hidden="true"></span>
            <span class="sr-only"><?= __('slider.prev', 'components') ?></span>
        </a>
        <a class="right carousel-control hidden-xs hidden-sm" href="#carousel-main" role="button" data-slide="next">
            <span class="icon icon-arrow-right" aria-hidden="true"></span>
            <span class="sr-only"><?= __('slider.next', 'components') ?></span>
        </a>
    </div>
</div>