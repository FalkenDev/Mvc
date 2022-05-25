<?php

namespace App\Entity;

use App\Repository\BibliotekRepository;
use Doctrine\ORM\Mapping as ORM;

/** @SuppressWarnings(PHPMD) */
#[ORM\Entity(repositoryClass: BibliotekRepository::class)]
class Bibliotek
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    /** @phpstan-ignore-next-line */
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $titel;

    #[ORM\Column(type: 'integer')]
    private $isbn;

    #[ORM\Column(type: 'string', length: 255)]
    private $forfattare;

    #[ORM\Column(type: 'string', length: 255)]
    private $urlbild;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitel(): ?string
    {
        return $this->titel;
    }

    public function setTitel(string $titel): self
    {
        $this->titel = $titel;

        return $this;
    }

    public function getIsbn(): ?int
    {
        return $this->isbn;
    }

    public function setIsbn(int $isbn): self
    {
        $this->isbn = $isbn;

        return $this;
    }

    public function getForfattare(): ?string
    {
        return $this->forfattare;
    }

    public function setForfattare(string $forfattare): self
    {
        $this->forfattare = $forfattare;

        return $this;
    }

    public function getUrlbild(): ?string
    {
        return $this->urlbild;
    }

    public function setUrlbild(string $urlbild): self
    {
        $this->urlbild = $urlbild;

        return $this;
    }
}
