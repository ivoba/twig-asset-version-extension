<?php
namespace Ivoba\AssetVersion\Version;

/**
 * Interface AssetVersionInterface
 * @package Ivoba\AssetVersion\Version
 */
interface AssetVersionInterface
{

    /**
     * @param $file filesystem file path
     * @return string the version of this file
     */
    public function getVersion($file);

}