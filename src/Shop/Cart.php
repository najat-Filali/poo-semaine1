<?php

namespace App\Shop;


class Cart {
    /**
     * @var ProductInterface[]
     */
    private $products = [];
    private $totalPrice = 0;

    public function addToCart(ProductInterface $product):void {
        //Faire en sorte de rajouter le produit dans la liste des
        //produits. En vérifiant s'il est disponible, et en
        //décrémentant son stock au moment de l'ajouter.
        if( $product->isAvailable()){
            $this->products[]= $product; 
            $product->decrementStock(); 
            $this->updateTotalPrice();
        }
    }

    public function removeFromCart(ProductInterface $product):void {
        //Dégager le produit du panier en utilisant la méthode isSame
        //et une fois qu'on l'a viré, on ré-incrémente le stock
        for ($i=0; $i < count($this->products); $i++) { 
            if($product->isSame($this->products[$i])) {
                array_splice($this->products, $i, 1);
                $product->incrementStock();
                $this->updateTotalPrice();
                break;
            }
        }

    
    }

    public function getTotalPrice():float {
        //Faire en sorte de calculer le prix total des produits
        
        //Bonus : Faire que le prix soit "mis en cache" et recalculer
        //uniquement s'il y a lieu de le recalculer
        return $this->totalPrice;
    }

    private function updateTotalPrice() {
        $totalPrice = 0;
        foreach($this->products as $product) {
            $totalPrice += $product->getPrice();
        }
        $this->totalPrice = $totalPrice;
    }

}
