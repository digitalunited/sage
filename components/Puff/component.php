<?php
namespace Component;

class Puff extends \DigitalUnited\Components\VcComponent
{
    /*
     * Vc mapping array
     * @link https://wpbakery.atlassian.net/wiki/pages/viewpage.action?pageId=524332
     */
    protected function getComponentConfig()
    {
        return [
            'name' => __('component.name.puff', 'components'),
            'params' => [
                [
                    "type" => "dropdown",
                    "heading" => __("admin.text.theme", "components"),
                    "param_name" => 'theme',
                    "value" => [
                        __('component.image.theme.standard', 'components') => 'standard',
                        __('component.image.theme.image.aside', 'components') => 'image_aside',
                        __('component.image.theme.image.below', 'components') => 'image_under',
                        __('component.image.theme.transparent', 'components') => 'transparent',
                    ],
                    "std" => 'standard',
                ],
                [
                    "type" => "textfield",
                    "holder" => "h3",
                    "heading" => __("admin.text.headline", "components"),
                    "param_name" => "heading",
                ],
                [
                    "type" => "textarea",
                    "holder" => "p",
                    "heading" => __("admin.text.text", "components"),
                    "param_name" => "text",
                ],
                [
                    "type" => "vc_link",
                    "holder" => "p",
                    "heading" => __("admin.text.link", "components"),
                    "param_name" => "link",
                ],
                [
                    "type" => "attach_image",
                    "heading" => __("admin.text.image", "components"),
                    "param_name" => "image_id",
                ],
                [
                    "type" => "dropdown",
                    "heading" => __("admin.text.image.position", "components"),
                    "param_name" => 'image_position',
                    "value" => [
                        __('admin.text.right', 'components') => 'pull-right',
                        __('admin.text.left', 'components') => 'pull-left',
                    ],
                    "std" => 'pull-right',
                    'dependency' => [
                        'element' => 'theme',
                        'value' => 'image_aside'
                    ]
                ],
                [
                    "type" => "dropdown",
                    "heading" => __("admin.text.background.color", "components"),
                    "param_name" => 'bg_color_class',
                    "value" => [
                        __('admin.text.none', 'components') => '',
                        __('color.light.gray', 'components') => 'light-gray',
                    ],
                    "std" => '',
                    'dependency' => [
                        'element' => 'theme',
                        'value' => 'transparent'
                    ]
                ],
            ],
            "icon" => "icon-wpb-toggle-small-expand"
        ];
    }

    protected function sanetizeDataForRendering($data)
    {
        $data['image'] = new Image(['image_id' => $data['image_id']]);
        $data['link'] = $this->getLink();

        return $data;
    }

    protected function getLink()
    {
        return new \DigitalUnited\Components\Link($this->param('link'));
    }

    protected function getExtraWrapperDivClasses()
    {
        return $this->param('theme') == 'transparent'
            ? [$this->param('bg_color_class')]
            : [];
    }

    public function renderButtonIfLinkExists()
    {
        $link = $this->getLink();
        if (!$link->url) {
            return '';
        }

        $button = new \Component\Button(['link' => $link]);
        return $button->render();
    }
}
