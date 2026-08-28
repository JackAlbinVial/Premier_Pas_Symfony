<?php
namespace App\Form;

use App\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Name', TextType::class, ['label' => 'Nom de la voiture'])
            ->add('Description')
            ->add('MonthPrice', NumberType::class, ['label' => 'Prix mensuel'])
            ->add('DayPrice', NumberType::class, ['label' => 'Prix journalier'])
            ->add('Gearbox', ChoiceType::class, [
                'label'   => 'Boîte de vitesse',
                'choices' => [
                    'Manuelle'    => true,
                    'Automatique' => false,
                ],
            ])
            ->add('Places', ChoiceType::class, [
                'label'        => 'Nombre de places',
                'choices'      => range(1, 9, 1),
                'choice_label' => function ($choice) {
                    return $choice;
                },
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
