<?php

namespace Database\Seeders;

use App\Models\Exercise;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'name' => 'Kicking',
                'description' => '<p>kicking</p>',
                'measurement' => 'repeat',
                'video' => null,
                'icon' => null,
                'cover' => null,
                'animation' => null
            ],
            [
                'name' => 'Ankling',
                'description' => '<p>ankling</p>',
                'measurement' => 'repeat',
                'video' => null,
                'icon' => null,
                'cover' => null,
                'animation' => null
            ],
            [
                'name' => 'Highknee',
                'description' => '<p>highknee</p>',
                'measurement' => 'repeat',
                'video' => null,
                'icon' => null,
                'cover' => null,
                'animation' => null
            ],
            [
                'name' => 'Butkick',
                'description' => '<p>butkick</p>',
                'measurement' => 'repeat',
                'video' => null,
                'icon' => null,
                'cover' => null,
                'animation' => null
            ],
            [
                'name' => 'Skipping',
                'description' => '<p>skipping</p>',
                'measurement' => 'repeat',
                'video' => null,
                'icon' => null,
                'cover' => null,
                'animation' => null
            ],
            [
                'name' => 'One step highknee (R/L)',
                'description' => '<p>one step highknee (r/l)</p>',
                'measurement' => 'repeat',
                'video' => null,
                'icon' => null,
                'cover' => null,
                'animation' => null
            ],
            [
                'name' => 'Highknee kick (R/L)',
                'description' => '<p>highknee kick (R/L)</p>',
                'measurement' => 'repeat',
                'video' => null,
                'icon' => null,
                'cover' => null,
                'animation' => null
            ],
            [
                'name' => 'Hoping',
                'description' => '<p>hoping</p>',
                'measurement' => 'repeat',
                'video' => null,
                'icon' => null,
                'cover' => null,
                'animation' => null
            ],
            [
                'name' => 'Bounding',
                'description' => '<p>bounding</p>',
                'measurement' => 'repeat',
                'video' => null,
                'icon' => null,
                'cover' => null,
                'animation' => null
            ],
            [
                'name' => 'Carioca',
                'description' => '<p>carioca</p>',
                'measurement' => 'repeat',
                'video' => null,
                'icon' => null,
                'cover' => null,
                'animation' => null
            ],
            [
                'name' => 'Push up',
                'description' => '<p>push up</p>',
                'measurement' => 'repeat',
                'video' => null,
                'icon' => null,
                'cover' => null,
                'animation' => null
            ],
            [
                'name' => 'Sit Up',
                'description' => '<p>sit up</p>',
                'measurement' => 'repeat',
                'video' => null,
                'icon' => null,
                'cover' => null,
                'animation' => null
            ],
            [
                'name' => 'Lunges',
                'description' => '<p>lunges</p>',
                'measurement' => 'repeat',
                'video' => null,
                'icon' => null,
                'cover' => null,
                'animation' => null
            ],
            [
                'name' => 'Spider Push Up',
                'description' => '<p>spidder push up</p>',
                'measurement' => 'repeat',
                'video' => null,
                'icon' => null,
                'cover' => null,
                'animation' => null
            ],
            [
                'name' => 'Flutter kicks',
                'description' => '<p>1" x 3 set</p>',
                'measurement' => 'repeat',
                'video' => null,
                'icon' => null,
                'cover' => null,
                'animation' => null
            ],
            [
                'name' => 'Shoulder Tap',
                'description' => '<p>shoulder tap</p>',
                'measurement' => 'repeat',
                'video' => null,
                'icon' => null,
                'cover' => null,
                'animation' => null
            ],
            [
                'name' => 'Russian Twist',
                'description' => '<p>russian twist</p>',
                'measurement' => 'repeat',
                'video' => null,
                'icon' => null,
                'cover' => null,
                'animation' => null
            ],
            [
                'name' => 'Burpee',
                'description' => '<p>burpee</p>',
                'measurement' => 'repeat',
                'video' => null,
                'icon' => null,
                'cover' => null,
                'animation' => null
            ],
            [
                'name' => 'Push up move cones',
                'description' => '<p>push up move cones</p>',
                'measurement' => 'repeat',
                'video' => null,
                'icon' => null,
                'cover' => null,
                'animation' => null
            ],
            [
                'name' => 'Cross Sit Up',
                'description' => '<p>1" x 3 set</p>',
                'measurement' => 'repeat',
                'video' => null,
                'icon' => null,
                'cover' => null,
                'animation' => null
            ],
            [
                'name' => 'SCR 15x2',
                'description' => '<p>15" x 2 Set</p>',
                'measurement' => 'repeat',
                'video' => null,
                'icon' => null,
                'cover' => null,
                'animation' => null
            ],
            [
                'name' => 'SCR 30"',
                'description' => '<p>30"</p>',
                'measurement' => 'repeat',
                'video' => null,
                'icon' => null,
                'cover' => null,
                'animation' => null
            ],
            [
                'name' => 'Ankling',
                'description' => '<p>ankling</p>',
                'measurement' => 'repeat',
                'video' => null,
                'icon' => null,
                'cover' => null,
                'animation' => null
            ],

        ])->each(function ($data) {
            Exercise::create($data);
        });
    }
}
