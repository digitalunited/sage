<?php
namespace Component;

class Html extends \DigitalUnited\Components\Component
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
        \vc_map_update('vc_raw_html', [
            'name' => __('component.name.html', 'components'),
            "description" => __("admin.desc.html", "components"),
        ]);
    }
}
