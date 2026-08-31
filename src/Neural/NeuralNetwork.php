<?php

namespace App\Neural;

use InvalidArgumentException;

class NeuralNetwork {

    public function __construct(
        private array $neurons
    ) {
        if (empty($neurons)) {
            throw new InvalidArgumentException('Neural network requires at leas one neuron');
        }
    }

    /** currently
     * input1 ─┬──> neuron1 ──> output1
     * input2 ─┤
     * input3 ─┘
     */
    public function forward(array $inputs): array {
        $outputs = [];

        foreach($this->neurons as $neuron) {
            $outputs[] = $neuron->calculate($inputs);
        }

        return $outputs;
    }
}