<?php

namespace Ivoba\AssetVersion\Twig;

use Ivoba\AssetVersion\Namer\AssetNamerInterface;
use Ivoba\AssetVersion\Version\AssetVersionInterface;

/**
 * Class VersionedAssetsExtension
 * @package Ivoba\AssetVersion\Twig
 */
class AssetVersionExtension extends \Twig_Extension
{

    /**
     * @var AssetVersionInterface
     */
    private $version;
    /**
     * @var AssetNamerInterface
     */
    private $namer;
    /**
     * @var string
     */
    private $assetsPath;
    /**
     * @var array
     */
    private $options;

    /**
     * @param AssetVersionInterface $version
     * @param AssetNamerInterface $namer
     * @param string $assetsPath
     * @param array $options
     */
    function __construct(AssetVersionInterface $version,
                         AssetNamerInterface $namer,
                         $assetsPath,
                         array $options = array())
    {
        $this->version    = $version;
        $this->namer      = $namer;
        $this->options    = $options;
        $this->assetsPath = rtrim($assetsPath, '/');
    }

    /**
     * @inheritdoc
     */
    public function getFunctions()
    {
        return array(
            'asset_versioned' => new \Twig_Function_Method($this, 'assetVersioned'),
        );
    }

    /**
     * @param $url
     * @return string
     */
    public function assetVersioned($url)
    {
        $assetDir = isset($this->options['asset.directory']) ?
            $this->options['asset.directory'] :
            null;

        if ($assetDir) {
            $url = sprintf('%s/%s', $assetDir, ltrim($url, '/'));
        }
        $asset   = $this->assetsPath . '/' . $url;
        $version = $this->version->getVersion($asset);
        return $this->namer->getName($url, $version);
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'ivoba_asset_version_extension';
    }
} 