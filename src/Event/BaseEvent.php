<?php

namespace AuditLog\Event;

use AuditLog\EventInterface;
use DateTime;

/**
 * Represents a change in the repository where the list of changes can be
 * tracked as a list of properties and thier values.
 */
abstract class BaseEvent implements EventInterface
{
    use BaseEventTrait;
    use SerializableEventTrait;

    

    /**
     * Construnctor.
     *
     * @param string $transationId The global transaction id
     * @param mixed $id The primary key record that got deleted
     * @param string $source The name of the source (table) where the record was deleted
     * @param array $changed The array of changes that got detected for the entity
     * @param array $original The original values the entity had before it got changed
     */
    public function __construct($transactionId, $id, $source, $changed, $original)
    {
        $this->transactionId = $transactionId;
        $this->id = $id;
        $this->source = $source;
        $this->changed = $changed;
        $this->original = $original;
        $this->timestamp = (new DateTime())->format(DateTime::ATOM);
    }

    /**
     * Returns the name of this event type.
     *
     * @return string
     */
    abstract public function getEventType();

    /**
     * Returns he array to be used for encoding this object as json.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->basicSerialize();
    }
}
