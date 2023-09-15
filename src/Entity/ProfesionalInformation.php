<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ProfesionalInformationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfesionalInformationRepository::class)]
#[ApiResource]
class ProfesionalInformation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $professional = null;

    #[ORM\Column(length: 255)]
    private ?string $experience = null;

    #[ORM\Column(length: 255)]
    private ?string $skills = null;

    #[ORM\Column(length: 255)]
    private ?string $socia_networks = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getProfessional(): ?string
    {
        return $this->professional;
    }

    public function setProfessional(string $professional): static
    {
        $this->professional = $professional;

        return $this;
    }

    public function getExperience(): ?string
    {
        return $this->experience;
    }

    public function setExperience(string $experience): static
    {
        $this->experience = $experience;

        return $this;
    }

    public function getSkills(): ?string
    {
        return $this->skills;
    }

    public function setSkills(string $skills): static
    {
        $this->skills = $skills;

        return $this;
    }

    public function getSociaNetworks(): ?string
    {
        return $this->socia_networks;
    }

    public function setSociaNetworks(string $socia_networks): static
    {
        $this->socia_networks = $socia_networks;

        return $this;
    }
}
