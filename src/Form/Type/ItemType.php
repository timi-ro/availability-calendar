<?php


namespace App\Form\Type;


use App\Entity\Activity;
use App\Entity\Item;
use App\Entity\Meal;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('flightInfo', TextType::class)
            ->add('meal', EntityType::class, [
                // looks for choices from this entity
                'class' => Meal::class,
                'choice_label' => function ($meal) {
                    return $meal->getLabel();
                },
            ])
            ->add('activities', EntityType::class, [
                // looks for choices from this entity
                'class' => Activity::class,
                'choice_label' => function ($activity) {
                    return $activity->getLabel();
                },
                // uses the User.username property as the visible option string
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('save', SubmitType::class)
        ;

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Item::class,
        ]);
    }
}