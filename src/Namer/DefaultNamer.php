<?php

namespace Ivoba\AssetVersion\Namer;


/**
 * Class DefaultNamer
 * @package Ivoba\AssetVersion\Namer
 */
class DefaultNamer implements AssetNamerInterface
{

    /**
     * @inheritdoc
     */
    public function getName($asset, $version)
    {
        $path = pathinfo($asset);
        $dir  = '';
        if ($path['dirname'] != '.') {
            $dir = rtrim($path['dirname'], '/') . '/';
        }
        return $dir . $path['filename'] . '.' . $version . '.' . $path['extension'];
    }

}