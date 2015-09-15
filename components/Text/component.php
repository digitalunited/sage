<?php
namespace Component;

class Text extends \DigitalUnited\Components\Component
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
        \vc_map_update('vc_column_text', [
            'name' => __('component.name.text', 'components'),
            "description" => __("admin.text.desc", "components"),
            'category' => __( 'component.category.content', 'components' ),
        ]);
    }
}
