<?php

namespace App\Form;

use App\Entity\Bar;
use App\Entity\BarCategory;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class BarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('biere')
            ->add('password', RepeatedType::class, array(
                'required' => true,
                'type' => PasswordType::class,
                'invalid_message' => 'The password fields must match.',
                'first_options' => array('label' => 'New password'),
                'second_options' => array('label' => 'Confirm password'),
            ))
            ->add('barCategories', EntityType::class, [
                'class' => BarCategory::class,
                'multiple' => true,
                /*'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.id', 'ASC');
                },*/
                'choice_label' => 'name',
            ])
            ->add('save', SubmitType::class, [
                'attr' => ['class' => 'save'],
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bar::class,
        ]);
    }
}
