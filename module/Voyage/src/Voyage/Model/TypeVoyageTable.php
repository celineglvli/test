<?php
namespace Voyage\Model;

use Zend\Db\TableGateway\TableGateway\Feature\Featureset;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;

class TypeVoyageTable extends AbstractTableGateway
{
    public $table = 'typevoyage';

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        //$this->resultSetPrototype = new resultSet();
        //$this->resultSetPrototype->setArrayObjectPrototype(new TypeVoyage());
        $this->initialize();
    }

    public function fetchAll()
    {
        return $this->select();
    }
   
    public function addFeature(AbstractFeature $feature)
    {
        $this->features[] = $feature;
        $feature->setTableGateway($this->tableGateway);
        return $this;
    }
}