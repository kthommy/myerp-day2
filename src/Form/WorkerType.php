<?php

namespace App\Form;

use App\Entity\Job;
use App\Entity\Worker;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class WorkerType extends AbstractType
{
    /**
     * @var AuthorizationCheckerInterface
     */
    private $checker;
    
    /**
     * @param AuthorizationCheckerInterface $checker
     */
    public function __construct(AuthorizationCheckerInterface $checker)
    {
        $this->checker = $checker;
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $isManager = $this->checker->isGranted('ROLE_MANAGER');
        
        $builder
            ->add('lastName')
            ->add('firstName')
            ->add('job', EntityType::class, [
                'class' => Job::class,
                'choice_label' => 'title',
                'disabled' => !$isManager,
            ])
            ->add('workingTime', null, [
                'disabled' => !$isManager,
            ])
            ->add('startDate', null, [
                'widget' => 'single_text',
                'disabled' => !$isManager,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Worker::class,
            'label_format' => 'worker.field.%name%',
        ]);
    }
}
