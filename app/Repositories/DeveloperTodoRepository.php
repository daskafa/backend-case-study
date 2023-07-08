<?php

namespace App\Repositories;

use App\Interfaces\DeveloperTodoInterface;
use App\Models\DeveloperTodo;

class DeveloperTodoRepository implements DeveloperTodoInterface
{
    public function saveTodos(array $todos)
    {
        DeveloperTodo::insert($todos);
    }
}
