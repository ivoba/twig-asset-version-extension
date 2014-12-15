<?php
namespace Ivoba\AssetVersion\Version;

/**
 * Class Md5ContentAssetVersion
 * @package Ivoba\AssetVersion\Version
 */
class Md5ContentAssetVersion implements AssetVersionInterface
{

    /**
     * @inheritdoc
     */
    public function getVersion($file)
    {
        if (!file_exists($file)) {
            throw new \Exception('Given File doesnt exist');
        }
        return substr(md5_file($file), 0, 12);
    }

}