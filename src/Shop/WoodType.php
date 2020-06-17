<?php 

namespace App\Shop; 

interface WoodType{
    // cette interface ici que pour contenir des constantes
    // on peut ensuite appeler un woodType qd on construit un objet de type ex : "Woodtype::Basique"
    const OAK = 'Oak'; 
    const BASIQUE = 'Basique'; 
    const CHIPBOARD ='Chipboard'; 


}