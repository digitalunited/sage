<?php
namespace Component;

class RelatedLinksAndFiles extends \DigitalUnited\Components\VcComponent
{
    /*
     * Vc mapping array
     * @link https://wpbakery.atlassian.net/wiki/pages/viewpage.action?pageId=524332
     */
    protected function getComponentConfig()
    {
        return [
                'name' => __('component.name.related.links.and.files', 'components'),
                'params' => [
                        [
                                "type" => "textfield",
                                "holder" => "div",
                                "class" => "",
                                "heading" => __("admin.text.headline", "components"),
                                "param_name" => "headline",
                                "value" => "",
                        ],
                        [
                                "type" => "dropdown",
                                "class" => "",
                                "heading" => __("admin.text.icon", "components"),
                                "param_name" => "type",
                                "value" => [
                                    __('admin.text.icon.related.files') => 'related-files',
                                    __('admin.text.icon.related.links') => 'related-links',
                                ],
                        ],
                ]
        ];
    }

    public function getType()
    {
        return $this->param('type');
    }

    public function getIcon()
    {
        return $this->param('type') == 'related-files'
            ? 'icon-download'
            : 'icon-link';
    }

    public function getRelatedDocuments()
    {
        if ($this->param('type') == 'related-files') {
            return $this->getRelatedFiles();
        } else {
            return $this->getRelatedLinks();
        }
    }

    private function getRelatedFiles()
    {
        return "<a href='#'>Filnamn.pdf <span class='file-size'>(15 mb)</span></a>";
    }

    private function getRelatedLinks()
    {
        return "<a href='{$target}'>{$title}</a>";
    }

    protected function sanetizeDataForRendering($data)
    {
        return $data;
    }
}
