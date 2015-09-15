<?php
namespace Component;

class EmptySpace extends \DigitalUnited\Components\Component
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
        \vc_map_update('vc_empty_space', [
            'name' => __('component.name.empty.space', 'components'),
            "description" => __("admin.desc.empty.space", "components"),
            'category' => __( 'component.category.content', 'components' ),
        ]);
    }
}
