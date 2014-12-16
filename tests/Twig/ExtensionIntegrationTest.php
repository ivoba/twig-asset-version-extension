<?php

namespace Ivoba\AssetVersion\Test\Twig;


use Ivoba\AssetVersion\Namer\DefaultNamer;
use Ivoba\AssetVersion\Twig\AssetVersionExtension;
use Ivoba\AssetVersion\Version\Md5ContentAssetVersion;

class ExtensionIntegrationTest extends \Twig_Test_IntegrationTestCase
{
    public function getExtensions()
    {
        $namer   = new DefaultNamer();
        $version = new Md5ContentAssetVersion();
        return array(
            new AssetVersionExtension($version, $namer, __DIR__ . '/../../')
        );
    }

    public function getFixturesDir()
    {
        return dirname(__FILE__) . '/Fixtures/';
    }
}