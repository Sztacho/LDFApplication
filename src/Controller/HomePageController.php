<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomePageController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function __invoke(): Response
    {
        $articles = [
            [
                'id' => 1,
                'title' => 'Najciekawsze wydarzenia Lubelskich Dni Fantastyki',
                'excerpt' => 'Odkryj, co czeka na uczestników tegorocznej edycji...',
                'image' => 'https://www.festiwalfalkon.pl/assets/images/FB_IMG_1707079859444.jpg',
            ],
            [
                'id' => 2,
                'title' => 'Wywiad z gościem honorowym',
                'excerpt' => 'Zobacz, co do powiedzenia ma nasz specjalny gość...',
                'image' => 'https://www.festiwalfalkon.pl/assets/images/FB_IMG_1707079859444.jpg',
            ],
            [
                'id' => 3,
                'title' => 'Prelekcje i warsztaty',
                'excerpt' => 'Sprawdź harmonogram prelekcji i warsztatów...',
                'image' => 'https://www.festiwalfalkon.pl/assets/images/FB_IMG_1707079859444.jpg',
            ],
            [
                'id' => 4,
                'title' => 'Strefa gier planszowych',
                'excerpt' => 'Przyjdź i zagraj w najnowsze i klasyczne gry planszowe...',
                'image' => 'https://www.festiwalfalkon.pl/assets/images/FB_IMG_1707079859444.jpg',
            ],
            [
                'id' => 5,
                'title' => 'Cosplay na Lubelskich Dniach Fantastyki',
                'excerpt' => 'Zobacz najlepsze stroje i weź udział w konkursie...',
                'image' => 'https://www.festiwalfalkon.pl/assets/images/FB_IMG_1707079859444.jpg',
            ],
            [
                'id' => 6,
                'title' => 'Cosplay na Lubelskich Dniach Fantastyki',
                'excerpt' => 'Zobacz najlepsze stroje i weź udział w konkursie...',
                'image' => 'https://www.festiwalfalkon.pl/assets/images/FB_IMG_1707079859444.jpg',
            ],
        ];

        $gallery = [
            [
                'url' => 'https://www.festiwalfalkon.pl/assets/images/FB_IMG_1707079859444.jpg',
                'alt' => 'Zdjęcie z poprzedniej edycji - Cosplay',
            ],
            [
                'url' => 'https://www.festiwalfalkon.pl/assets/images/FB_IMG_1707079859444.jpg',
                'alt' => 'Zdjęcie z poprzedniej edycji - Warsztaty',
            ],
            [
                'url' => 'https://www.festiwalfalkon.pl/assets/images/FB_IMG_1707079859444.jpg',
                'alt' => 'Zdjęcie z poprzedniej edycji - Wystawcy',
            ],
            [
                'url' => 'https://www.festiwalfalkon.pl/assets/images/FB_IMG_1707079859444.jpg',
                'alt' => 'Zdjęcie z poprzedniej edycji - Prelekcja',
            ],
            [
                'url' => 'https://www.festiwalfalkon.pl/assets/images/FB_IMG_1707079859444.jpg',
                'alt' => 'Zdjęcie z poprzedniej edycji - Strefa gier',
            ],
            [
                'url' => 'https://www.festiwalfalkon.pl/assets/images/FB_IMG_1707079859444.jpg',
                'alt' => 'Zdjęcie z poprzedniej edycji - Konkurs cosplay',
            ],
            [
                'url' => 'https://www.festiwalfalkon.pl/assets/images/FB_IMG_1707079859444.jpg',
                'alt' => 'Zdjęcie z poprzedniej edycji - Publiczność',
            ],
            [
                'url' => 'https://www.festiwalfalkon.pl/assets/images/FB_IMG_1707079859444.jpg',
                'alt' => 'Zdjęcie z poprzedniej edycji - Wystawa',
            ],
        ];

        $categories = [
            [
                'id' => 1,
                'name' => 'Wydarzenia',
            ],
            [
                'id' => 2,
                'name' => 'Goście',
            ],
            [
                'id' => 3,
                'name' => 'Prelekcje',
            ],
            [
                'id' => 4,
                'name' => 'Warsztaty',
            ],
            [
                'id' => 5,
                'name' => 'Gry',
            ],
            [
                'id' => 6,
                'name' => 'Cosplay',
            ],
        ];

        $schedule = [
            ['time' => '10:00', 'activity' => 'Oficjalne otwarcie'],
            ['time' => '11:00', 'activity' => 'Prelekcja: Historia fantasy'],
            ['time' => '12:30', 'activity' => 'Warsztaty: Tworzenie kostiumów'],
            ['time' => '14:00', 'activity' => 'Panel dyskusyjny: Przyszłość gier RPG'],
            ['time' => '15:30', 'activity' => 'Konkurs cosplay'],
            ['time' => '17:00', 'activity' => 'Spotkanie z autorem: Andrzej Sapkowski'],
            ['time' => '18:30', 'activity' => 'Zamknięcie dnia'],
        ];

        $speakers = [
            [
                'name' => 'Andrzej Sapkowski',
                'bio' => 'Autor sagi o Wiedźminie, laureat wielu nagród literackich.',
                'image' => '/images/speakers/sapkowski.jpg',
            ],
            [
                'name' => 'Jacek Dukaj',
                'bio' => 'Pisarz science fiction, autor takich dzieł jak "Lód" i "Perfekcyjna niedoskonałość".',
                'image' => '/images/speakers/dukaj.jpg',
            ],
            [
                'name' => 'Anna Kańtoch',
                'bio' => 'Pisarka fantasy i science fiction, autorka cyklu "Przedksiężycowi".',
                'image' => '/images/speakers/kantoch.jpg',
            ],
        ];

        $tickets = [
            [
                'type' => 'Bilet jednodniowy',
                'description' => 'Dostęp do wszystkich wydarzeń jednego dnia.',
                'price' => '50 PLN',
                'link' => 'https://example.com/buy?ticket=oneday',
            ],
            [
                'type' => 'Bilet weekendowy',
                'description' => 'Dostęp do wszystkich wydarzeń przez cały weekend.',
                'price' => '120 PLN',
                'link' => 'https://example.com/buy?ticket=weekend',
            ],
            [
                'type' => 'Bilet VIP',
                'description' => 'Dostęp do wszystkich wydarzeń oraz spotkanie z gośćmi honorowymi.',
                'price' => '250 PLN',
                'link' => 'https://example.com/buy?ticket=vip',
            ],
        ];

        $location = [
            'name' => 'Centrum Kultury w Lublinie',
            'address' => 'ul. Peowiaków 12',
            'city' => '20-007 Lublin',
            'map_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2563.199878329275!2d22.56556331571583!3d51.24600567959839!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x472257b6f89ec7df%3A0x4cfa82b1197e89c6!2sCentrum%20Kultury%20w%20Lublinie!5e0!3m2!1spl!2spl!4v1620031795794!5m2!1spl!2spl',
        ];


        return $this->render('pages/homepage.html.twig', [
            'categories' => $categories,
            'articles' => $articles,
            'schedule' => $schedule,
            'speakers' => $speakers,
            'tickets' => $tickets,
            'location' => $location,
            'gallery' => $gallery,
        ]);
    }
}