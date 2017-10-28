<?php

use App\Task;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;

class FunctionalTest extends TestCase
{
    use DatabaseTransactions;
    use InteractsWithDatabase;

    public function testTaskCreateApi_WhenPostAddTask_ExpectNewTaskHasCreated()
    {
        $this->dontSeeInDatabase('tasks', ['name' => 'Task 1'])
            ->post('/task', ['name' => 'Task 1'])
            ->assertResponseStatus(302)
            ->seeInDatabase('tasks', ['name' => 'Task 1']);
    }

    public function testTaskDeleteApi_WhenDeleteTask_ExpectTaskHasDeleted()
    {
        $task = factory(Task::class)->create(['name' => 'Task 1']);

        $taskId = $task->id;

        $this->seeInDatabase('tasks', ['name' => 'Task 1'])
            ->delete("/task/$taskId")
            ->assertResponseStatus(302)
            ->dontSeeInDatabase('tasks', ['name' => 'Task 1']);
    }
}