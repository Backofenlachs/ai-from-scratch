<?php

namespace App\Neural;

use InvalidArgumentException;

class NeuralNetwork {
    private int $pass = 0;

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
        $log = [];

        foreach($this->neurons as $index => $neuron) {
            $outputs[] = $neuron->calculate($inputs);
            
            $log[] = sprintf("[NN] pass=%d layer=%d neuron=%d net=%f out=%f", $this->pass, 0, $index, $neuron->net, $neuron->output);
        }

        $this->pass++;

        return ['outputs' => $outputs, 'log' => $log];
    }
}