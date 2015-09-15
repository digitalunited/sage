<?php
namespace Component;

class Divider extends \DigitalUnited\Components\VcComponent
{
    /*
     * Vc mapping array
     * @link https://wpbakery.atlassian.net/wiki/pages/viewpage.action?pageId=524332
     */
    protected function getComponentConfig()
    {
        return [
            'name' => __('component.name.divider', 'components'),
            'params' => [
                [
                    "type" => "dropdown",
                    "heading" => __("admin.text.theme.gap", "components"),
                    "admin_label" => false,
                    "param_name" => "theme",
                    "value" => [
                        __('admin.text.size.standard', 'components') => 'standard',
                        __('admin.text.size.big', 'components') => 'big-gap',
                    ],
                    "std" => 'standard'
                ],
            ],
            "icon" => "icon-wpb-ui-separator",
        ];
    }
}
