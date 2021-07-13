<?php

namespace App\Form;

use App\Entity\Products;
//use Doctrine\DBAL\Types\TextType;
//use MongoDB\BSON\Regex;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints as Assert;

class ProductsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('productname', TextType::class,[
                'help'=>'Vous devez rentrer le nom du produit ici',
                'label' => 'Nom du produit',
                'attr'=>[
                    'placeholder'=>'Produit',
                ],
                'constraints'=>[
                    new Regex([
                        'pattern'=>'/^[A-Za-zéèàçâêûîôäëïüö\'\_\-\s]+$/',
                        'message'=>'Caractère(s) non valide(s)'
                    ]),
                ]
            ])
            ->add('categoryid', NumberType::class,[
                'help'=>'Vous devez rentrer l\'id ici',
                'label'=> 'Catégorie id',
                'constraints'=>[ new Assert\Range([
                    'min'=>'1',
                    'max'=>'999',
                    'minMessage'=>'Votre Id doit etre posistif ou ne pas depasser 999',
                    'maxMessage'=>'Votre Id doit etre posistif ou ne pas depasser 999'
                ]),
                ]
            ])
            ->add('quantityperunit')
            ->add('unitprice')
            ->add('unitsinstock')
            ->add('unitsonorder')
            ->add('reorderlevel')
            ->add('discontinued')
            ->add('supplierid')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Products::class,
        ]);
    }
}
