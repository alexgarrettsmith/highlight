<?php

declare(strict_types=1);

namespace Languages\Twig\Patterns;

use PHPUnit\Framework\TestCase;
use Tempest\Highlight\Languages\Twig\Patterns\TwigTokenPattern;
use Tempest\Highlight\Tests\TestsPatterns;
use Tempest\Highlight\Tokens\TokenType;

class TwigRegexPatternTest extends TestCase
{
    use TestsPatterns;

    public function test_pattern()
    {
        $this->assertMatches(
            pattern: new TwigTokenPattern("^{%", TokenType::TYPE),
            content: "{% extends 'admin/empty_base.html.twig' %}",
            expected: '{%',
        );

        $this->assertMatches(
            pattern: new TwigTokenPattern("}}$", TokenType::TYPE),
            content: "{{ path('app.logout') }}",
            expected: '}}',
        );
    }
}