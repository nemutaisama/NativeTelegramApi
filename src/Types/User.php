<?php

namespace tgbot\Api\Types;

use tgbot\Api\BaseType;
use tgbot\Api\InvalidArgumentException;
use tgbot\Api\TypeInterface;


/**
 * Class User
 * This object represents a Telegram user or bot.
 *
 * @package tgbot\Api\Types
 */
class User extends BaseType implements TypeInterface
{
    /**
     * Unique identifier for this user or bot
     *
     * @var int
     */
    protected $id;

    /**
     * User‘s or bot’s first name
     *
     * @var string
     */
    protected $first_name;

    /**
     * Optional. User‘s or bot’s last name
     *
     * @var string
     */
    protected $last_name;

    /**
     * Optional. User‘s or bot’s username
     *
     * @var string
     */
    protected $username;

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        if (is_numeric($id)) {
            $this->id = $id;
        } else {
            throw new InvalidArgumentException();
        }
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param string $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    public static function fromResponse($data)
    {
        $instance = new self();

        if (!isset($data['id'], $data['first_name'])) {
            throw new InvalidArgumentException();
        }
        $instance->setId($data['id']);
        $instance->setFirstName($data['first_name']);

        if (isset($data['last_name'])) {
            $instance->setLastName($data['last_name']);
        }
        if (isset($data['username'])) {
            $instance->setUsername($data['username']);
        }

        return $instance;
    }
}