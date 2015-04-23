<?php
namespace Component;

class Image extends \DigitalUnited\Components\VcComponent
{
    /*
     * Vc mapping array
     * @link https://wpbakery.atlassian.net/wiki/pages/viewpage.action?pageId=524332
     */
    protected function getComponentConfig()
    {
        return [
                'name' => __('component.name.image', 'components'),
                'params' => [
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
                                "type" => "attach_image",
                                "holder" => "",
                                "class" => "",
                                "heading" => __("admin.text.image", "components"),
                                "admin_label" => false,
                                "param_name" => "image_id",
                                "value" => "",
                                "description" => ""
                        ],
                        [
                                "type" => "dropdown",
                                "holder" => "",
                                "heading" => __("admin.text.theme", "components"),
                                "admin_label" => false,
                                "param_name" => "theme",
                                "value" => [
                                    __('admin.text.standard', 'components') => 'standard',
                                    __('admin.text.theme.no.margin', 'components') => 'no-margin'
                                ],
                                "std" => 'standard',
                                "description" => ""
                        ],
                ],
                "icon" => "icon-wpb-single-image"
        ];
    }

    protected function sanetizeDataForRendering($data)
    {
        $data['image'] = $data['image_id'] ? $this->getImage($data['image_id']) : '';
        $data['link'] = new \DigitalUnited\Components\Link($data['link']);
        return $data;
    }

    protected function getImage($imgId) {
        $attachment = wp_get_attachment_image_src($imgId, 'large');
        $src = $attachment[0];

        $alt = $this->getImgAltTag($imgId);

        return "<img class='img-responsive' src='{$src}' alt='{$alt}' />";
    }

    protected function getImgAltTag($imgId) {
        return trim(strip_tags( get_post_meta($imgId, '_wp_attachment_image_alt', true)));
    }

    public function main()
    {
    }
}

function getImage($params) {
    return (new Image($params))->render();
}