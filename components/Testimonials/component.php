<?php
namespace Component;

class Testimonials extends \DigitalUnited\Components\VcComponent
{
    /*
     * Vc mapping array
     * @link https://wpbakery.atlassian.net/wiki/pages/viewpage.action?pageId=524332
     */
    protected function getComponentConfig()
    {
        return [
            'name' => __('component.name.testimonials', 'components'),
            'show_settings_on_create' => false,
            'params' => [
                [
                    "type" => "textfield",
                    "holder" => "h3",
                    "heading" => __("admin.text.headline", "components"),
                    "param_name" => "heading",
                ]
            ],
            "icon" => "icon-wpb-atm"
        ];
    }

    protected function sanetizeDataForRendering($data)
    {
        $data['testimonials'] = $this->getTestimonials();

        return $data;
    }

    public function main()
    {
        require_once('cpt.php');
//        require_once('acf.php');
    }

    protected function getTestimonials()
    {
        $slides = get_posts([
            'post_type' => 'testimonial',
            'posts_per_page' => 2, //TODO this should be a setting
            'orderby' => 'rand'
        ]);

        $return = [];

        foreach ($slides as $slide) {
            $return[] = (object) [
                'title' => $slide->post_title,
                'name' => get_field('name', $slide->ID, true),
                'text' => get_field('text', $slide->ID, true),
                'city' => get_field('city', $slide->ID, true),
                'image' => get_field('image', $slide->ID, true),
            ];
        }

        return $return;
    }
}
