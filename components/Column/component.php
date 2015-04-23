<?php
/*
 * Fixes column module
 */
namespace Component;

class Column extends \DigitalUnited\Components\Component
{
    protected function getDefaultParams()
    {
        return [];
    }

    public function main()
    {
        add_action('init', array(&$this, 'removeVcColumnGroups'));
        add_action('init', array(&$this, 'removeWidthParam'));
    }

    /**
     *  This function moves the responsive settings to the standard tab witch makes it possible to remove de css designer and the class field.
     */
    public function removeVcColumnGroups()
    {
        $vcColumn = \WPBMap::getShortCode('vc_column');

        foreach ($vcColumn['params'] as $key => $param) {
            if (array_key_exists('group', $param)) {
                unset($vcColumn['params'][$key]['group']);
            }
        }

        //VC doesn't like even the thought of you changing the shortcode base, and errors out, so we unset it.
        unset($vcColumn['base']);

        vc_map_update('vc_column', $vcColumn);
    }

    public function removeWidthParam(){
        vc_remove_param('vc_column', 'width');
        vc_remove_param('vc_column_inner', 'width');
    }

}
