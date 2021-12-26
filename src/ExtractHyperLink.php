<?php

namespace ExtractHyperLink;

class ExtractHyperLink
{
    private $context;
    public $allowedTags = "<p><i><br><em><strong><b>";
    public $defaultRegex = '#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#';

    public function __construct(string $context)
    {
        $this->context = $context;
    }


    public function output(): string
    {
        preg_match_all($this->defaultRegex, $this->context, $match);

        $sentences = explode('</a>', $this->context);

        $outputText = '';
        foreach ($sentences as $key => $sentence) {

            if (isset($match[0][$key])) {

                $outputText .= $sentence . "(" . $match[0][$key] . ")";
            } else {
                $outputText .= $sentence;
            }
        }

        return strip_tags($outputText, $this->allowedTags);
    }
}
