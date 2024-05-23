<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function __invoke(): Response
    {
        return $this->render('pages/homepage.html.twig');
    }

    #[Route('/blog', name: 'blog')]
    public function blog(): Response
    {
        return $this->render('pages/news.html.twig');
    }

    #[Route('/o-nas', name: 'app_about_us')]
    public function aboutUs(): Response
    {
        return $this->render('pages/aboutus.html.twig');
    }

    #[Route('/kontakt', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('pages/contact.html.twig');
    }

    #[Route('/program', name: 'app_program')]
    public function program(): Response
    {
        return $this->render('pages/program.html.twig');
    }
}
