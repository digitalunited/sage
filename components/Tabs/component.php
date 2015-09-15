<?php
namespace Component;

class Tabs extends \DigitalUnited\Components\Component
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
        \vc_map_update('vc_tta_tabs', [
            'name' => __('component.name.tabs', 'components'),
            "description" => __("admin.desc.tabs", "components"),
            'category' => __( 'component.category.content', 'components' ),
        ]);
    }
}
