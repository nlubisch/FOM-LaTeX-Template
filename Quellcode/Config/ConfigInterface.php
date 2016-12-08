<?php

namespace EtosErpConnector\Etos\Config;

interface ConfigInterface
{
    public function getImagePath();

    public function getCsvPath();

    public function getGroupName();

    public function getDefaultTaxId();
}
