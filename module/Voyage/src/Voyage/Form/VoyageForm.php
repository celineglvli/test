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
            'name' => 'nom_voyages',
            'type' => 'Select',
            'options' => array(
                'label' => 'Etat de votre voyage',
                'empty_option' => 'Choisir..',
                'value_options' => array(
                             '0' => 'En cours',
                             '1' => 'Terminé',
                             '2' => 'Souhait',
                    ),
            ),
        ));

        $this->add(array(
            'name' => 'datedebut',
            'type' => 'Date',
            'options' => array(
                'label' => 'Date Début',
            ),
        ));

        $this->add(array(
            'name' => 'datefin',
            'type' => 'Date',
            'options' => array(
                'label' => 'Date Fin',
            ),
        ));

        $this->add(array(
            'name' => 'user_id',
            'type' => 'Hidden',
        ));

        $this->add(array(
            'name' => 'type_id',
            'type' => 'Hidden',
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
}