<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass=ItemRepository::class)
 */
class Item
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
    private $flightInfo;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Meal")
     * @ORM\JoinColumn(name="meal", referencedColumnName="id")
     */
    private $meal;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Activity", inversedBy="items")
     * @ORM\JoinColumn(name="activity", referencedColumnName="id")
     */
    private $activities;

    public function __construct()
    {
        $this->activities = new ArrayCollection();
    }

    public function getActivities(): Collection
    {
        return $this->activities;
    }

    public function addActivity(Activity $activity): self
    {
        if (!$this->activities->contains($activity)) {
            $this->activities[] = $activity;
        }
        return $this;
    }
    public function removeActivity(Activity $activity): self
    {
        if ($this->activities->contains($activity)) {
            $this->activities->removeElement($activity);
        }
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFlightInfo(): ?string
    {
        return $this->flightInfo;
    }

    public function setFlightInfo(string $flightInfo): self
    {
        $this->flightInfo = $flightInfo;

        return $this;
    }

    public function getMeal(): ? Meal
    {
        return $this->meal;
    }

    public function setMeal(? Meal $meal): self
    {
        $this->meal = $meal;

        return $this;
    }
}
