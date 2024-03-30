<?php

namespace App\Traits;

use App\Utils\CodeBlockRenderer;
use League\CommonMark\Extension\CommonMark\Node\Block\FencedCode;
use League\CommonMark\GithubFlavoredMarkdownConverter;

trait MarkdownTrait
{
    public function markdown($column)
    {
        $markdown = new GithubFlavoredMarkdownConverter([
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
        ]);
        $markdown->getEnvironment()->addRenderer(FencedCode::class, new CodeBlockRenderer());

        return $markdown->convert($this->$column);
    }
}
