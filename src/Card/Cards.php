<?php

namespace App\Card;

// Card Class
class Cards
{
    public string $value;
    public string $suite;

    // Construct Value and Suite
    public function __construct(string $value, string $suits)
    {
        $this->value = $value;
        $this->suite = $suits;
        
    }

    // Get value function
    public function get_value() : string {
        return $this->value;
    }
    
    // Get suite function
    public function get_suite() : string {
        return $this->suite;
    }
}