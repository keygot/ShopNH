<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'COUPON' . $this->faker->randomNumber(2), // Tạo số có 2 chữ số (từ 1 đến 99)
            'type' => 'money',
            'value' => 50,
            'expery_date' => Carbon::now() // Ngày hết hạn
        ];
    }
}
