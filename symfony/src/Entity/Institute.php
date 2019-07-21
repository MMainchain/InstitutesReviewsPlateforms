<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InstituteRepository")
 */
class Institute
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
    private $label;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PlatformRate", mappedBy="institute", orphanRemoval=true)
     */
    private $platformRates;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Review", mappedBy="institute", orphanRemoval=true)
     */
    private $reviews;

    public function __construct()
    {
        $this->platformRates = new ArrayCollection();
        $this->reviews = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return Collection|PlatformRate[]
     */
    public function getPlatformRates(): Collection
    {
        return $this->platformRates;
    }

    public function addPlatformRate(PlatformRate $platformRate): self
    {
        if (!$this->platformRates->contains($platformRate)) {
            $this->platformRates[] = $platformRate;
            $platformRate->setInstitute($this);
        }

        return $this;
    }

    public function removePlatformRate(PlatformRate $platformRate): self
    {
        if ($this->platformRates->contains($platformRate)) {
            $this->platformRates->removeElement($platformRate);
            // set the owning side to null (unless already changed)
            if ($platformRate->getInstitute() === $this) {
                $platformRate->setInstitute(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Review[]
     */
    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function addReview(Review $review): self
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews[] = $review;
            $review->setInstitute($this);
        }

        return $this;
    }

    public function removeReview(Review $review): self
    {
        if ($this->reviews->contains($review)) {
            $this->reviews->removeElement($review);
            // set the owning side to null (unless already changed)
            if ($review->getInstitute() === $this) {
                $review->setInstitute(null);
            }
        }

        return $this;
    }
}
