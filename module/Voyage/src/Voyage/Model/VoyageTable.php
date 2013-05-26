<?php
namespace Voyage\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class VoyageTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll($userid)
    {
       $resultSet = $this->tableGateway->select(array('user_id'=>$userid));
        //$resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getVoyage($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }


    public function saveVoyage(Voyage $voyage)
    {
        $data = array(
            'nom_voyages' => $voyage->nom_voyages,
            'etat_voyages' => $voyage->etat_voyages,
            'datedebut' => $voyage->datedebut,
            'datefin' => $voyage->datefin,
            'user_id' => $voyage->user_id,
            'type_id' => $voyage->id_type,
        );

        $id = (int)$voyage->id;
        var_dump($id);
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getVoyage($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function deleteVoyage($id)
    {
        $this->tableGateway->delete(array('id' => $id));
    }
}