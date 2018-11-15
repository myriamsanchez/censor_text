<?php

namespace Censor;

class SimpleCensor extends AbstractCensor
{
    public function __invoke(array $censoredWords, string $text) : string
    {
        foreach ($censoredWords as $censoredWord) {
            $text = $this->censorWord($censoredWord, $text);
        }
       return $text;
    }

    protected function censorWord (string $word, string $text) : string
    {
        $asterisks  = str_repeat("*", strlen($word));
        $pattern    = '/\b' .$word. '\b/i';

        $replaced_text = preg_replace($pattern, $asterisks, $text);
        return $replaced_text;
    }
}
