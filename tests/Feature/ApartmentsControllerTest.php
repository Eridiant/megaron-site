<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\City;
use App\Models\Neighborhood;
use App\Models\Developer;
use App\Models\Complex;
use App\Models\Apartment;
use App\Models\ApartmentContent;

class ApartmentsControllerTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_return_index_view(): void
    {
        $response = $this->get(route('apartments'));

        $response->assertStatus(200);
        $response->assertViewIs('frontend.apartments.apartments');
    }

    /** @test */
    public function it_can_show_an_apartment()
    {
        $city = City::factory()->create();
        $neighborhood = Neighborhood::factory()->create();
        $developer = Developer::factory()->create();
        $complex = Complex::factory()->create();
        $apartment = Apartment::factory()->create();
        $apartmentContent = ApartmentContent::factory()->create();

        // Выполняем запрос к маршруту show с id квартиры
        $response = $this->get(route('apartments.show', ['id' => $apartment->id]));

        // Проверяем успешный ответ
        $response->assertStatus(200);

        // Проверяем, что используется нужное представление
        $response->assertViewIs('frontend.apartments.show');

        // Проверяем, что в представлении есть переменная $apartment, содержащая информацию о квартире
        $response->assertViewHas('apartment', $apartment);
    }

    /** @test */
    public function it_returns_404_if_apartment_not_found()
    {
        // Выполняем запрос к маршруту show с несуществующим id
        $response = $this->get(route('apartments.show', ['id' => 999]));

        // Проверяем, что возвращается HTTP код 404
        $response->assertStatus(404);
    }
}
