<?php

namespace VideoGame\Controller;

use VideoGame\Entity\Sequence;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Sequence controller.
 *
 * @Route("admin/sequences")
 */
class SequenceController extends Controller
{
    /**
     * Lists all sequence entities.
     *
     * @Route("/", name="admin_sequences_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sequences = $em->getRepository('VideoGameBundle:Sequence')->findAll();

        return $this->render('sequence/index.html.twig', array(
            'sequences' => $sequences,
        ));
    }

    /**
     * Creates a new sequence entity.
     *
     * @Route("/new", name="admin_sequences_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $sequence = new Sequence();
        $form = $this->createForm('VideoGame\Form\SequenceType', $sequence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sequence);
            $em->flush();

            return $this->redirectToRoute('admin_sequences_show', array('id' => $sequence->getId()));
        }

        return $this->render('sequence/new.html.twig', array(
            'sequence' => $sequence,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a sequence entity.
     *
     * @Route("/{id}", name="admin_sequences_show")
     * @Method("GET")
     */
    public function showAction(Sequence $sequence)
    {
        $deleteForm = $this->createDeleteForm($sequence);

        return $this->render('sequence/show.html.twig', array(
            'sequence' => $sequence,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing sequence entity.
     *
     * @Route("/{id}/edit", name="admin_sequences_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Sequence $sequence)
    {
        $deleteForm = $this->createDeleteForm($sequence);
        $editForm = $this->createForm('VideoGame\Form\SequenceType', $sequence);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_sequences_edit', array('id' => $sequence->getId()));
        }

        return $this->render('sequence/edit.html.twig', array(
            'sequence' => $sequence,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a sequence entity.
     *
     * @Route("/{id}", name="admin_sequences_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Sequence $sequence)
    {
        $form = $this->createDeleteForm($sequence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($sequence);
            $em->flush();
        }

        return $this->redirectToRoute('admin_sequences_index');
    }

    /**
     * Creates a form to delete a sequence entity.
     *
     * @param Sequence $sequence The sequence entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Sequence $sequence)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_sequences_delete', array('id' => $sequence->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
