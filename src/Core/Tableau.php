<?php

namespace App\Core;

use App\Core\Logger\LoggerInterface;

class Tableau implements \Countable, \ArrayAccess, \IteratorAggregate
{
    private $values;
    private $length;
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger,
                                array $values = [])
    {
        $this->values = $values;
        $this->setLength();
        $this->logger = $logger;
    }

    private function setLength()
    {
        $length = 0;
        while (isset($this->values[$length])) {
            $length++;
        }
        $this->length = $length;
    }

    public function push($arg): void
    {
        $this->logger->log('START Tableau::push');
        $this->values[$this->length] = $arg;
        $this->length++;
    }

    public function includes($search): bool
    {
        $this->logger->log('START Tableau::includes');
        for ($i = 0; $i < $this->length; $i++) {
            if ($search == $this->values[$i]) {
                return true;
            }
        }
        return false;
    }

    public function splice($offset): void
    {
        $this->logger->log('START Tableau::splice');
        if (!isset($this->values[$offset])) {
            $this->logger->error(404, 'Offset not found');
            throw new \OutOfRangeException();
        }

        for ($i = $offset; $i < $this->length; $i++) {
            if (isset($this->values[$i + 1])) {
                $this->values[$i] = $this->values[$i + 1];
            }
        }
        unset($this->values[$this->length - 1]);
        $this->length--;

        /* // une méthode qui marche tout à fait, en créant un nouveau tableau où on duplique tout sauf la valeur à retirer
        $newtab = [];
        $index = 0;
        for($i = 0 ; $i < $this->length ; $i++){
            if($offset != $i){
                $newtab[$index] = $this->values[$i];
                $index++;
            }
        }
        $this->values = $newtab;
        $this->length --;
        */
    }

    public function sort()
    {
        $this->logger->log('START Tableau::sort');
        //Insertion Sort
        /*
        a. On fait une boucle qui parcourt le tableau
        b. A chaque tour de cette boucle, on met la valeur de côté et on lance une nouvelle boucle qui va parcourir le tableau en sens inverse, en commençant par l'index juste avant celui où on se trouve actuellement, et jusqu'au début du tableau
        c. On vérifie que la valeur de la deuxième boucle existe bien, et si oui, on vérifie si la valeur de cette boucle est inférieur à la valeur de la première boucle mise de côté
        d. Si elle est inférieur, alors on prend la valeur de la seconde boucle pour la mettre "un cran plus loin" par rapport à l'index de la seconde boucle, et on assigne la valeur mise de côté à l'index actuel de la seconde boucl
        */
        for($x = 0; $x < $this->length; $x++) {
            $curVal = $this->values[$x];
            for($y = $x-1; $y >= 0; $y--) {
                $previous = $this->values[$y];
                if(isset($previous) && $previous > $curVal ) {
                    $this->values[$y+1] = $previous;
                    $this->values[$y] = $curVal; 
                } else {
                    break;
                }
            }
        }
    }
    
    public function count()
    {
        return $this->length;
    }

    public function offsetExists($offset)
    {
        return isset($this->values[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->values[$offset];
    }

    public function offsetSet($offset, $value)
    {
        $this->values[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->values[$offset]);
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->values);
    }
}





