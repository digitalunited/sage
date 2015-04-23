<div class="row">
    <div class="col-md-6 hidden-xs hidden-sm" data-sr="wait 0.2s then scale up 20%">
        <h1>Förslagslådan</h1>
        <img src="<?= get_stylesheet_directory_uri(); ?>/assets/img/suggestion-box.png" class="img-responsive" alt="förslagslådan"/>
    </div>
    <div class="col-sm-12 col-md-6">
        <?= do_shortcode('[gravityform id="2" title="false" description="true" ajax="true"]');?>
    </div>
</div>