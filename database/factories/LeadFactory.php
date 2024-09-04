<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Lead;

use App\Enums\LeadStatus;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lead>
 */
class LeadFactory extends Factory
{
    protected $model = Lead::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'mobile' => $this->faker->phoneNumber(),
           
            'description' => $this->faker->sentence(),
            'source' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(LeadStatus::cases())->value, 


        ];
    }
}
