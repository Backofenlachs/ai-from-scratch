<?php

namespace App\Neural;

use InvalidArgumentException;

class Neuron {
    // very important for backpropagation analisys later
    public float $net = 0.0; 
    public float $output = 0.0;

    public function __construct(
        private array $weights,
        private float $bias = 0.0
    ) {}

    public function calculate(array $inputs): float {
        if (count($inputs) !== count($this->weights)) {
            throw new InvalidArgumentException('Input count must match weight count.');
        }

        $this->net = $this->bias;

        foreach($inputs as $index => $input) {
            $this->net += $input * $this->weights[$index];
        }


        $this->output = $this->sigmoid($this->net);
        return $this->output;
    }

    private function sigmoid(float $value): float {
        return 1 / (1 + exp(-$value));
    }
}