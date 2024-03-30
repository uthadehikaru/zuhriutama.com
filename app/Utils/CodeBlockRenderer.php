<?php

namespace App\Utils;

use League\CommonMark\Extension\CommonMark\Node\Block\FencedCode;
use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Util\HtmlElement;

class CodeBlockRenderer implements NodeRendererInterface
{
    public function render(Node $node, ChildNodeRendererInterface $childRenderer)
    {
        FencedCode::assertInstanceOf($node);

        $lines = '';
        $i = 1;
        foreach (preg_split('/\n/', $node->getLiteral()) as $code) { //** @phpstan-ignore-line */
            $lines .= new HtmlElement(
                'pre',
                ['data-prefix' => (string) $i++],
                new HtmlElement(
                    'code',
                    [],
                    $code,
                )
            );
        }

        return new HtmlElement(
            'div',
            ['class' => 'mockup-code'],
            $lines
        );
    }
}
