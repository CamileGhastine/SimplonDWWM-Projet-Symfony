<?php

namespace App\Entity;

use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\BookingRepository;

/**
 * @ORM\Entity(repositoryClass=BookingRepository::class)
 */
class Booking
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $phone;

    /**
     * @ORM\Column(type="array")
     */
    private $concert = [];

    private $concert1 = 0;

    private $concert2 = 0;

    private $concert3 = 0;

    private $concert4 = 0;

    private $concert5 = 0;

    private $concert6 = 0;

    private $concert7 = 0;

    private $concert8 = 0;

    private $concert9 = 0;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="bookings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getConcert(): ?array
    {
        return $this->concert;
    }

    public function setConcert(array $concert): self
    {
        $this->concert = $concert;

        return $this;
    }

    public function getConcert1(): ?int
    {
        return $this->concert1;
    }

    public function setConcert1(?int $concert1): self
    {
        $this->concert1 = $concert1;

        return $this;
    }

    public function getConcert2(): ?int
    {
        return $this->concert2;
    }

    public function setConcert2(?int $concert2): self
    {
        $this->concert2 = $concert2;

        return $this;
    }

    public function getConcert3(): ?int
    {
        return $this->concert3;
    }

    public function setConcert3(?int $concert3): self
    {
        $this->concert3 = $concert3;

        return $this;
    }

    public function getConcert4(): ?int
    {
        return $this->concert4;
    }

    public function setConcert4(?int $concert4): self
    {
        $this->concert4 = $concert4;

        return $this;
    }

    public function getConcert5(): ?int
    {
        return $this->concert5;
    }

    public function setConcert5(?int $concert5): self
    {
        $this->concert5 = $concert5;

        return $this;
    }

    public function getConcert6(): ?int
    {
        return $this->concert6;
    }

    public function setConcert6(?int $concert6): self
    {
        $this->concert6 = $concert6;

        return $this;
    }

    public function getConcert7(): ?int
    {
        return $this->concert7;
    }

    public function setConcert7(?int $concert7): self
    {
        $this->concert7 = $concert7;

        return $this;
    }

    public function getConcert8(): ?int
    {
        return $this->concert8;
    }

    public function setConcert8(?int $concert8): self
    {
        $this->concert8 = $concert8;

        return $this;
    }

    public function getConcert9(): ?int
    {
        return $this->concert9;
    }

    public function setConcert9(?int $concert9): self
    {
        $this->concert9 = $concert9;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
