<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', TextType::class, ['attr' => ['class' => 'form-control'],'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ])
                   
                ]])
        ->add('mobileno', NumberType::class, ['attr' => ['class' => 'form-control'],'constraints' => [
            new NotBlank([
                'message' => 'Please enter a password',
            ]),
            new Length([
                'min' =>10,
                'max' => 10,
                'minMessage' => 'Your password should be {{ limit }} characters',
                'maxMessage' => 'Your password should be {{ limit }} characters',
                // max length allowed by Symfony for security reasons
            ])
           
        ]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
