<?php

namespace App\Entity;

use App\Repository\BarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=BarRepository::class)
 */
class Bar
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
     // @Assert\Choice({"blonde", "brune", "Tokyo"})
    private $biere;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Type(
     *     type="string",
     *     message="Ton mot de passe : {{ value }} doit être de type : {{ type }}."
     * )
     */
    
    private $password;
    
    private $passwordConfirm;

    /**
     * @ORM\ManyToMany(targetEntity=BarCategory::class, mappedBy="bars")
     */
    private $barCategories;


    public function __construct()
    {
        $this->barCategories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBiere(): ?string
    {
        return $this->biere;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setBiere(string $biere): self
    {
        $this->biere = $biere;

        return $this;
    }

    public function setPassword(string $password/*, string $passwordConfirm*/): self
    {
        //if($password == $passwordConfirm){
            $this->password = $password;

            return $this;
        //}
    }

    /**
     * @return Collection|BarCategory[]
     */
    public function getBarCategories(): Collection
    {
        return $this->barCategories;
    }

    public function addBarCategory(BarCategory $barCategory): self
    {
        if (!$this->barCategories->contains($barCategory)) {
            $this->barCategories[] = $barCategory;
            $barCategory->addBar($this);
        }

        return $this;
    }

    public function removeBarCategory(BarCategory $barCategory): self
    {
        if ($this->barCategories->contains($barCategory)) {
            $this->barCategories->removeElement($barCategory);
            $barCategory->removeBar($this);
        }

        return $this;
    }
}
