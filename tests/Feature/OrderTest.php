<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
  /**
   * A basic feature test example.
   *
   * @return void
   */
  public function testOrderForm()
  {
    $response = $this->get('/order/create');
    $response->assertStatus(200);
  }

  public function testOrderFormHandler()
  {
    $response = $this->post('/order', [
      'name' => 'Sally',
      'email' => 'some@mail.com',
      'phone' => '7775577',
      'request' => 'request',
    ]);

    $response
      ->dump()
      ->assertStatus(200)
//    ->assertJson(['created' => true])
      ->assertSeeText('success')
      ;
  }
}
