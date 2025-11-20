<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(
        Request $request,
        EntityManagerInterface $entityManager,
        MailerInterface $mailer
    ): Response {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Save to database
            $entityManager->persist($contact);
            $entityManager->flush();

            // Send email
            try {
                $email = (new Email())
                    ->from($contact->getEmail())
                    ->to('admin@example.com') // Change to your admin email
                    ->subject($contact->getSubject() ?: 'New Contact Form Submission')
                    ->html(sprintf(
                        '<h2>New Contact Form Submission</h2>
                        <p><strong>Name:</strong> %s</p>
                        <p><strong>Email:</strong> %s</p>
                        <p><strong>Subject:</strong> %s</p>
                        <p><strong>Message:</strong></p>
                        <p>%s</p>',
                        htmlspecialchars($contact->getName()),
                        htmlspecialchars($contact->getEmail()),
                        htmlspecialchars($contact->getSubject() ?? 'No subject'),
                        nl2br(htmlspecialchars($contact->getMessage()))
                    ));

                $mailer->send($email);

                $this->addFlash('success', 'Your message has been sent successfully!');
            } catch (\Exception $e) {
                $this->addFlash('warning', 'Your message was saved, but email delivery failed: ' . $e->getMessage());
            }

            return $this->redirectToRoute('app_contact');
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
