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
            $weights = $this->getWeights($inputSize);
            $bias = 0.5;

            $this->neurons[] = new $neuronClass($weights, $bias);
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

    private const WEIGHT_TEMPLATE = [0.5, -0.2, 0.8, -0.3, 0.3, 0.4, 0.5, 0.7, 0.8, 0.9];

    private function getWeights(int $count): array {
        if ($count > count(self::WEIGHT_TEMPLATE)) {
            throw new InvalidArgumentException(
                "Template has only " . count(self::WEIGHT_TEMPLATE) . " weights, got $count"
            );
        }

        return array_slice(self::WEIGHT_TEMPLATE, 0, $count);
    }   
}