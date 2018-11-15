<?php

namespace Censor;

class LoopLessCensor extends AbstractCensor
{
    public function __invoke(array $censoredWords, string $text) : string
    {
        if (count($censoredWords) == 1) {
            return $this->censorWord($censoredWords[0], $text);
        } elseif (count($censoredWords) == 0) {
            return $text;
        } else {
            $censoredWord = array_pop($censoredWords);
            $text = $this->censorWord($censoredWord, $text);
            return $this->__invoke($censoredWords, $text);
        }
    }

    protected function censorWord (string $word, string $text) : string
    {
        $asterisks  = str_repeat("*", strlen($word));
        $pattern    = '/\b' .$word. '\b/i';

        $replaced_text = preg_replace($pattern, $asterisks, $text);
        return $replaced_text;
    }
}