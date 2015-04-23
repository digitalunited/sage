<?php
/*
 * Overrides vc_tabs module
 */
namespace Component;

class Tabs extends \DigitalUnited\Components\Component
{
    private $tabs;

    protected function getDefaultParams()
    {
        return [
            'interval' => 0,
            'tabs' => [],
            'theme' => 'light',
        ];
    }

    public function main()
    {
        add_action('init', array(&$this, 'remapVc'));
        $this->overrideVcShortcode();
    }

    public function remapVc()
    {
        \vc_map_update('vc_tabs', [
            'name' => __('component.name.tabs', 'components'),
            'params' => [
                [
                    "type" => "dropdown",
                    "heading" => __("admin.text.theme", "components"),
                    "param_name" => 'theme',
                    "value" => [
                        __('admin.text.theme.light', 'components') => 'light',
                        __('admin.text.theme.dark', 'components') => 'dark',
                    ],
                    "std" => 'light',
                ],
            ]
        ]);
    }

    private function overrideVcShortcode()
    {
        add_shortcode('vc_tabs', function ($atts, $content) {
            // This will trigger the vc_tab shortcode wich populates the
            // ->tabs variable
            $this->tabs = [];
            do_shortcode($content);

            $atts['tabs'] = $this->tabs;
            return (new self($atts, $content))->render();
        });

        add_shortcode('vc_tab', function($atts, $content) {
            $atts = shortcode_atts([
                'title' => '',
                'tab_id' => '',
            ], $atts, 'vc_tab');

            $this->tabs[] = [
                'title' => $atts['title'],
                'tab_id' => $atts['tab_id'],
                'content' => do_shortcode($content),
            ];
        });
    }
}
