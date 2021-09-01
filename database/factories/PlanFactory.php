<?php

namespace Database\Factories;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Rinvex\Subscriptions\Models\PlanFeature;
use Rinvex\Subscriptions\Models\PlanSubscription;

class PlanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Plan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 1, 100),
            'signup_fee' => $this->faker->randomFloat(2, 1, 100),
            'invoice_period' => 1,
            'invoice_interval' => 'month',
            'trial_period' => 15,
            'trial_interval' => 'day',
            'sort_order' => 1,
            'currency' => 'USD',
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Plan $planSubscription) {
            $planSubscription->features()->saveMany([
                new PlanFeature(['name' => 'listings', 'value' => 50, 'sort_order' => 1]),
                new PlanFeature(['name' => 'pictures_per_listing', 'value' => 10, 'sort_order' => 5]),
                new PlanFeature(['name' => 'listing_duration_days', 'value' => 30, 'sort_order' => 10, 'resettable_period' => 1, 'resettable_interval' => 'month']),
                new PlanFeature(['name' => 'listing_title_bold', 'value' => 'Y', 'sort_order' => 15])
            ]);
        });
    }
}
