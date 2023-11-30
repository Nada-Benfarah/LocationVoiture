<?php

namespace App\Form;


use Symfony\Component\Form\Extension\Core\Type\F;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use function Sodium\add;

class VoitureForm extends AbstractType
{
 public function buildForm(FormBuilderInterface $builder, array $options)
 {
     $builder->add('serie', TextType::class)
         ->add('DateMiseEnMarche', DateType::class)
         ->add('modele', TextType::class)
  ->add('PrixJour',NumberType::class);
 }
 public function getName(){
     return "Voiture";
 }
}