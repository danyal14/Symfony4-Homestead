<?php

namespace App\Controller;

use App\Entity\Company;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class CompanyController extends Controller
{
    /**
     * @Route("/company", name="company")
     */
    public function index()
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to your action: index(EntityManagerInterface $em)
        $em = $this->getDoctrine()->getManager();

        $company = new Company();
        $company->setName('ABS');
        $company->setStreet('ABC Street');
        $company->setPhone('+4500110011');
        $company->setZip('2200');
        $company->setWebsite('http://girhub.com/danyal14');
        
        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($company);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new Response('Saved new company with id '.$company->getId());
        // replace this line with your own code!
        // return $this->render('@Maker/demoPage.html.twig', [ 'path' => str_replace($this->getParameter('kernel.project_dir').'/', '', __FILE__) ]);
    }

    /**
     * @Route("/company/{id}", name="company_show")
     */
    public function showAction($id)
    {
        $company = $this->getDoctrine()
            ->getRepository(Company::class)
            ->find($id);

        if (!$company) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return new Response('Check out this great company: '.$company->getName());

        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $company]);
    }
}
