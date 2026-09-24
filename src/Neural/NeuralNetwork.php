<?php

namespace App\Neural;

use InvalidArgumentException;

class NeuralNetwork {
    private int $pass = 0;

    public function __construct(
        private array $layers
    ) {
        if ($layers === []) {
            throw new InvalidArgumentException('Neural network requires at leas one layer');
        }

        foreach ($layers as $layer) {
            if (!$layer instanceof Layer) {
                throw new InvalidArgumentException('All layers must be instances of Layer');
            }
        }
    }

    /**
     * Forward pass:
     * The output of each layer becomes the input
     * of the following layer.
     */
    public function forward(array $inputs): array {
        $outputs = [];
        $log = [];

        $currentValues = $inputs;
        foreach($this->layers as $index => $layer) {
            $currentValues = $layer->forward($currentValues);
            
            $outputs[$index] = $currentValues;
            
            foreach($layer->neurons as $neuronIndex => $neuron){
                $log[] = sprintf(
                    "[NN] pass=%d layer=%d neuron=%d in=[%s] w=[%s] bias=%f net=%f out=%f",
                    $this->pass,
                    $index,
                    $neuronIndex,
                    implode(', ', array_map(fn($v) => number_format($v, 4), $neuron->getInputs())),
                    implode(', ', array_map(fn($v) => number_format($v, 4), $neuron->getWeights())),
                    $neuron->getBias(),
                    $neuron->getNet(),
                    $neuron->getOutputs()
                );
            }
        }

        $this->pass++;

        return ['outputs' => $outputs, 'log' => $log];
    }
}