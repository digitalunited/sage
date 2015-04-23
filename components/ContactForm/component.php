<?php
namespace Component;

class ContactForm extends \DigitalUnited\Components\VcComponent
{
    /*
     * Vc mapping array
     * @link https://wpbakery.atlassian.net/wiki/pages/viewpage.action?pageId=524332
     */
    protected function getComponentConfig()
    {
        return [
                'name' => __('component.name.contact.form', 'components'),
                'params' => [
                        [
                                "type" => "textfield",
                                "holder" => "",
                                "class" => "",
                                "heading" => __("admin.text.headline", "components"),
                                "param_name" => "headline",
                                "value" => "",
                        ],
                        [
                                "type" => "dropdown",
                                "holder" => "",
                                "class" => "",
                                "heading" => __("admin.text.icon", "components"),
                                "param_name" => "icon",
                                "value" => [
                                    __('admin.text.icon.related.files') => 'related-files',
                                    __('admin.text.icon.related.links') => 'related-links',
                                ],
                        ],
                ]
        ];
    }

    protected function sanetizeDataForRendering($data)
    {
        return $data;
    }
}
