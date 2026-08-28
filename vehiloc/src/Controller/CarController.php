<?php
namespace App\Controller;

use App\Entity\Car;
use App\Form\CarType;
use App\Repository\CarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/car/{id}/delete', name: 'app_remove')]
    public function remove(EntityManagerInterface $carManager, int $id): Response
    {
        $car = $carManager->find(Car::class, $id);

        if (! $car) {
            return $this->redirectToRoute('app_home');
        }

        $carManager->remove($car);
        $carManager->flush();

        return $this->redirectToRoute('app_home');

    }

    #[Route('/new', name: 'app_add', methods: ['GET', 'POST'])]
    public function new (EntityManagerInterface $carManager, Request $request): Response
    {
        $car  = new Car();
        $form = $this->createForm(CarType::class, $car);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $car = $form->getData();

            $carManager->persist($car);
            $carManager->flush();

            return $this->redirectToRoute('app_car', ['id' => $car->getId()]);
        }

        return $this->render('car/add.html.twig', [
            'form' => $form,
        ]);
    }
}
