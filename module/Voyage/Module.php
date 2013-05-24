<?php
namespace Voyage;

use Voyage\Model\Voyage;
use Voyage\Model\VoyageTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Voyage\Model\VoyageTable' =>  function($sm) {
                    $tableGateway = $sm->get('VoyageTableGateway');
                    $table = new VoyageTable($tableGateway);
                    return $table;
                },
                'VoyageTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Voyage());
                    return new TableGateway('voyages', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
    }
}