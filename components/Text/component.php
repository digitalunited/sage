<?php
/*
 * Overrides vc_text module
 */
namespace Component;

class Text extends \DigitalUnited\Components\Component
{
    protected function getDefaultParams()
    {
        return [
                'headline' => '',
                'content' => '',
                'theme' => 'standard',
        ];
    }

    protected function sanetizeDataForRendering($data)
    {
        return $data;
    }

    public function main()
    {
        add_action('init', array(&$this, 'remapVc'));
        $this->overrideVcShortcode();
    }

    protected function getExtraWrapperDivClasses()
    {
        $classes = [];
        $classes[] = empty($this->param('content')) ? 'no-content' : '';
        $classes[] = empty($this->param('headline')) ? 'no-headline' : '';
        $classes = array_filter($classes);

        return $classes;
    }

    public function remapVc()
    {
        \vc_map_update('vc_column_text', [
            'name' => __('component.name.text', 'components'),
            'params' => [
                [
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __("admin.text.headline", "components"),
                        "param_name" => "headline",
                        "value" => "",
                        "description" => ""
                ],
                [
                        "type" => "textarea_html",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __("admin.text.content", "components"),
                        "param_name" => "content",
                        "value" => "",
                        "description" => ""
                ],
                [
                        "type" => "dropdown",
                        "heading" => __("admin.text.theme", "components"),
                        "param_name" => 'theme',
                        "value" => [
                                __('component.button.theme.standard', 'components') => 'standard',
                                __('component.button.theme.center.light', 'components') => 'center-light',
                                __('component.button.theme.center.dark', 'components') => 'center-dark',
                        ],
                        "std" => 'standard',
                ],
        ]]);
    }

    private function overrideVcShortcode()
    {
        add_shortcode('vc_column_text', function($atts, $content) {
            // Kind of like an wpautop reverse function...  Content is sometimes filled
            // with empty P-tags and BR-s
            $contentSanetized = preg_replace('/<\/{0,1}(p|br).{0,2}>/', '', $content);
            $contentSanetized = trim($contentSanetized);

            return (new self($atts, $contentSanetized))->render();
        });
    }

}
