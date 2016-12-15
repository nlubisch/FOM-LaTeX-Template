<?php

namespace EtosErpConnector\Etos\Importer;

use EtosErpConnector\Etos\Resource\ArticleResourceInterface;
use Shopware\Components\Api\Resource\Article as ArticleRes;
use EtosErpConnector\Etos\Reader\CsvReaderInterface;
use EtosErpConnector\Etos\Mapper\ArticleMapperInterface;

class ArticleImporter implements ArticleImporterInterface
{
    private $articleRes;

    private $reader;

    private $articleMapper;

    public function __construct(
        CsvReaderInterface $reader,
        ArticleMapperInterface $articleMapper,
        ArticleResourceInterface $articleResource
    ) {
        $this->reader = $reader;
        $this->articleMapper = $articleMapper;
        $this->articleRes = $articleResource;
    }

    public function importArticles($csvPath)
    {
        $csv = $this->reader->readCsv($csvPath);
        $articles = $this->articleMapper->mapArticles($csv);

        $status = [
            'updated' => 0,
            'created' => 0,
            'errors' => ''
        ];

        foreach ($articles as $article) {
            // check if article exists then update it otherwise create it
            $orderNumber = $article['mainDetail']['number'];
            try {
                $articleId = $this->articleRes->getIdByData($article);
                if ($articleId > 0) {
                    $this->articleRes->update($articleId, $article);
                    $status['updated']++;
                } else {
                    $this->articleRes->create($article);
                    $status['created']++;
                }
            } catch (\Exception $e) {
                $status['errors'] .= $orderNumber . ' - '
                    . $e->getMessage() . ' - ' . $e->getTraceAsString()
                    . ' ' . print_r($article, true) . "\n\r";
            }
        }

        return $status;
    }
}
