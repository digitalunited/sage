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
            'icon' => 'icon-wpb-ui-custom_heading',
            'admin_enqueue_css' => get_stylesheet_directory_uri() . '/dist/vc_backend.css',
            'params' => [
                [
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("admin.text.heading.text", "components"),
                    "param_name" => "heading",
                    "value" => "Rubrik här",
                ],
                [
                    "type" => "dropdown",
                    "heading" => __("admin.text.heading.tag", "components"),
                    "admin_label" => false,
                    "param_name" => "tag",
                    "value" => [
                        1 => 'h1',
                        2 => 'h2',
                        3 => 'h3',
                        4 => 'h4',
                        5 => 'h5',
                        6 => 'h6',
                    ],
                    "std" => 'h2',
                ],
                [
                    "type" => "dropdown",
                    "heading" => __("admin.text.size", "components"),
                    "admin_label" => false,
                    "param_name" => "size",
                    "value" => [
                        __('admin.text.size.h1', 'components') => 'heading-1',
                        __('admin.text.size.h2', 'components') => 'heading-2',
                        __('admin.text.size.h3', 'components') => 'heading-3',
                        __('admin.text.size.h4', 'components') => 'heading-4',
                        __('admin.text.size.h5', 'components') => 'heading-5',
                        __('admin.text.size.h6', 'components') => 'heading-6',
                    ],
                    "std" => 'heading-2',
                ],
                [
                    "type" => "dropdown",
                    "heading" => __("admin.text.heading.align", "components"),
                    "admin_label" => true,
                    "param_name" => "theme",
                    "value" => [
                        __('admin.text.align.left', 'components') => 'heading-left',
                        __('admin.text.align.center', 'components') => 'heading-center',
                        __('admin.text.align.right', 'components') => 'heading-right',
                    ],
                    "std" => 'heading-center',
                ],
                [
                    "type" => "dropdown",
                    "heading" => __("admin.text.color", "components"),
                    "admin_label" => true,
                    "param_name" => "color",
                    "value" => [
                        __('admin.text.color.brand', 'components') => 'color--brand',
                        __('admin.text.color.brand.light', 'components') => 'color--brand-light',
                        __('admin.text.color.white', 'components') => 'color--white',
                    ],
                    "std" => 'color--brand',
                ],
                [
                    "type" => "vc_link",
                    "admin_label" => false,
                    "heading" => __("admin.text.link", "components"),
                    "param_name" => "link",
                    "value" => "",
                    "description" => __("admin.text.field.may.be.blank", "components"),
                ],
            ],
        ];
    }

    protected function SanetizeDataForRendering($data)
    {
        $data['link'] = new \DigitalUnited\Components\Link($data['link']);
        return $data;
    }
}
