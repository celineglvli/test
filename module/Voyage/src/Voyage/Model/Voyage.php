<?php
namespace Voyage\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Voyage implements InputFilterAwareInterface
{
    public $id;
    public $nom_voyages;
    public $etat_voyages;
    public $datedebut;
    public $datefin;
    public $user_id;
    public $type_id;
    protected $inputFilter; 
    

    public function exchangeArray($data)
    {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->nom_voyages = (isset($data['nom_voyages'])) ? $data['nom_voyages'] : null;
        $this->etat_voyages = (isset($data['etat_voyages'])) ? $data['etat_voyages'] : null;
        $this->datedebut = (isset($data['datedebut'])) ? $data['datedebut'] : null;
        $this->datefin = (isset($data['datefin'])) ? $data['datefin'] : null;    
        $this->user_id = (isset($data['user_id'])) ? $data['user_id'] : null;
        $this->type_id = (isset($data['type_id'])) ? $data['type_id'] : null;      
    }

     public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory     = new InputFactory();

            $inputFilter->add($factory->createInput(array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'nom_voyages',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ),
                    ),
                ),
            )));

            /*$inputFilter->add($factory->createInput(array(
                'name'     => 'etat_voyages',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ),
                    ),
                ),
            )));*/

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}