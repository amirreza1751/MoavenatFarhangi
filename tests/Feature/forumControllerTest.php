<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class forumControllerTest extends TestCase
{
    //  use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->post('/api/forums/add', [
            [
                'name' => 'test',
                'forum_history' => 'test1',
                'forum_statute' => 'test2',
                'college_name' => 'Kaycee Murray DVM'
            ],

            [
                'fname' => 'test3',
                'lname' => 'test4',
                'student_id' => '1234',
                'phone_number' => '1234',
                'field' => 'test5',
                'forum_post' => 'test6',
                'votes' => '10'
            ]

        ]);

        $response->assertStatus(200);
    }
}