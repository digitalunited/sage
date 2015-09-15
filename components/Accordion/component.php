<?php
namespace Component;

class Accordion extends \DigitalUnited\Components\Component
{

    protected function getDefaultParams()
    {
        return [];
    }
    public function main()
    {
        add_action('init', array(&$this, 'remapVc'));
    }

    public function remapVc()
    {
        \vc_map_update('vc_tta_accordion', [
            'name' => __('component.name.accordion', 'components'),
            "description" => __("admin.accordion.desc", "components"),
            'category' => __( 'component.category.content', 'components' ),
        ]);
    }
}
