<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Basic',
                'stripe_plan_id' => 'prod_RtRWliGhloas4J', 
                'stripe_monthly_price_id' => 'price_1QzedMA0PFKQ7DSbL4jqjLUF',   
                'stripe_yearly_price_id' => 'price_1QzedMA0PFKQ7DSbxwIrX77k',   
            ],
            [
                'name' => 'Pro',
                'stripe_plan_id' => 'prod_RtRXJiOzirGoNt',
                'stripe_monthly_price_id' => 'price_1Qzee2A0PFKQ7DSbiFswfX0u',
                'stripe_yearly_price_id' => 'price_1Qzee2A0PFKQ7DSbbCH61YsV',
            ],
            [
                'name' => 'Enterprise',
                'stripe_plan_id' => 'prod_RtRXWGmJnz9rXz',
                'stripe_monthly_price_id' => 'price_1QzeecA0PFKQ7DSbQgWLtRnV',
                'stripe_yearly_price_id' => 'price_1QzeecA0PFKQ7DSbD4lIqoyI',
            ],
        ];
        
        foreach ( $plans as $plan ) {
            Plan::create($plan);
        }
    }
}
