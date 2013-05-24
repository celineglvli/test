<?php
namespace Voyage\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Voyage\Model\Voyage;
use Voyage\Form\VoyageForm;

class VoyageController extends AbstractActionController
{

    protected $voyageTable;
    public function indexAction()
    {
        return new ViewModel(array(
            'voyages' => $this->getVoyageTable()->fetchAll(),
        ));
    }

    public function addAction()
    {
        $form = new VoyageForm();
        $form->get('submit')->setValue('Ajouter');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $voyage = new Voyage();
            $form->setInputFilter($voyage->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $voyage->exchangeArray($form->getData());
                $this->getVoyageTable()->saveVoyage($voyage);
                // Redirect to list of voyages
                return $this->redirect()->toRoute('voyage');
            }
        }
        return array('form' => $form);
    }

    public function editAction()
    {
    }

    public function deleteAction()
    {
    }

    public function getVoyageTable()
    {
        if (!$this->voyageTable) {
            $sm = $this->getServiceLocator();
            $this->voyageTable = $sm->get('Voyage\Model\VoyageTable');
        }
        return $this->voyageTable;
    }
}