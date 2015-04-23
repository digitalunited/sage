<?= $heading ? "<h2>$heading</h2>" : '' ?>
<div class="row-same-height">
    <? foreach ($testimonials as $i => $t) { ?>
        <div class="box col-sm-6 col-sm-height col-top">
            <div class="row">
                <div class="col-md-4 col-sm-12 pull-right">
                    <?= \Component\getImage(['image_id' => $t->image]) ?>
                </div>
                <div class="col-md-8 col-sm-12">
                    <h3><?= $t->title ?></h3>
                    <p class="byline"><?= $t->name ?>, <?= $t->city ?></p>
                    <p class="text">"<?= $t->text ?>"</p>
                </div>
            </div>
        </div>
    <? } ?>
</div>
