<?php
namespace Ivoba\AssetVersion\Namer;

/**
 * Interface AssetNamerInterface
 * @package Ivoba\AssetVersion\Namer
 */
interface AssetNamerInterface
{
    /**
     * @param string $asset web path filename
     * @param string $version
     * @return string versioned filename
     */
    public function getName($asset, $version);
}