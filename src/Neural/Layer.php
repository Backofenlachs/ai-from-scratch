<?php


namespace App\Neural;


use InvalidArgumentException;

class Layer {
    public array $neurons;

    public function __construct(
        public int $inputSize,
        public int $neuronCount, 
        public $neuronClass = Neuron::class
    ) {
        if ($neuronCount < 1) {
            throw new InvalidArgumentException('Neural network requires at leas one neuron');
        }

        $this->neurons = [];

        for($i = 0; $i<$neuronCount; $i++) {
            $bias = 0.5;
            $newNeuron = new $neuronClass($bias);
            $newNeuron->generateRandomWeights($inputSize);
            
            $this->neurons[] = $newNeuron;
        }


    }

    public function forward(array $inputs): array {
        $outputs = [];

        foreach($this->neurons as $neuron) {
            $outputs[] = $neuron->calculate($inputs);
        }

        return $outputs;
    }

    public function getOutputSize() {
        return count($this->neurons);
    }
 
}