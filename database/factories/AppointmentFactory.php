<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomDigit(1,10),
            'patient_id' => $this->faker->randomDigit(1,20),
            'comment' => $this->faker->paragraph(3),
            'appointment_date' => $this->faker->dateTimeThisDecade()
        ];
    }
}
