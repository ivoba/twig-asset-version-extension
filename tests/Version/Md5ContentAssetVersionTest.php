<?php
namespace Ivoba\AssetVersion\Test\Version;

use Ivoba\AssetVersion\Version\Md5ContentAssetVersion;

class Md5ContentAssetVersionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @expectedException \Exception
     */
    public function testException()
    {
        $versioner = new Md5ContentAssetVersion();
        $versioner->getVersion(__DIR__.'../../composer.json');
    }

    public function testGetVersion()
    {
        $versioner = new Md5ContentAssetVersion();
        $version = $versioner->getVersion(__DIR__.'/../../composer.json');
        $this->assertEquals('c67eaead8b04', $version);
    }
}
