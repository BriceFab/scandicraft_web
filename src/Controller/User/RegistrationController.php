<?php

namespace App\Controller\User;

use App\Classes\EnumFlash;
use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use App\Security\EmailVerifier;
use Exception;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;

class RegistrationController extends AbstractController
{
    private $emailVerifier;
    private $translator;

    public function __construct(EmailVerifier $emailVerifier, TranslatorInterface $translator)
    {
        $this->emailVerifier = $emailVerifier;
        $this->translator = $translator;
    }

    /**
     * @Route("/inscription", name="app_register")
     * @Route("/register")
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return Response
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('accueil');
        }

        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            // generate a signed url and email it to the user
            $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
                (new TemplatedEmail())
                    ->from(new Address('test@email.fr', 'ScandiCraft email'))
                    ->to($user->getEmail())
                    ->subject('Please Confirm your Email')
                    ->htmlTemplate('email/confirmation_email.html.twig')
            );


            $this->addFlash(EnumFlash::INFO, $this->translator->trans('notif.confirm.email', ['email' => $user->getEmail()]));

            return $this->redirectToRoute('app_login');
        }

        return $this->render('pages/user/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/inscription/confirmation", name="app_verify_email")
     * @param Request $request
     * @param UserRepository $userRepository
     * @return Response
     * @throws Exception
     */
    public function verifyUserEmail(Request $request, UserRepository $userRepository): Response
    {
        if (!$request->query->has('username')) {
            throw new Exception("bad token");
        }

        $user = $userRepository->findOneBy(['username' => $request->query->get('username')]);
        if (!$user) {
            throw new Exception("bad token");
        }

        try {
            $hasVerified = $this->emailVerifier->handleEmailConfirmation($request, $user);

            if ($hasVerified) {
                $this->addFlash(EnumFlash::SUCCESS, 'Votre email a été vérifiée avec succès. Vous pouvez vous connecter !');
            } else {
                $this->addFlash(EnumFlash::WARNING, 'Votre email a déjà été vérifiée.');
            }
        } catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash(EnumFlash::ERROR, $exception->getReason());

            return $this->redirectToRoute('app_register');
        }

        return $this->redirectToRoute('app_login');
    }
}
