<?php
namespace Voyage\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Insert;
use Zend\Db\Sql;
class VoyageTable extends AbstractTableGateway
{
    protected $tableGateway;
    protected $adapter;

    public function __construct($adapter)
    {
        $this->tableGateway = 'voyages';
        $this->adapter = $adapter;
    }

    public function fetchAll($userid)
    {     
        $select = new Select;
        $select->from('voyages')
        ->where(array('user_id' => $userid));;

        $statement = $this->adapter->createStatement();
        $select->prepareStatement($this->adapter, $statement);

        $resultSet = new ResultSet();
        $resultSet->initialize($statement->execute());   
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

    /*public function saveAlbum($voyage)
    {
        $data = array(
            'nom_voyages' => $voyage->nom_voyages,
            'etat_voyages' => $voyage->etat_voyages,
            'datedebut' => $voyage->datedebut,
            'datefin' => $voyage->datefin,
            'user_id' => $voyage->user_id,
            'type_id' => $voyage->type_id,
        );

        $id = (int)$voyage->id;
        if ($voyage->id == 0){
                $this->insert($data);
        }
            else {
                $this->update($data, array('id' => $voyage->id));
            }
        }*/

    public function saveVoyage($voyage)
    {
        $data = array(
            'nom_voyages' => $voyage->nom_voyages,
            'etat_voyages' => $voyage->etat_voyages,
            'datedebut' => $voyage->datedebut,
            'datefin' => $voyage->datefin,
            'user_id' => $voyage->user_id,
            'type_id' => $voyage->type_id,
        );

        $sql = new Sql($this->adapter);
        
   
 
        $id = (int)$voyage->id;
        if ($id == 0) {
            $insert = $sql->insert('voyages');
            $insert->values($data,array('id'=>$id));
            $selectString = $sql->getSqlStringForSqlObject($insert);
        } else {
            if ($voyage->id) {
                $insert = $sql->update($data, array('id' => $id));
                $selectString = $sql->getSqlStringForSqlObject($insert);
            } else {
                throw new \Exception('Form id does not exist');
            }
             
             
        }
        $results = $this->dbAdapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
    }

    public function deleteVoyage($id)
    {
        $this->tableGateway->delete(array('id' => $id));
    }
}