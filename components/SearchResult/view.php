<div class="col-xs-12">
    <form class="form-group search-form" action="/">
        <div class="input-group input-group-lg">
            <div class="icon-addon addon-lg">
                <input type="text" id="s" name="s" class="search-input form-control input-lg" value="<?= $s ?>"/>
            </div>
        <span class="input-group-btn">
            <input class="btn btn-primary" type="submit" value="<?= __('search.result.submit.button', 'components') ?>"/>
        </span>
        </div>
    </form>
</div>

<div class="col-xs-12">
    <h1>Sökresultat</h1>
    <hr/>
</div>

<div class="col-xs-12">
    <?php
    $hits = $component->getSearchResults();
    if ($hits) {
        foreach ($hits as $postComponent) {
            echo $postComponent->render();
        }
    } else {
        echo '<div class="alert alert-warning" role="alert">'
                . $component->getErrorMessage()
                . '<div>';
    }
    ?>
</div>