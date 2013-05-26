<?php
namespace Voyage\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
// implements InputFilterAwareInterface
class Voyage
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

    public function getArrayCopy()
    {
        return get_object_vars($this);
    } 

    /*public function setInputFilter(InputFilterInterface $inputFilter)
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
                'name'     => 'user_id',
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
                            'min'      => 5,
                            'max'      => 255,
                        ),
                    ),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'type_id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'etat_voyages',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'InArray',
                        'options' => array(
                            'haystack' => array('En_cours','Termine','Souhait'),
                            'messages'=> array(
                                'notInArray' => 'Veuillez choisir l\'état de votre voyage'
                            ),
                        ),   
                    ),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'datedebut',
                'validators' => array(
                    array(
                        'name'    => 'Between',
                        'options' => array(
                            'min' => '1970-01-01',
                            'max' => '2017-12-31'
                        ),
                    ),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'datefin',
                'validators' => array(
                    array(
                        'name'    => 'Between',
                        'options' => array(
                            'min' => '1970-01-01',
                            'max' => '2017-12-31'
                        ),
                    ),
                ),
            ))); 

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }*/
}