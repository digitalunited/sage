<?php

return [
    'enabledStdModules' => [
        'vc_row',
        'vc_row_inner',
        'vc_column',
        'vc_tabs',
        'vc_column_inner',
        'vc_video',
        'vc_empty_space',
        'vc_column_text',
        'vc_raw_html',
    ],
    'useBootstrapGrid' => true,
    'deregisterFrontendStyles' => true,
    'disableFrontendEditor' => false,
    'removeExtraClassNameField' => true,
    'removeDesignOptionsTab' => true,
    'enableRowLayouts' => [ //TRUE or ARRAY
        '1/1',
        '1/2 + 1/2',
        '1/3 + 1/3 + 1/3',
        '1/4 + 1/4 + 1/4 + 1/4',
        '1/4 + 3/4',
        '3/4 + 1/4',
    ],
    //'newRowLayouts' => [[],[],[]]
    'setVcAsTheme' => true,
    'disableGridElements' => true,
    'keepDefaultTemplates' => false,
    'hideVcAdminButtons' => true,
];

