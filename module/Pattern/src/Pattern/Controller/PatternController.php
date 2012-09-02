<?php

namespace Pattern\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Doctrine\ORM\EntityManager;

class PatternController extends AbstractActionController
{
    /**
     * @var Doctrine\ORM\EntityManager
     */
    protected $em;

    public function setEntityManager(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getEntityManager()
    {
        if (null === $this->em) {
            // doctrine.entitymanager.orm_default
            $this->em = $this->getServiceLocator()
                             ->get('Doctrine\ORM\EntityManager');
        }

        return $this->em;
    }

    public function indexAction()
    {
        return new ViewModel(array());
    }
}