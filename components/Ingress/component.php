<?php
namespace Component;

class Ingress extends \DigitalUnited\Components\VcComponent
{
    /*
     * Vc mapping array
     * @link https://wpbakery.atlassian.net/wiki/pages/viewpage.action?pageId=524332
     */
    protected function getComponentConfig()
    {
        return [
            'name' => __('component.name.ingress', 'components'),
            'params' => [
                [
                    "type" => "textarea",
                    "admin_label" => false,
                    "heading" => __("admin.text.text", "components"),
                    "param_name" => "text",
                    "value" => "",
                ],
                [
                    "type" => "dropdown",
                    "holder" => "",
                    "heading" => __("admin.text.align", "components"),
                    "admin_label" => true,
                    "param_name" => "align",
                    "value" => [
                        __('admin.text.align.left', 'components') => 'lead-left',
                        __('admin.text.align.center', 'components') => 'lead-center',
                        __('admin.text.align.right', 'components') => 'lead-right',
                    ],
                    "std" => 'lead-center',
                ],
                [
                    "type" => "colorpicker",
                    "heading" => __("admin.text.text.color", "components"),
                    "param_name" => "text_color",
                ],
            ],
            "icon" => "icon-wpb-ui-separator-label",
        ];
    }
}
