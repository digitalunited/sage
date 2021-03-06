<?php
namespace Component;

class Footer extends \DigitalUnited\Components\Component
{

    protected function getDefaultParams()
    {
        return ['' => ''];
    }

    protected function getWrapperElementType()
    {
        return 'footer';
    }

    protected function getWrapperAttributes()
    {
        return ['role' => 'content-info'];
    }
}
