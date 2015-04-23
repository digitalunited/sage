<?php
namespace Component;

class Slider extends \DigitalUnited\Components\VcComponent
{
    /*
     * Vc mapping array
     * @link https://wpbakery.atlassian.net/wiki/pages/viewpage.action?pageId=524332
     */
    protected function getComponentConfig()
    {
        return [
            'name' => __('component.name.slider', 'components'),
            'show_settings_on_create' => false,
            'params' => [],
            'icon' => 'icon-wpb-images-carousel'
        ];
    }

    protected function sanetizeDataForRendering($data)
    {
        $data['slides'] = $this->getSlides();

        return $data;
    }

    public function main()
    {
        require_once('cpt.php');
        require_once('acf.php');
    }

    protected function getSlides()
    {
        $slides = get_posts([
            'post_type' => 'slider',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
        ]);

        $return = [];

        foreach ($slides as $slide) {
            $return[] = (object) [
                'title' => $slide->post_title,
                'text' => get_field('text', $slide->ID, true),
                'url' => get_field('url', $slide->ID, true),
                'image' => get_field('image', $slide->ID, true),
                'bg_image_href' => get_field('bg_image_href', $slide->ID, true),
                'background_color' => get_field('background_color', $slide->ID, true),
            ];
        }

        return $return;
    }
}
