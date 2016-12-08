<?php
namespace EtosErpConnector\Etos\Config;

class ArrayConfig implements ConfigInterface
{
    private $imagePath;

    private $csvPath;

    private $groupName;

    private $defaultTaxId;

    public function __construct($imagePath, $csvPath)
    {
        $this->imagePath = $imagePath;
        $this->csvPath = $csvPath;
        $this->groupName = 'Size';
        $this->defaultTaxId = 1;
    }

    public function getImagePath()
    {
        return $this->imagePath;
    }

    public function getCsvPath()
    {
        return $this->csvPath;
    }

    public function getGroupName()
    {
        return $this->groupName;
    }

    public function getDefaultTaxId()
    {
        return $this->defaultTaxId;
    }
}
