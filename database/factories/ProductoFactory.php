<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Producto;
use App\Models\Categoria;

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
    protected $model=Producto::class;
    public function definition(): array
    {
        return [
            //
            'nombre'=>$this->faker->word,
            'descripcion'=>$this->faker->sentence,
            'precio'=>$this->faker->randomFloat(2, 10, 1000),
            'stock'=>$this->faker->numberBetween(1, 100),
            'idCategoria' => Categoria::factory(),
            //'idCategoria'=>$this->faker->numberBetween(1, 1),
        ];
    }
}
