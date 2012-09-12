<?php

namespace Kunstmaan\MediaPagePartBundle\Form\Type;

use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\UnexpectedTypeException;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Doctrine\Common\Collections\Collection;

/**
 * IdToMediaTransformer
 */
class IdToMediaTransformer implements DataTransformerInterface
{
    private $objectManager;
    private $currentValueContainer;

    /**
     * @param ObjectManager         $objectManager         The object manager
     * @param CurrentValueContainer $currentValueContainer The currentvaluecontainer
     */
    public function __construct(ObjectManager $objectManager, CurrentValueContainer $currentValueContainer)
    {
        $this->objectManager = $objectManager;
           $this->currentValueContainer = $currentValueContainer;
    }

    /**
     * {@inheritdoc}
     */
    public function transform($entity)
    {
        if (null === $entity || '' === $entity) {
            return '';
        }

        if (!is_object($entity)) {
            throw new UnexpectedTypeException($entity, 'object');
        }

        if ($entity instanceof Collection) {
            throw new \InvalidArgumentException('Expected an object, but got a collection. Did you forget to pass "multiple=true" to an entity field?');
        }

        $this->currentValueContainer->setCurrentValue($entity);

        return array("ent"=>$entity,
        "id" => $entity->getId());

    }

    /**
     * {@inheritdoc}
     */
    public function reverseTransform($key)
    {
        if ('' === $key || null === $key ) {
            return null;
        }

        if (!is_numeric($key)) {
            throw new UnexpectedTypeException($key, 'numeric');
        }

        if (!($entity = $this->objectManager->getRepository('KunstmaanMediaBundle:Media')->findOneById($key))) {
            throw new TransformationFailedException(sprintf('The entity with key "%s" could not be found', $key));
        }

        $this->currentValueContainer->setCurrentValue($entity);

        return $entity;
    }
}
