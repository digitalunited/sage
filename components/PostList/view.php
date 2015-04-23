<div class="col-md-12 posts">
    <?php
    if ($hits) {
        foreach ($hits as $hit) {
            echo $hit;
        }


    } else {
        echo '<div class="alert alert-warning" role="alert">'
             . $component->getErrorMessage()
             . '<div>';
    }
    ?>

</div>

<?php if ($prev_button || $next_button) { ?>
    <div class="navigation col-md-12">
        <?= $prev_button
            ? '<div class="prev nav-wrapper">'.$prev_button.'</div>'
            : ''; ?>

        <?= $next_button
            ? '<div class="next nav-wrapper">'.$next_button.'</div>'
            : ''; ?>
    </div>
<?php } ?>
