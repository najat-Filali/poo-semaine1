<?php

namespace App\Shop;


class Table implements ProductInterface {
    private $woodType;
    private $basePrice;
    private $stock;

    public function __construct(string $woodType, float $basePrice, int $stock) {
        $this->woodType = $woodType;
        $this->basePrice = $basePrice;
        $this->stock = $stock;
    }

    public function getLabel(): string
    {
        return $this->woodType . ' Table';
    }

    public function getPrice(): float
    {
        switch ($this->woodType) {
            case WoodType::OAK:
                return $this->basePrice * 1.5;
            case WoodType::CHIPBOARD:
                return $this->basePrice * 0.7;
            case WoodType::BASIQUE:
            default:
                return $this->basePrice;
            
        }
    }

    public function incrementStock(): void
    {
        $this->stock++;
    }

    public function decrementStock(): void
    {
        $this->stock--;
    }

    public function isAvailable(): bool
    {
        return $this->stock > 0;
    }

    public function isSame(ProductInterface $product): bool
    {
        if($product instanceof Table) {
            return $product->getLabel() == $this->getLabel();
        }

        return false;
    }
}



