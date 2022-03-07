<?php

namespace App\Form;

use App\Entity\Vinyl;
use App\Entity\Categorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class VinylType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('mp3')
            ->add('title')
            ->add('artiste')
            ->add('annee')
            ->add('description')
            ->add('price')
            ->add('qte')
            ->add('mp3',FileType::class, [
                'mapped'=>false,
                'label'=>'extrait',
                'required'=>true,
                'constraints' => [
                    new File([
                    'maxSize'=>'20M',
                    'mimeTypes'=>[
                        'audio/mpeg',
                        'audio/mpeg3',
                        'audio/mp4',
                        'audio/mpaac',
                        'audio/x-mpeg3'
                        
                    ],
                    'mimeTypesMessage'=> 'Votre mp3 ne correspond pas '
                  ])
               ]
            ])
            ->add('image',FileType::class, [
                'mapped'=>false,
                'label'=>'pochette',
                'constraints' => [
                    new File([
                    'maxSize'=>'20M',
                    'mimeTypes'=>[
                        'image/jpeg',
                        'image/png',
                        'image/gif',
                        'image/webp',
                        'image/jpg'
                    ],
                    'mimeTypesMessage'=> 'Votre image dois etre en format jpg,png,webp,jpeg ou gif'
                  ])
               ]
            ])
            ->add('categorie', EntityType::class, [
                'class' => Categorie::class,
                'choice_label' => 'type',
                'choice_name' => ChoiceList::fieldName($this, 'id'),
                'choice_value' => ChoiceList::value($this, 'id'),
                'multiple' => true,
                'expanded' => true,
                'mapped' => false
            ])
            ->add('createdAt',HiddenType::class,[
                'mapped' => false
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vinyl::class,
            
        ]);
    }
}
