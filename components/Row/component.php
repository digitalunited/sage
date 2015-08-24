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
            'section_bg_image_fixed' => '',
            'section_bg' => '',
            'column_padding' => '',
            'padding_settings' => '',
            'container_type_class' => 'container'
        ];
    }

    protected function sanetizeDataForRendering($data)
    {
        $data['row_css_class'] = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'vc_row wpb_row ' . ($data['row_type'] === 'vc_row_inner' ? 'vc_inner ' : '') . get_row_css_class(), $data['row_type']);
        $data['row_css_class'] .= $this->getPaddingClasses();
        $data['padding_settings'] = str_replace(',', ' ', $data['padding_settings']);

        $data['row_id'] = $this->getrowid();
        $data['content'] = wpb_js_remove_wpautop($data['content']);
        $data['srcset'] = $this->getImageSrcset();

        return $data;
    }

    private function getPaddingClasses()
    {
        return ' ' . str_replace(',', ' ', $this->param('padding_settings'));
    }

    private function getRowId()
    {
        return 'row-' . self::$rowNumber++;
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
                    "type" => "checkbox",
                    "heading" => __("admin.text.background.image.fixed", "components"),
                    "param_name" => 'section_bg_image_fixed',
                    "value" => [
                        __('admin.text.fixed.bg.image', 'components') => 'bg-fixed',
                    ],
                    "std" => false,
                ],
                [
                    "type" => "colorpicker",
                    "heading" => __("admin.text.background.color", "components"),
                    "param_name" => 'section_bg',
                    "value" => [],
                ],
                [
                    "type" => "checkbox",
                    "heading" => __("admin.text.column.padding", "components"),
                    "param_name" => 'column_padding',
                    "value" => [
                        __('admin.text.no.column.padding', 'components') => 'no-column-padding',
                    ],
                    "std" => false,
                ],
                [
                    "type" => "checkbox",
                    "heading" => __("admin.text.padding.settings", "components"),
                    "param_name" => 'padding_settings',
                    "value" => [
                        __('admin.text.no-padding-top', 'components') => 'no-padding-top',
                        __('admin.text.no-padding-bottom', 'components') => 'no-padding-bottom',
                    ],
                    "std" => true,
                ],
                [
                    "type" => "dropdown",
                    "heading" => __("admin.text.section.type", "components"),
                    "param_name" => 'container_type_class',
                    "value" => [
                        __('admin.text.section.type.container', 'components') => 'container',
                        __('admin.text.section.type.container.almost.fluid', 'components') => 'container-big',
                        __('admin.text.section.type.container.fluid', 'components') => 'container-fluid full-width',
                    ],
                    "std" => 'container',
                ],
            ],
            "description" => __("admin.row.desc", "components")
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

    private function getImageSrcset()
    {
        $image_id = $this->param('section_bg_image');
        $srcset =  $image_id ? \DigitalUnited\ResponsiveImage::render([
            'imgId' => $image_id,
            'output' => 'srcset',
        ]) : '';


        return $srcset;
    }
}
