<?php

namespace App\Adapters;

use App\ProviderApiRequests\FirstProviderApiRequest;
use App\ProviderApiRequests\SecondProviderApiRequest;

class TodoListAdapter
{
    private FirstProviderApiRequest $firstProviderApiRequest;
    private SecondProviderApiRequest $secondProviderApiRequest;

    public function __construct(FirstProviderApiRequest $firstProviderApiRequest, SecondProviderApiRequest $secondProviderApiRequest)
    {
        $this->firstProviderApiRequest = $firstProviderApiRequest;
        $this->secondProviderApiRequest = $secondProviderApiRequest;
    }

    public function getMergedFormattedTodos()
    {
        $firstProviderTodos = $this->firstProviderApiRequest->getFormattedTodos();
        $secondProviderTodos = $this->secondProviderApiRequest->getFormattedTodos();

        return array_merge($firstProviderTodos, $secondProviderTodos);
    }
}
