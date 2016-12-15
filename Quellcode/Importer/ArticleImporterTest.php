<?php

namespace EtosErpConnectorTesting\Etos\Importer;

use EtosErpConnector\Etos\Importer\ArticleImporter;
use EtosErpConnectorTesting\Etos\PluginTest;

class ArticleImporterTest extends PluginTest
{
    /** @var ArticleImporter $importerArticle */
    private $importerArticle;

    public function setUp()
    {
        parent::setUp();
        $this->importerArticle = Shopware()->Container()->get('etos_erp_connector.etos.importer.article_importer');
        $this->cleanUpArticleDatabase();
    }

    public function testArticleImport()
    {
        static::assertEquals(
            [
                'updated' => 0,
                'created' => 4,
                'errors' => ''
            ],
            $this->importerArticle->importArticles($this->dir . '/fixtures/shopexport_short.csv')
        );

        static::assertEquals(
            [
                'updated' => 4,
                'created' => 0,
                'errors' => ''
            ],
            $this->importerArticle->importArticles($this->dir . '/fixtures/shopexport_short.csv')
        );
    }

    public function testGetterAndSetter()
    {
        self::assertFalse($this->importerArticle->isImportImages());
        $this->importerArticle->setImportImages(true);
        self::assertTrue($this->importerArticle->isImportImages());
    }
}
