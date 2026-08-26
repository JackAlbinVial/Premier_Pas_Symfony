<?php
namespace App\Controller;

use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CarController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(CarRepository $carRepository): Response
    {
        $cars = $carRepository->findAll();

        return $this->render('car/index.html.twig', [
            'cars' => $cars,
        ]);
    }

    #[Route('/car/{id}', name: 'app_car')]
    public function car(CarRepository $carRepository, int $id): Response
    {
        $car = $carRepository->find($id);

        if (! $car) {
            return $this->redirectToRoute('app_home');
        }

        return $this->render('car/car.html.twig', [
            'car' => $car,
        ]);
    }
}
