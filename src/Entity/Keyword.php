<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\KeywordRepository")
 */
class Keyword
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="bigint")
     */
    private $count_all;

    /**
     * @ORM\Column(type="bigint")
     */
    private $count_minus;

    /**
     * @ORM\Column(type="bigint")
     */
    private $count_plus;

    /**
     * @ORM\Column(type="integer")
     */
    private $created;

    /**
     * @ORM\Column(type="integer")
     */
    private $provider;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCountAll(): ?int
    {
        return $this->count_all;
    }

    public function setCountAll(int $count_all): self
    {
        $this->count_all = $count_all;

        return $this;
    }

    public function getCountMinus(): ?int
    {
        return $this->count_minus;
    }

    public function setCountMinus(int $count_minus): self
    {
        $this->count_minus = $count_minus;

        return $this;
    }

    public function getCountPlus(): ?int
    {
        return $this->count_plus;
    }

    public function setCountPlus(int $count_plus): self
    {
        $this->count_plus = $count_plus;

        return $this;
    }

    public function getCreated(): ?int
    {
        return $this->created;
    }

    public function setCreated(int $created): self
    {
        $this->created = $created;

        return $this;
    }

    public function getProvider(): ?int
    {
        return $this->provider;
    }

    public function setProvider(int $provider): self
    {
        $this->provider = $provider;

        return $this;
    }
}
