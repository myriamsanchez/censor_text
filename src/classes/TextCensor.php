<?php

namespace Censor\classes;

class TextCensor
{
    /**
     * @var string
     */
    protected $text;
    /**
     * @var string
     */
    protected $censoredText;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function censorWordsFromText(WordCensor $wordCensor)
    {
        $this->censoredText = $this->text;

        foreach ($wordCensor->getCensoredWords() as $wordToCensor) {
            $asterisks  = str_repeat("*", strlen($wordToCensor));
            $pattern    = '/\b' .$wordToCensor. '\b/i';

            $this->censoredText = preg_replace($pattern, $asterisks, $this->censoredText);
        }
        return $this->censoredText;
    }
}