<?php

namespace EtosErpConnector\Etos\Importer;

interface ArticleImporterInterface
{
    public function importArticles($csvPath);
}
