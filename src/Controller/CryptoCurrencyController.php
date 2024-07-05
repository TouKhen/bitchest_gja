<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class CryptoCurrencyController extends AbstractController
{
    #[Route('/crypto/currency', name: 'app_crypto_currency')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/CryptoCurrencyController.php',
        ]);
    }
}
