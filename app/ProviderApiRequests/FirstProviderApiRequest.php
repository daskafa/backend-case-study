<?php

namespace App\ProviderApiRequests;

use App\Constants\ProviderConstants;
use App\Interfaces\ProviderAdaptorInterface;
use Exception;
use Illuminate\Support\Facades\Http;

class FirstProviderApiRequest implements ProviderAdaptorInterface
{
    private $providerUrl;

    public function __construct($providerUrl)
    {
        $this->providerUrl = $providerUrl;
    }

    public function getTodos()
    {
        $response = Http::get($this->providerUrl);

        if ($response->failed()) {
            throw new Exception('First provider api request failed.');
        }

        return $response->json();
    }

    public function getFormattedTodos()
    {
        $todos = $this->getTodos();

        $formattedTodos = [];
        foreach ($todos as $todo) {
            $formattedTodos[] = [
                ProviderConstants::FORMATTED_TODO_KEYS[0] => $todo['id'],
                ProviderConstants::FORMATTED_TODO_KEYS[1] => $todo['zorluk'],
                ProviderConstants::FORMATTED_TODO_KEYS[2] => $todo['sure'],
            ];
        }

        return $formattedTodos;
    }
}
