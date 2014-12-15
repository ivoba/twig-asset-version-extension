<?php
namespace Ivoba\AssetVersion\Test\Twig;

use Ivoba\AssetVersion\Namer\DefaultNamer;
use Ivoba\AssetVersion\Twig\AssetVersionExtension;
use Ivoba\AssetVersion\Version\Md5ContentAssetVersion;

/**
 * integration test
 * Class AssetVersionExtensionTest
 * @package Ivoba\AssetVersion\Test\Twig
 */
class AssetVersionExtensionTest extends \PHPUnit_Framework_TestCase
{

    public function testAssetVersion()
    {
        $namer          = new DefaultNamer();
        $version        = new Md5ContentAssetVersion();
        $extension      = new AssetVersionExtension($version, $namer, __DIR__ . '/../../');
        $versionedAsset = $extension->assetVersioned('/composer.json');
        $this->assertEquals('/composer.c67eaead8b04.json', $versionedAsset);
        $versionedAsset = $extension->assetVersioned('composer.json');
        $this->assertEquals('composer.c67eaead8b04.json', $versionedAsset);
    }
}
