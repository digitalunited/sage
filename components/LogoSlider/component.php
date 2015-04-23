<?php
namespace Component;

class LogoSlider extends \DigitalUnited\Components\VcComponent
{
    /*
     * Vc mapping array
     * @link https://wpbakery.atlassian.net/wiki/pages/viewpage.action?pageId=524332
     */
    protected function getComponentConfig()
    {
        return [
            'name' => __('component.name.logoslider', 'components'),
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
            'post_type' => 'logo_slider',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
        ]);

        $return = [];

        foreach ($slides as $slide) {

            $image_id = get_field('image', $slide->ID, true);
            $image_url = wp_get_attachment_image_src($image_id, 'medium')[0];
            $return[] = (object)[
                'title' => $slide->post_title,
                'url' => get_field('url', $slide->ID, true),
                'image_url' => $image_url,
            ];
        }

        return $return;
    }
}
