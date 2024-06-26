<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/common-schema created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\CommonSchema\Tests;

require \dirname(__DIR__).'/config/bootstrap.php';

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Gpupo\CommonSchema\Normalizers\DoctrineTypesNormalizer;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

class Bootstrap
{
    public static function factoryMonologer(): LoggerInterface
    {
        $logger = new Logger('tests');
        $logger->pushHandler(new StreamHandler('var/log/tests', Logger::DEBUG));

        return $logger;
    }

    public static function factoryDoctrineEntityManager()
    {
        DoctrineTypesNormalizer::overrideTypes();
        $evm = new \Doctrine\Common\EventManager();
        $cache = new \Doctrine\Common\Cache\ArrayCache();
        $annotationReader = new \Doctrine\Common\Annotations\AnnotationReader();
        $cachedAnnotationReader = new \Doctrine\Common\Annotations\CachedReader($annotationReader, $cache);
        $driverChain = new \Doctrine\ORM\Mapping\Driver\DriverChain();
        \Gedmo\DoctrineExtensions::registerAbstractMappingIntoDriverChainORM($driverChain, $cachedAnnotationReader);
        $annotationDriver = new \Doctrine\ORM\Mapping\Driver\AnnotationDriver($cachedAnnotationReader, [__DIR__.'/../src']);
        $driverChain->addDriver($annotationDriver, 'Entity');
        // general ORM configuration
        $config = new \Doctrine\ORM\Configuration();
        $config->setProxyDir(sys_get_temp_dir());
        $config->setProxyNamespace('Proxy');
        $config->setAutoGenerateProxyClasses(false); // this can be based on production config.
        // register metadata driver
        $config->setMetadataDriverImpl($driverChain);
        // use our already initialized cache driver
        $config->setMetadataCacheImpl($cache);
        $config->setQueryCacheImpl($cache);
        // loggable, not used in example
        $loggableListener = new \Gedmo\Loggable\LoggableListener();
        $loggableListener->setAnnotationReader($cachedAnnotationReader);
        $evm->addEventSubscriber($loggableListener);

        // timestampable
        $timestampableListener = new \Gedmo\Timestampable\TimestampableListener();
        $timestampableListener->setAnnotationReader($cachedAnnotationReader);
        $evm->addEventSubscriber($timestampableListener);
        $config = Setup::createAnnotationMetadataConfiguration([__DIR__.'/../src/'], true, null, null, false);

        $connectionParams = [
            'dbname' => 'app',
            'user' => 'app_db_user',
            'password' => 'app8as3',
            'host' => getenv('dbhost'),
            'driver' => 'pdo_mysql',
        ];
        $entityManager = EntityManager::create($connectionParams, $config, $evm);

        return $entityManager;
    }
}
