<?php

namespace App\Entity;

use Cassandra\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SexeRepository")
 */
class Sexe
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Client", mappedBy="sexe")
     */
    private $clients ;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection|Client[]
     */
    public function getClients(): Collection
    {
        return $this->clients;
    }

    public function addClient(Client $client): self
    {
        if(!$this->clients->contains($client)){
            $this->clients[] = $client;
            $client->setSexe($this);
        }
        return $this;
    }

    public function removeClient(Client $client): self
    {
        if($this->clients->contains($client)){
            $this->clients.removeElement($client);
            if($this->client->getSexe()===$this){
                $client->setSexe(null);
            }
        }
        return $this;
    }
    public function __toString(): string
    {
        // TODO: Implement __toString() method.
        return $this->libelle;
    }
}
