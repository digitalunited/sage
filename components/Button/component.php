<?php
namespace Component;

class Button extends \DigitalUnited\Components\VcComponent
{
    /*
     * Vc mapping array
     * @link https://wpbakery.atlassian.net/wiki/pages/viewpage.action?pageId=524332
     */
    protected function getComponentConfig()
    {
        return [
            'name' => __('component.name.button', 'components'),
            'params' => [
                [
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("admin.text.button.text", "components"),
                    "param_name" => "text",
                    "value" => "",
                ],
                [
                    "type" => "vc_link",
                    "holder" => "",
                    "admin_label" => false,
                    "class" => "",
                    "heading" => __("admin.text.link", "components"),
                    "param_name" => "link",
                    "value" => "",
                    "description" => __("admin.text.field.may.be.blank", "components"),
                ],
                [
                    "type" => "dropdown",
                    "holder" => "",
                    "heading" => __("admin.text.position", "components"),
                    "admin_label" => false,
                    "param_name" => "position",
                    "value" => [
                        __('admin.text.left', 'components') => 'pull-left',
                        __('admin.text.center', 'components') => 'align-center',
                        __('admin.text.right', 'components') => 'pull-right',
                    ],
                    "std" => 'pull-left',
                ],
            ],
            "icon" => "icon-wpb-ui-button"
        ];
    }

    protected function sanetizeDataForRendering($data)
    {
        $link = new \DigitalUnited\Components\Link($data['link']);
        $data['text'] = $data['text'] ? $data['text'] : $link->title;
        $data['link'] = new \DigitalUnited\Components\Link($data['link']);
        $data['position'] = $data['theme'] === 'btn-std'
            ? $data['position']
            : '';

        return $data;
    }
}
