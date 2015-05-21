<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?php wp_head(); ?>
    
    <?php if (is_admin_bar_showing()) { ?>
        <style>
            /* put styles here to compensate for the wp-adminbar */
        </style>
    <?php } ?>
    
    <style>
        .init-hide { display: none; }
    </style>
    <noscript>
        <style>
            .init-hide { display: block !important; }
        </style>
    </noscript>
</head>
