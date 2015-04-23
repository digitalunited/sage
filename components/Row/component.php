<?php
/*
 * Overrides vc_text module
 */
namespace Component;

class Row extends \DigitalUnited\Components\Component
{
    static protected $rowNumber = 0;

    protected function getDefaultParams()
    {
        return [
            'row_type' => 'vc_row',
            'section_bg_image' => '',
            'section_bg_class' => '',
            'show_next_section_button' => true,
            'container_type_class' => 'container'
        ];
    }

    protected function sanetizeDataForRendering($data)
    {
        $data['row_css_class'] = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'vc_row wpb_row ' . ($data['row_type'] === 'vc_row_inner' ? 'vc_inner ' : '') . get_row_css_class(), $data['row_type']);

        if ('vc_row' === $data['row_type']) {
            $data['section_styles'] = $this->buildSectionInlineStyle($data);
        }

        $data['row_id'] = $this->getrowid();
        $data['content'] = wpb_js_remove_wpautop($data['content']);

        return $data;
    }

    private function getRowId()
    {
        return 'row-'.self::$rowNumber++;
    }

    public function main()
    {
        add_action('init', array(&$this, 'remapVc'));
        $this->overrideVcShortcode();
    }

    public function remapVc()
    {
        \vc_map_update('vc_row', [
            'name' => __('component.name.row', 'components'),
            'params' => [
                [
                    'type' => 'attach_image',
                    'heading' => __('admin.text.background.image', 'components'),
                    'param_name' => 'section_bg_image',
                ],
                [
                    "type" => "dropdown",
                    "heading" => __("admin.text.background.color", "components"),
                    "param_name" => 'section_bg_class',
                    "value" => [
                        __('color.white', 'components') => ' section-white',
                        __('color.dark.blue', 'components') => ' section-dark-blue',
                        __('color.blue', 'components') => ' section-blue',
                        __('color.gray', 'components') => ' section-gray',
                    ],
                    "std" => ' section-white',
                ],
                [
                    "type" => "checkbox",
                    "heading" => __("admin.text.go.to.next.section.button", "components"),
                    "param_name" => 'show_next_section_button',
                    "value" => [__('admin.text.show.button', 'components') => true],
                    "std" => true,
                ],
                [
                    "type" => "dropdown",
                    "heading" => __("admin.text.section.type", "components"),
                    "param_name" => 'container_type_class',
                    "value" => [
                        __('admin.text.section.type.container', 'components') => 'container',
                        __('admin.text.section.type.container.fluid', 'components') => 'container-fluid full-width',
                    ],
                    "std" => 'container',
                ],
            ]
        ]);

        \vc_map_update('vc_row_inner', [
            'params' => []
        ]);
    }

    private function overrideVcShortcode()
    {
        add_shortcode('vc_row', function ($atts, $content) {
            $atts['row_type'] = 'vc_row';

            return (new self($atts, $content))->render();
        });

        add_shortcode('vc_row_inner', function ($atts, $content) {
            $atts['row_type'] = 'vc_row_inner';

            return (new self($atts, $content))->render();
        });
    }

    protected function buildSectionInlineStyle($data)
    {
        $section_styles = [];
        if (!empty($data['section_bg_image'])) {
            $section_styles['background-image'] = 'url(' . wp_get_attachment_url($data['section_bg_image']) . ')';
        }

        $tmp_styles = [];
        foreach ($section_styles as $property => $value) {
            $tmp_styles[] .= "$property: $value;";
        }

        if (count($tmp_styles)) {
            return ' style="' . implode(' ', $tmp_styles) . '"';
        }

        return '';
    }
}
