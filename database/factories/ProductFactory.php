<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\File;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
	protected $model = Product::Class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->randomElement([1, 2, 3]),
			'name' => $this->faker->sentence(),
			'stock' => $this->faker->randomDigit(),
			'price' => $this->faker->randomNumber(6, true),
			'description' => $this->faker->paragraph(),
        ];
    }

	public function configure()
	{
		return $this->afterCreating(function (Product $product) {
			$file = new File(['route' => '/storage/images/products/default.png']);
			$product->file()->save($file);
		});
	}
}
