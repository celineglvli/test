<?php
namespace Voyage\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

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