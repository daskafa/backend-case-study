<?php

namespace App\ProviderApiRequests;

use App\Constants\ProviderConstants;
use App\Interfaces\ProviderAdaptorInterface;
use Exception;
use Illuminate\Support\Facades\Http;

class SecondProviderApiRequest implements ProviderAdaptorInterface
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
            throw new Exception('Second provider api request failed.');
        }

        return $response->json();
    }

    public function getFormattedTodos()
    {
        $todos = $this->getTodos();

        $formattedTodos = [];
        foreach ($todos as $todo) {
            foreach ($todo as $key => $value) {
                $formattedTodos[] = [
                    ProviderConstants::FORMATTED_TODO_KEYS[0] => $key,
                    ProviderConstants::FORMATTED_TODO_KEYS[1] => $value['level'],
                    ProviderConstants::FORMATTED_TODO_KEYS[2] => $value['estimated_duration'],
                ];
            }
        }

        return $formattedTodos;
    }
}
