<?php

namespace Censor\classes;

class WordCensor
{
    /**
     * @var array
     */
    protected $censoredWords = [];

    public function __construct(array $censoredWords)
    {
        $this->censoredWords = $censoredWords;
    }

    /**
     * @return array
     */
    public function getCensoredWords(): array
    {
        return $this->censoredWords;
    }

    /**
     * @param array $censoredWords
     */
    public function setCensoredWords(array $censoredWords): void
    {
        $this->censoredWords = $censoredWords;
    }
}