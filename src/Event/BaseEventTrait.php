<?php

namespace AuditLog\Event;

/**
 * Implements most of the methods of the EventInterface.
 */
trait BaseEventTrait {

    /**
     * Global transaction id.
     *
     * @var string
     */
    protected $transactionId;

    /**
     * Entity primary key.
     *
     * @var mixed
     */
    protected $id;

    /**
     * Repository name.
     *
     * @var string
     */
    protected $source;

    /**
     * Parent repository name.
     *
     * @var string
     */
    protected $parentSource;

    /**
     * Time of event.
     *
     * @var string
     */
    protected $timestamp;

    /**
     * Extra information to describe the event.
     *
     * @var array
     */
    protected $meta = [];

    /**
     * The array of changed properties for the entity.
     *
     * @var array
     */
    protected $changed;

    /**
     * The array of original properties before they got changed.
     *
     * @var array
     */
    protected $original;

    /**
     * Returns the global transaction id in which this event is contained.
     *
     * @return string
     */
    public function getTransactionId() {
        return $this->transactionId;
    }

    /**
     * Returns the id of the entity that was created or altered.
     *
     * @return mixed
     */
    public function getId() {
        if (is_array($this->id) && count($this->id) === 1) {
            return current($this->id);
        }
        return $this->id;
    }

    /**
     * Returns the repository name in which the entity is.
     *
     * @return string
     */
    public function getSourceName() {
        return $this->source;
    }

    /**
     * Returns the repository name that triggered this event.
     *
     * @return string
     */
    public function getParentSourceName() {
        return $this->parentSource;
    }

    /**
     * Sets the name of the repository taht trigered this event.
     *
     * @param string $source The repository name
     * @return void
     */
    public function setParentSourceName($source) {
        $this->parentSource = $source;
    }

    /**
     * Returns the time string in which this change happened.
     *
     * @return string
     */
    public function getTimestamp() {
        return $this->timestamp;
    }

    /**
     * Returns an array with meta information that can describe this event.
     *
     * @return array
     */
    public function getMetaInfo() {
        return $this->meta;
    }

    /**
     * Sets the meta information that can describe this event.
     *
     * @param array $meta The meta information to attach to the event
     * @return void
     */
    public function setMetaInfo($meta) {
        $this->meta = $meta;
    }

    /**
     * Returns an array with the properties and their values before they got changed.
     *
     * @return array
     */
    public function getOriginal() {
        return $this->original;
    }

    /**
     * Sets the name of the repository taht trigered this event.
     *
     * @param array $original The repository name
     * @return void
     */
    public function setOriginal($original) {
        $this->original = $original;
    }

    /**
     * Returns an array with the properties and their values as they were changed.
     *
     * @return array
     */
    public function getChanged() {
        return $this->changed;
    }

    /**
     * Sets the changed of the repository taht trigered this event.
     *
     * @param array $changed The repository name
     * @return void
     */
    public function setChanged($changed) {
        $this->changed = $changed;
    }

}
