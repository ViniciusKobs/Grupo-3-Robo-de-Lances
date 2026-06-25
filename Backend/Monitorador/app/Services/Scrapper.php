<?php

namespace App\Services;

use App\Contracts\Services\ScrapperInterface;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class Scrapper implements ScrapperInterface
{
    private const array DEFAULT_HEADERS = [
        'User-Agent'      => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0 Safari/537.36',
        'Accept'          => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
        'Accept-Language' => 'pt-BR,pt;q=0.9,en;q=0.8',
    ];

    public function fetchPage(string $url): string
    {
        try {
            $response = Http::withHeaders(self::DEFAULT_HEADERS)
                ->timeout(30)
                ->get($url);

            $response->throw();

            return $response->body();
        } catch (ConnectionException $e) {
            throw new RuntimeException("Não foi possível conectar à URL '$url'", previous: $e);
        } catch (RequestException $e) {
            throw new RuntimeException(
                "Falha ao buscar a página '$url': HTTP " . $e->response->status(),
                previous: $e
            );
        }
    }
}
