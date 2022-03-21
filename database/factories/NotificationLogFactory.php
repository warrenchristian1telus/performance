<?php

namespace Database\Factories;

use App\Models\NotificationLog;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationLogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NotificationLog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'subject' => $this->faker->text(),
            'description' => $this->faker->paragraph,
            'recipients' => $this->faker->safeEmail,
            'alert_type' => $this->faker->randomElement(array('Notfication')),
            'alert_format' => $this->faker->randomElement(array('E-mail','In app')),
            'sender_id' => $this->faker->numberBetween(1, 100),
            'date_sent' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
        ];
    }
}
