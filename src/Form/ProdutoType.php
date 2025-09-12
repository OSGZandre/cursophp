<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProdutoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameProduto', TextType::class, [
                'label' => 'Nome do Produto',
            ])
            ->add('preco', NumberType::class, [
                'label' => 'Preço',
                'scale' => 2,
                'required' => false,
            ])
            ->add('estoque', NumberType::class, [
                'label' => 'Estoque',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([]);
    }
}
