<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Task;

class TaskTest extends TestCase
{
    /**
     *
     * @test
     */
    public function 一覧を取得()
    {
        $response = $this->getJson('api/tasks');

        $response
                ->assertOk();
    }

    /**
     * @test
     */
    public function 登録する()
    {
        $data = [
            "title" => "テスト"
        ];

        $response = $this->postJson("api/tasks", $data);

        $response
            ->assertStatus(201);
            // ->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function 更新する()
    {
        $task = Task::factory()->create();

        $task->title = "書き換えました";

        $response = $this->patchJson("api/tasks/{$task->id}", $task->toArray());

        $response
            ->assertStatus(200);

    }

    /**
     * @test
     */
    // public function 削除する()
    // {
    //     $task = Task::factory()->count(10)->create();

    //     $response = $this->deleteJson("api/tasks/14");

    //     $response
    //         ->assertStatus(200);
    // }
    public function タイトルが空の場合登録できない()
    {
        $data = [
            "title" => ""
        ];

        $response = $this->postJson("api/tasks", $data);

        $response
            ->assertStatus(422)
            ->assertJsonValidationErrors([
                'title' => 'タイトルは必ず指定してください。'
            ]);
    }

    /**
     * @test
     */
    public function タイトルが255文字以内でなければ登録できない()
    {
        $data = [
            "title" => str_repeat('あ',256)
        ];

        $response = $this->postJson("api/tasks", $data);

        $response
            ->assertStatus(422)
            ->assertJsonValidationErrors([
                'title' => 'タイトルは、255文字以下で指定してください。'
            ]);
    }
}
