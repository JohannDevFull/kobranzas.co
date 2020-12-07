<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;




class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $arrValues=['cedula_ciudadania','cedula_extrangeria'];
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'phone_one'=>$this->faker->e164PhoneNumber(),
            'phone_two'=>$this->faker->e164PhoneNumber(),
            'doc_type'=>$arrValues[rand(0,1)],
            'document'=>random_int($min=1000000000,$max=9999999999)            
        ];
    }
}
