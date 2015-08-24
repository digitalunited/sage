<?php
namespace Component;

class Heading extends \DigitalUnited\Components\VcComponent
{
    /*
     * Vc mapping array
     * @link https://wpbakery.atlassian.net/wiki/pages/viewpage.action?pageId=524332
     */
    protected function getComponentConfig()
    {
        return [
            'name' => __('component.name.heading', 'components'),
            'params' => [
                [
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("admin.text.heading.text", "components"),
                    "param_name" => "heading",
                    "value" => "",
                ],
                [
                    "type" => "dropdown",
                    "holder" => "",
                    "heading" => __("admin.text.heading.size", "components"),
                    "admin_label" => true,
                    "param_name" => "size",
                    "value" => [
                        1 => 'h1',
                        2 => 'h2',
                        3 => 'h3',
                        4 => 'h4',
                        5 => 'h5',
                        6 => 'h6',
                    ],
                    "std" => 'h1',
                ],
                [
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("admin.text.lead.width", "components"),
                    "param_name" => "width",
                    "value" => "",
                ],
                [
                    "type" => "dropdown",
                    "holder" => "",
                    "heading" => __("admin.text.heading.align", "components"),
                    "admin_label" => true,
                    "param_name" => "align",
                    "value" => [
                        __('admin.text.align.left', 'components') => 'heading-left',
                        __('admin.text.align.center', 'components') => 'heading-center',
                        __('admin.text.align.right', 'components') => 'heading-right',
                    ],
                    "std" => 'heading-center',
                ],
                [
                    "type" => "colorpicker",
                    "heading" => __("admin.text.text.color", "components"),
                    "param_name" => "text_color",
                ],
            ],
            "icon" => "icon-wpb-ui-custom_heading",
        ];
    }
}
