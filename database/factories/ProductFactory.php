<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $imgPath = $this->faker->image(storage_path('app/public/uploads/products'), $width = 640, $height = 480, 'cats', false);
        return [
            "name" => $this->faker->name(),
            "cate_id" => Category::all()->random()->id,
            "image" => "uploads/products/" . $imgPath,
            "price" => rand(1, 2000),
            "quantity" => rand(1, 200),
            "status" => rand(0, 1),
            "description" => $this->faker->text(50),
        ];
    }
}
