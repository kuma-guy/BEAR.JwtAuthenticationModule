<?php

/**
 * This file is part of the BEAR.JwtAuthModule package.
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace BEAR\JwtAuth\Extractor;

interface TokenExtractorInterface
{
    public function extract() : string;
}
