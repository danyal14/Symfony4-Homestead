<?php

namespace App\Controller\API;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use App\Entity\Company;

class CompanyApiController extends FOSRestController
{

    /**
     * @Route("/api/companies", name="api_list_companies")
     */
    public function getCompaniesAction()
    {
        $company = $this->getDoctrine()
            ->getRepository(Company::class)
            ->findAll();
        // get data, in this case list of users.
        $view = $this->view($company, 200)
            ->setTemplate("MyBundle:Users:getUsers.html.twig")
            ->setTemplateVar('users')
        ;

        return $this->handleView($view);
    }
}