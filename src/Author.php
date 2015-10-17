<?php
namespace Bibliotheque;

use InvalidArgumentException;
use JsonSerializable;

class Author implements JsonSerializable
{
    protected $id;
    protected $name;
    protected $biography;

    public function __construct(array $data = [])
    {
        $id = array_key_exists('id', $data) ? $data['id'] : $this->id;
        $this->setId($id);

        $name = array_key_exists('name', $data) ? $data['name'] : $this->name;
        $this->setName($name);

        $biography = array_key_exists('biography', $data) ? $data['biography'] : $this->biography;
        $this->setBiography($biography);
    }

    /**
     * Getter for id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Setter for id
     *
     * @param string $id
     * @return self
     */
    public function setId($id)
    {
        $this->id = trim((string)$id);
        if (empty($this->id)) {
            $this->id = null;
        }

        return $this;
    }

    /**
     * Getter for name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Setter for name
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $name = trim((string)$name);
        if (empty($name)) {
            throw new InvalidArgumentException('Name cannot be empty');
        } elseif (strlen($name) > 100) {
            throw new InvalidArgumentException('Name must be less than 100 characters');
        }

        $this->name = $name;
        return $this;
    }

    /**
     * Getter for biography
     *
     * @return string
     */
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * Setter for biography
     *
     * @param string $biography
     * @return self
     */
    public function setBiography($biography)
    {
        $this->biography = trim((string)$biography);
        if (empty($this->biography)) {
            $this->biography = null;
        }

        return $this;
    }

    /**
     * Return the data as an array
     *
     * @return array
     */
    public function asArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'biography' => $this->getBiography(),
        ];
    }

    /**
     * make json_encode do the right thing
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->asArray();
    }
}
