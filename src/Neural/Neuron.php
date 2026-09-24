<?php

namespace App\Neural;

use Exception;
use InvalidArgumentException;

class Neuron {
    // very important for backpropagation analisys later
    private array $inputs;
    public function getInputs(): array { return $this->inputs; }
    
    private float $net = 0.0; 
    public function getNet(): float { return $this->net; }

    private float $output = 0.0;
    public function getOutputs(): float { return $this->output; }

    private array $weights = [];
    public function getWeights(): array { return $this->weights; }
    public function getBias(): float { return $this->bias; }

    public function __construct(
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

    public function generateRandomWeights(int $count): array {
        if ($count <= 0) {
            throw new InvalidArgumentException("[Neuron] weight count must be greater than zero");
        }

        if ($this->weights !== []) {
            throw new Exception('[Neuron] weights already set');
        }

        $randWeights = [];
        for($i=0; $i<$count; $i++) {
            $randWeights[] = random_int(-9, 9)/10;
        }
        
        $this->weights = $randWeights;
        return $randWeights;
    }

    private function sigmoid(float $value): float {
        return 1 / (1 + exp(-$value));
    }


}