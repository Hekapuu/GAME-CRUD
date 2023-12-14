<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_producto' => fake()->word(),
            'precio' => fake()->randomFloat(2, 10, 1000),
            'stock' => fake()->numberBetween(0, 100),
            'stock_minimo' => fake()->numberBetween(1, 50),
            'estado_producto' => fake()->randomElement(['Disponible', 'Bajo stock']),
            'descripcion' => fake()->sentence(),
        ];
    }
}
