<?php

namespace Tests\Unit;

use Illuminate\Http\Request;
use PHPUnit\Framework\TestCase;
use App\Http\Controllers\ApartmentsController;
use App\Models\Apartment;

class ApartmentsControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function it_returns_filtered_apartments()
    {
        // Создаем несколько тестовых квартир
        $apartment1 = Apartment::factory()->create(['status' => 10, 'property_type' => 'apartment', 'type' => 'sale', 'number_of_bedrooms' => 2, 'city' => ['tentativeName' => 'City1']]);
        $apartment2 = Apartment::factory()->create(['status' => 9, 'property_type' => 'house', 'type' => 'rent', 'number_of_bedrooms' => 3, 'city' => ['tentativeName' => 'City2']]);
        $apartment3 = Apartment::factory()->create(['status' => 9, 'property_type' => 'villa', 'type' => 'sale', 'number_of_bedrooms' => 2, 'city' => ['tentativeName' => 'City1']]);

        $request = new Request([
            'estate' => 'apartment',
            'status' => 'sale',
            'bedrooms' => 2,
            'sity' => 'City1',
        ]);

        // Создаем экземпляр контроллера
        $controller = new ApartmentsController();

        // Вызываем метод apartments
        $response = $controller->apartments($request);

        // Проверяем, что метод возвращает ответ в формате JSON
        $this->assertTrue($response->headers->get('content-type') == 'application/json');

        // Парсим JSON ответ
        $responseData = json_decode($response->getContent(), true);

        // Проверяем, что в ответе есть html
        $this->assertArrayHasKey('html', $responseData);

        // Получаем коллекцию квартир из ответа
        $apartments = $responseData['html']['apartments'];

        // Проверяем, что в коллекции есть ожидаемые квартиры
        $this->assertTrue($apartments->contains($apartment1));
        $this->assertFalse($apartments->contains($apartment2));
        $this->assertTrue($apartments->contains($apartment3));

        // Проверяем, что nextPageUrl и nextPageNum имеют ожидаемые значения
        $this->assertEquals($responseData['html']['nextPageUrl'], $apartments->nextPageUrl());
        $this->assertEquals($responseData['html']['nextPageNum'], $apartments->currentPage() + 1);
    }
}
