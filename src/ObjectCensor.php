<?php

namespace Censor;

use Censor\classes\TextCensor;
use Censor\classes\WordCensor;

class ObjectCensor extends AbstractCensor
{
    public function __invoke(array $censoredWords, string $text) : string
    {
        $wordCensor = new WordCensor($censoredWords);
        $textCensor = new TextCensor($text);

        return $textCensor->censorWordsFromText($wordCensor);
    }
}