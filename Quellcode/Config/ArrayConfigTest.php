<?php

namespace EtosErpConnectorTesting\Etos\Unit\Config;

use EtosErpConnector\Etos\Config\ArrayConfig;

class ArrayConfigTest extends \PHPUnit_Framework_TestCase
{
    /** @var ArrayConfig */
    protected $arrayConfig;

    protected $imagePath;

    protected $csvPath;

    public function setUp()
    {
        parent::setUp();
        $this->imagePath = '/var/www/images/';
        $this->csvPath = '/var/www/csv/';
        $this->arrayConfig = new ArrayConfig(
            $this->imagePath,
            $this->csvPath
        );
    }

    public function testImagePath()
    {
        static::assertEquals(
            $this->imagePath,
            $this->arrayConfig->getImagePath()
        );
    }

    public function testCsvPath()
    {
        static::assertEquals(
            $this->csvPath,
            $this->arrayConfig->getCsvPath()
        );
    }

    public function testDefaultGroupName()
    {
        static::assertEquals(
            'Size',
            $this->arrayConfig->getGroupName()
        );
    }

    public function testDefaultTaxId()
    {
        static::assertEquals(
            1,
            $this->arrayConfig->getDefaultTaxId()
        );
    }
}
