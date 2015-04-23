<footer class="content-info" role="contentinfo">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-2 social">
                        <h3><?= __('social.media.links.headline.footer', 'roots') ?></h3>
                        <hr>
                        <?php
                        $fbUrl = get_field('facebook-url', 'option');
                        $linkedInUrl = get_field('linkedin-url', 'option');
                        $mynewsDeskUrl = get_field('mynewsdesk-url', 'option');

                        if ($fbUrl) { ?>
                            <a target="_blank" href="<?= $fbUrl ?>" title="<?= __('find.us.on.facebook', 'roots') ?>"><?=__('find.us.on.facebook', 'roots') ?><i class="icon icon-facebook"></i></a>
                        <?php
                        }
                        ?>

                        <?php if ($linkedInUrl) { ?>
                            <a target="_blank" href="<?= $linkedInUrl ?>" title="<?= __('find.us.on.linked.in', 'roots') ?>"><?= __('find.us.on.linked.in', 'roots') ?><i class="icon icon-linkedin"></i></a>
                        <?php
                        }
                        ?>

                        <?php if ($mynewsDeskUrl) { ?>
                            <a target="_blank" href="<?= $mynewsDeskUrl ?>" title="<?= __('find.us.on.mynewsdesk', 'roots') ?>"><?= __('find.us.on.mynewsdesk', 'roots') ?><i class="icon icon-mynewsdesk"></i></a>
                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 copyright">
                <div class="row">
                    <div class="col-xs-12">
                        <hr/>
                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-8">
                        <?= wpautop(get_field('copyright-text', 'option')) ?>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-4">
                        <i class="icon-logo"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
