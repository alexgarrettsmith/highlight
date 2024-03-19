<?php

declare(strict_types=1);

namespace Tempest\Highlight\Languages\Sql\Patterns;

use Tempest\Highlight\IsPattern;
use Tempest\Highlight\Pattern;
use Tempest\Highlight\PatternTest;
use Tempest\Highlight\Tokens\TokenType;

#[PatternTest(input: 'bar = "baz"', output: 'baz')]
#[PatternTest(input: 'bar = "ba

z"', output: 'ba

z')]
final readonly class SqlDoubleQuoteValuePattern implements Pattern
{
    use IsPattern;

    public function getPattern(): string
    {
        return '\"(?<match>(.|\n)*?)\"';
    }

    public function getTokenType(): TokenType
    {
        return TokenType::VALUE;
    }
}