<?php
namespace Voyage\Model;

class Voyage
{
    public $id;
    public $nom_voyages;
    public $etat_voyages;
    public $datedebut;
    public $datefin;
    public $user_id;
    public $type_id;
    

    public function exchangeArray($data)
    {
        $this->id = (!empty($data['id'])) ? $data['id'] : null;
        $this->nom_voyages = (!empty($data['nom_voyages'])) ? $data['nom_voyages'] : null;
        $this->etat_voyages = (!empty($data['etat_voyages'])) ? $data['etat_voyages'] : null;
        $this->datedebut = (!empty($data['datedebut'])) ? $data['datedebut'] : null;
        $this->datefin = (!empty($data['datefin'])) ? $data['datefin'] : null;    
        $this->user_id = (!empty($data['user_id'])) ? $data['user_id'] : null;
        $this->type_id = (!empty($data['type_id'])) ? $data['type_id'] : null;      
    }
}