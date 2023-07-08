<?php

namespace App\Services;

use App\Repositories\DeveloperTodoRepository;

class DeveloperTodoService
{
    private DeveloperTodoRepository $developerTodoRepository;

    public function __construct(DeveloperTodoRepository $developerTodoRepository)
    {
        $this->developerTodoRepository = $developerTodoRepository;
    }

    public function saveTodos(array $todos)
    {
        $this->developerTodoRepository->saveTodos($todos);
    }
}
