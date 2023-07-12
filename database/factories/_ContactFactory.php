<?php

namespace Database\Factories;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class _ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        DB::table('contacts')->delete();
        return  [
            'phone' => '+374(94)63-55-44',
            'phone_res' => '+374 060 53 55 44',
            'whatsup' => '37494635544',
            'email' => 'info@cargolinea.am',
            'address' => ['en' => 'Movses Khorenatsi St., 112 Building, Office 7',
                            'hy' => 'Մովսես Խորենացի 112Շ ․ Օֆիս 7',
                            'ru' => 'Мовсеса Хоренаци ул., 112 дом, офис 7',],
            'map' => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d973.7948154335857!2d44.51469151011065!3d40.163603638319636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x406abc66f6270c8f%3A0x4e3932809a37d3af!2s112%20Marksi%20poxoc%2C%20Yerevan!5e0!3m2!1sru!2sam!4v1686696084050!5m2!1sru!2sam",
            'facebook' => 'https://www.facebook.com/',
            'instagram' => 'https://www.instagram.com/',
            'linkedin' => 'https://www.linkedin.com/',
            'youtube' => 'https://www.youtube.com/',
            ];
    }
}
