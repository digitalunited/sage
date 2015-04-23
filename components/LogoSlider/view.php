<h2>Våra tjänsteleverantörer</h2>

<div id="logo-slider" class="carousel slide multiple" data-ride="carousel">

    <div class="ind">
        <ol class="carousel-indicators">
            <?php foreach ($slides as $i => $slide) { ?>
                <li data-target="#logo-slider"
                    data-slide-to="<?= $i ?>"<?= $i === 0 ? ' class="active"' : '' ?>></li>
            <?php } ?>
        </ol>
    </div>

    <div class="carousel-inner" role="listbox">
        <?php foreach ($slides as $i => $slide) { ?>
            <div class="item<?= $i === 0 ? ' active' : '' ?>" role="presentation">
                <div class="item-content">
                    <?php if ($slide->url) { ?>
                        <a href="<?= $slide->url ?>" target="_blank"><span class="sr-only">Tjänsteleverantörer</span>
                    <?php } ?>
                    <div class="item-bg-image" style="background-image: url('<?= $slide->image_url ?>');"></div>
                    <?php if ($slide->url) { ?>
                        </a>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>

    <a class="left carousel-control hidden-xs hidden-sm" href="#logo-slider" role="button" data-slide="prev">
        <span class="icon icon-arrow-left" aria-hidden="true"></span>
        <span class="sr-only"><?= __('slider.prev', 'components') ?></span>
    </a>
    <a class="right carousel-control hidden-xs hidden-sm" href="#logo-slider" role="button" data-slide="next">
        <span class="icon icon-arrow-right" aria-hidden="true"></span>
        <span class="sr-only"><?= __('slider.next', 'components') ?></span>
    </a>
</div>