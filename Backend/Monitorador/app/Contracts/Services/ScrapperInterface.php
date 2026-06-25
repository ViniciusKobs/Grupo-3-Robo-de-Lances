<?php

namespace App\Contracts\Services;

interface ScrapperInterface
{
    public function fetchPage(string $url): string;
}