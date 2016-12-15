<?php

namespace EtosErpConnectorTesting\Etos;

use Shopware\Components\Test\Plugin\TestCase;

require __DIR__ . '/../../../../tests/Functional/bootstrap.php';

class PluginTest extends TestCase
{
    protected static $ensureLoadedPlugins = [
        'EtosErpConnector' => [
        ]
    ];

    protected $dir;

    public function setUp()
    {
        parent::setUp();
        require_once __DIR__ . '/../vendor/autoload.php';
        $this->dir = __DIR__;
    }

    public function cleanUpArticleDatabase()
    {
        $sql = 'SET foreign_key_checks = 0;
                TRUNCATE s_article_configurator_dependencies;
                TRUNCATE s_article_configurator_groups;
                TRUNCATE s_article_configurator_option_relations;
                TRUNCATE s_article_configurator_options;
                TRUNCATE s_article_configurator_set_group_relations;
                TRUNCATE s_article_configurator_set_option_relations;
                TRUNCATE s_article_configurator_sets;
                TRUNCATE s_article_configurator_template_prices;
                TRUNCATE s_article_configurator_template_prices_attributes;
                TRUNCATE s_article_configurator_templates;
                TRUNCATE s_article_configurator_templates_attributes;
                TRUNCATE s_article_img_mapping_rules;
                TRUNCATE s_article_img_mappings;
                TRUNCATE s_articles;
                TRUNCATE s_articles_also_bought_ro;
                TRUNCATE s_articles_attributes;
                TRUNCATE s_articles_avoid_customergroups;
                TRUNCATE s_articles_categories;
                TRUNCATE s_articles_categories_ro;
                TRUNCATE s_articles_details;
                TRUNCATE s_articles_downloads;
                TRUNCATE s_articles_downloads_attributes;
                TRUNCATE s_articles_esd;
                TRUNCATE s_articles_esd_attributes;
                TRUNCATE s_articles_esd_serials;
                TRUNCATE s_articles_img;
                TRUNCATE s_articles_img_attributes;
                TRUNCATE s_articles_information;
                TRUNCATE s_articles_information_attributes;
                TRUNCATE s_articles_notification;
                TRUNCATE s_articles_prices;
                TRUNCATE s_articles_prices_attributes;
                TRUNCATE s_articles_relationships;
                TRUNCATE s_articles_similar;
                TRUNCATE s_articles_similar_shown_ro;
                TRUNCATE s_articles_supplier;
                TRUNCATE s_articles_supplier_attributes;
                TRUNCATE s_articles_top_seller_ro;
                TRUNCATE s_articles_translations;
                TRUNCATE s_articles_vote;
                TRUNCATE s_filter_articles;
                SET foreign_key_checks = 1;';
        /** @var \Enlight_Components_Db_Adapter_Pdo_Mysql $db */
        $db = Shopware()->Container()->get('db');
        $db->query($sql);
    }
}
