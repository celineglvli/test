<?php
namespace Voyage;

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
                /*'Voyage\Model\VoyageTable' =>  function($sm) {
                    $tableGateway = $sm->get('VoyageTableGateway');
                    $table = new VoyageTable($tableGateway);
                    return $table;
                },*/
                'VoyageTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Voyage());
                    return new TableGateway('voyages', $dbAdapter, null, $resultSetPrototype);
                },
                'Voyage\Model\VoyageTable' =>  function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table     = new Model\VoyageTable($dbAdapter);
                    return $table;
                },
            ),
        );
    }
}