<?php

declare(strict_types=1);

/*
 * @copyright   2020 Mautic Contributors. All rights reserved.
 * @author      Mautic
 * @link        https://mautic.org
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

namespace Mautic\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\Exception\SkipMigration;
use Mautic\CoreBundle\Doctrine\AbstractMauticMigration;

final class Version20201210090729 extends AbstractMauticMigration
{
    /**
     * @throws SkipMigration
     */
    public function preUp(Schema $schema): void
    {
        // Test to see if this migration has already been applied
        if ($schema->hasTable($this->prefix.'resource_mapping')) {
            throw new SkipMigration('Schema includes this migration');
        }

        parent::preUp($schema);
    }

    public function up(Schema $schema): void
    {
        // Please modify to your needs
        $this->addSql('
            CREATE TABLE `'.$this->prefix.'resouce_mapping` (
              `uuid` varchar(60) NOT NULL,
              `resource_type` varchar(30) NOT NULL,
              `resource_id` int(11) NOT NULL,
              `date_added` datetime DEFAULT NULL,
              `date_modified` datetime DEFAULT NULL,
              PRIMARY KEY (`uuid`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;'
        );
    }
}
