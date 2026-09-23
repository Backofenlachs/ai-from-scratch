<?php

namespace App\Neural;

use InvalidArgumentException;

class Neuron {
    // very important for backpropagation analisys later
    private array $inputs;
    public function getInputs(): array { return $this->inputs; }
    
    private float $net = 0.0; 
    public function getNet(): float { return $this->net; }

    private float $output = 0.0;
    public function getOutputs(): float { return $this->output; }

    public function getWeights(): array { return $this->weights; }
    public function getBias(): float { return $this->bias; }

    public function __construct(
        private array $weights,
        private float $bias = 0.0
    ) {}

    public function calculate(array $inputs): float {
        if (count($inputs) !== count($this->weights)) {
            throw new InvalidArgumentException('Input count must match weight count.');
        }

        $this->inputs = $inputs;
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