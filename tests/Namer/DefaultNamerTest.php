<?php
namespace Ivoba\AssetVersion\Test\Namer;

use Ivoba\AssetVersion\Namer\DefaultNamer;

class DefaultNamerTest extends \PHPUnit_Framework_TestCase
{

    public function testGetName()
    {
        $namer = new DefaultNamer();
        $name = $namer->getName('/css/styles.css', '1111');
        $this->assertEquals('/css/styles.1111.css', $name);
        //relative
        $name = $namer->getName('css/styles.css', '1111');
        $this->assertEquals('css/styles.1111.css', $name);
        //full
        $name = $namer->getName('https://github.com/css/styles.css', '1111');
        $this->assertEquals('https://github.com/css/styles.1111.css', $name);
        //double dot
        $name = $namer->getName('css/styles.min.css', '1111');
        $this->assertEquals('css/styles.min.1111.css', $name);
    }
}
