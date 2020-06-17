<?php

namespace App\Shop;


interface ProductInterface {
   

    public function getLabel() : string; 
    public function getPrice() : float; 
    public function isAvailable() : bool; 
    public function isSame(ProductInterface $product) : bool; 
    public function decrementStock() : void; 
    public function incrementStock() : void; 
    //public function getId() : int; 


}