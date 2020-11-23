<?php

namespace App\Form\TypeExtension;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormTypeExtensionInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @method iterable getExtendedTypes()
 */
class TextareaSizeExtension implements FormTypeExtensionInterface
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['attr']['rows'] = $options['rows'];
    }

    public function finishView(FormView $view, FormInterface $form, array $options)
    {

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'rows' => 10,
            ]);
    }

    /*
     * Since Symfony 4.2 getExtendedType() method is deprecated in favor of getExtendedTypes()
     * but you still need a dummy implementation of getExtendedType()
     */

    public function getExtendedType()
    {
        return '';
    }

    public static function getExtendedTypes(): iterable
    {
        return [TextareaType::class];

        /*
         * to alter EVERY Form type you can return [FormType::class]
         * as the inheritance system does its magic there
         */
    }

    public function __call($name, $arguments)
    {

    }
}