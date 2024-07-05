<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdminRepository::class)]
class Admin extends User
{


    #[ORM\Column(length: 255)]
    private ?string $username = null;



    #[ORM\Column(length: 255)]
    private ?string $name = null;





    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
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


    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }
}
