<?php
namespace Voyage\Form;

use Zend\Form\Form;

class VoyageForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('voyage');
        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));

        $this->add(array(
            'name' => 'nom_voyages',
            'type' => 'Text',
            'options' => array(
                'label' => 'Nom de votre voyage',
            ),
        ));

         $this->add(array(
            'name' => 'etat_voyages',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Etat de votre voyage',
                'empty_option' => 'Choisir..',
                'value_options' => array(
                            'En cours' => 'En cours',
                            'Terminé' => 'Terminé',
                            'Souhait' => 'Souhait',
                    ),
            ),
        ));

        $this->add(array(
            'name' => 'type_id',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Type de votre voyage',
                'empty_option' => 'Choisir..',
                'value_options' => array(
                    '0' => 'Profesionnel',
                    '1' => 'Scolaire',
                    '2' => 'Culturel',
                ),
            ),
            'attributes' => array(
                'id' => 'typevoyage',
            ),
        ));

        $this->add(array(
            'name' => 'datedebut',
            'attributes' =>array(
                'type' => 'Zend\Form\Element\Date',
                'id' => 'date1',
                'class' =>'datepick',
            ),
            'options' => array(
                'label' => 'Date Début',
                'format' => 'd-m-Y',
            ),
        ));

        $this->add(array(
            'name' => 'datefin',
            'attributes' =>array(
                'type' => 'Zend\Form\Element\Date',
                'id' => 'date2',
                'class' => 'datepick'
            ),
            'options' => array(
                'label' => 'Date Fin',
                'format' => 'd-m-Y',
            ),
        ));
 
        $this->add(array(
            'name' => 'user_id',
            'type' => 'Hidden',
             'attributes' => array(
                'id' => 'user_id',
            ),   
        ));

        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Enregistrer',
                'id' => 'submitbutton',
                'class' => 'btn btn-primary'
            ),
        ));
    }

    public function populateValues($data)
    {   
        foreach($data as $key=>$row)
        {
           if (is_array(@json_decode($row))){
                $data[$key] = new \ArrayObject(\Zend\Json\Json::decode($row), \ArrayObject::ARRAY_AS_PROPS);
           }
        } 
         
        parent::populateValues($data);
    }

}