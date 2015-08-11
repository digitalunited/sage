<?php
namespace Component;

class Header extends \DigitalUnited\Components\Component
{
    protected function getDefaultParams()
    {
        return [];
    }

    protected function getWrapperElementType()
    {
        return 'header';
    }

    protected function getWrapperAttributes()
    {
        return ['role' => 'banner'];
    }
}
