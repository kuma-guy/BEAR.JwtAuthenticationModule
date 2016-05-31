<?php

namespace BEAR\JwtAuth\Extractor;

use BEAR\JwtAuth\SymmetricJwtAuthModule;
use Ray\Di\Injector;

class QueryParameterTokenExtractorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldExtractToken()
    {
        $_GET['token'] = 'example_token';
        $tokenExtractor = (new Injector(new SymmetricJwtAuthModule('HS256', 86400, 'example_secret')))->getInstance(TokenExtractorInterface::class, 'query');

        $token = $tokenExtractor->extract();
        $this->assertSame('example_token', $token);
    }

    /**
     * @test
     */
    public function shouldReturnNullCharacter()
    {
        $_GET['invalid_key'] = 'example_token';
        $tokenExtractor = (new Injector(new SymmetricJwtAuthModule('HS256', 86400, 'example_secret')))->getInstance(TokenExtractorInterface::class, 'query');

        $token = $tokenExtractor->extract();
        $this->assertSame('', $token);
    }
}
