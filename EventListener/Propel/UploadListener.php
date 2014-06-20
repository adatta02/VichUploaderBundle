<?php

namespace Vich\UploaderBundle\EventListener\Propel;

use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * UploadListener
 *
 * Handles file uploads.
 *
 * @author Kévin Gomez <contact@kevingomez.fr>
 */
class UploadListener extends BaseListener
{
    /**
     * The events the listener is subscribed to.
     *
     * @return array The array of events.
     */
    public static function getSubscribedEvents()
    {
        return array(
            'propel.pre_insert' => 'onUpload',
            'propel.pre_update' => 'onUpload',
        );
    }

    /**
     * Update the file and file name if necessary.
     *
     * @param GenericEvent $event The event.
     */
    public function onUpload(GenericEvent $event)
    {
        $object = $this->adapter->getObjectFromArgs($event);
        $this->handler->upload($object, $this->mapping);
    }
}