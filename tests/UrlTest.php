<?php declare(strict_types=1);

namespace TH\UrlModify;

use PHPUnit\Framework\TestCase;

final class UrlTest extends TestCase
{
    public function testAddParamToOrigin(): void
    {
        $url = 'http://example.com';
        $url = Url::modifyQuery($url, ['a'=>1]);
        self::assertSame('http://example.com?a=1', $url);
    }

    public function testAddParamToCompleteUrl(): void
    {
        $url = 'http://example.com/?a=1';
        $url = Url::modifyQuery($url, ['b'=>2]);
        self::assertSame('http://example.com/?a=1&b=2', $url);
    }

    public function testRemoveParamCompleteUrl(): void
    {
        $url = 'http://example.com/?a=1&b=2';
        $url = Url::modifyQuery($url, ['a'=>null]);
        self::assertSame('http://example.com/?b=2', $url);
    }

    public function testReplaceParamCompleteUrl(): void
    {
        $url = 'http://example.com/?a=1&b=2';
        $url = Url::modifyQuery($url, ['a'=>3]);
        self::assertSame('http://example.com/?a=3&b=2', $url);
    }

    public function testAddParamPathOnly(): void
    {
        $url = '/?a=1';
        $url = Url::modifyQuery($url, ['b'=>2]);
        self::assertSame('/?a=1&b=2', $url);
    }

    public function testRemoveParamPathOnly(): void
    {
        $url = '/?a=1&b=2';
        $url = Url::modifyQuery($url, ['a'=>null]);
        self::assertSame('/?b=2', $url);
    }

    public function testReplaceParamPathOnly(): void
    {
        $url = '/?a=1&b=2';
        $url = Url::modifyQuery($url, ['a'=>3]);
        self::assertSame('/?a=3&b=2', $url);
    }
}
