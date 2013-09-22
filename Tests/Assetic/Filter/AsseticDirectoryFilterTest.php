<?php

namespace Assetic\Test\Filter;

use Assetic\Asset\StringAsset;
use Alex\AsseticExtraBundle\Assetic\Filter\AssetDirectoryFilter;

/**
 * @author Alexandre Salomé <alexandre.salome@gmail.com>
 */
class AssetDirectoryFilterTest extends \PHPUnit_Framework_TestCase
{
    public function testSimple()
    {
        $directory = $this->getMockBuilder('Alex\AsseticExtraBundle\Assetic\Util\AssetDirectory')
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $directory
            ->expects($this->any())
            ->method('getTarget')
            ->will($this->returnValue('assets'))
        ;

        $directory
            ->expects($this->once())
            ->method('add')
            ->with('images/foo.png')
            ->will($this->returnValue('assets/foo.png'))
        ;

        $filter = new AssetDirectoryFilter($directory);

        $asset = new StringAsset('body { background: url("../images/foo.png"); }', array($filter), null, 'css/main.css');
        $asset->setTargetPath('css/main.css');
        $asset->load();

        $filter->filterLoad($asset);
        $filter->filterDump($asset);

        $this->assertEquals('body { background: url("../assets/foo.png"); }', $asset->getContent(), 'AssetDirectoryFilter filters URL');
    }
}
