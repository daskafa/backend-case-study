<?php

namespace App\Repositories;

use App\Interfaces\DeveloperTodoInterface;
use App\Models\DeveloperTodo;
use Exception;

class DeveloperTodoRepository implements DeveloperTodoInterface
{
    public function saveTodos(array $todos)
    {
        $developerTodoBulkInsert = DeveloperTodo::insert($todos);
        if (!$developerTodoBulkInsert) {
            throw new Exception('Developer todos could not be saved.');
        }
    }
}
