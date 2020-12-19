<?php


namespace App\Controller;


use App\Entity\Item;
use App\Service\ItemManager;
use App\Form\Type\ItemType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AvailabilityController extends AbstractController
{
    /**
     * @Route("/booking")
     * @param Request $request
     * @param ItemManager $itemManager
     * @return Response
     */
    public function viewAction(Request $request, ItemManager $itemManager): Response
    {
        $roomId = 6;
        $item   = 'registrations';

        $result = $itemManager->getItemsInfo($item, $roomId);

        $dataItem = new Item();
        $form = $this->createForm(ItemType::class, $dataItem);
        $form->handleRequest($request);
//        dump($form);die;

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($data);
            $entityManager->flush();

            return $this->redirectToRoute('app_availability_success');
        }

        return $this->render('booking.html.twig', [
            'registrations' => $result,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/success")
     */
    public function successAction()
    {
        return $this->render('success.html.twig', [
            'successFlag' => true
        ]);
    }
}