<?php

use App\Task;

use Illuminate\Foundation\Testing\DatabaseTransactions;

class UATTest extends TestCase
{
    use DatabaseTransactions;

    public function testTaskList_Given3TaskInDatabase_WhenBrowseToTaskListPage_ExpectTaskListShowAllTasks()
    {
        factory(Task::class)->create(['name' => 'Task 1']);
        factory(Task::class)->create(['name' => 'Task 2']);
        factory(Task::class)->create(['name' => 'Task 3']);

        $this->visit('/')
            ->see('Task 1')
            ->see('Task 2')
            ->see('Task 3');
    }

    public function testTaskList_GivenNoTaskInList_WhenPressAddTask_ExpectNewTaskHasBeenShown()
    {
        $this->visit('/')->dontSee('Task 1');

        $this->visit('/')
            ->type('Task 1', 'name')
            ->press('Add Task')
            ->see('Task 1');
    }

    public function testTaskList_WhenPressAddTaskWith300CharactersTaskName_ExpectWhoopsHasBeenShown()
    {
        $this->visit('/')
            ->type(str_random(300), 'name')
            ->press('Add Task')
            ->see('Whoops!');
    }
}

