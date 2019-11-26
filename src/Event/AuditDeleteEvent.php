<?php

namespace AuditLog\Event;

use AuditLog\EventInterface;
use Datetime;

/**
 * Represents an audit log event for a newly deleted record.
 */
class AuditDeleteEvent implements EventInterface
{
    use BaseEventTrait;
    use SerializableEventTrait {
        basicSerialize as public jsonSerialize;
    }

    /**
     * Construnctor.
     *
     * @param string $transactionId The global transaction id
     * @param mixed $id The primary key record that got deleted
     * @param string $source The name of the source (table) where the record was deleted
     * @param array $original The original values the entity had before it got changed
     * @param string $parentSource The name of the source (table) that triggered this change
     */
    public function __construct($transactionId, $id, $source, $original, $parentSource = null)
    {
        $this->transactionId = $transactionId;
        $this->id = $id;
        $this->source = $source;
        $this->parentSource = $parentSource;
        $this->original = $original;
        $this->timestamp = (new DateTime())->format(DateTime::ATOM);
    }

    /**
     * Returns the name of this event type.
     *
     * @return string
     */
    public function getEventType()
    {
        return 'delete';
    }
}
