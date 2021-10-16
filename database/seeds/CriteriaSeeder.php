<?php

use Illuminate\Database\Seeder;
use App\Criteria;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $criterias = [
            [
                'name' => 'Price',
                'value' => 4,
                'type' => 'cost'
            ],
            [
                'name' => 'Quality',
                'value' => 5,
                'type' => 'benefit'
            ],
            [
                'name' => 'Feature',
                'value' => 4,
                'type' => 'benefit'
            ],
            [
                'name' => 'Popular',
                'value' => 3,
                'type' => 'benefit'
            ],
            [
                'name' => 'After Sales',
                'value' => 2,
                'type' => 'benefit'
            ],
            [
                'name' => 'Strength',
                'value' => 2,
                'type' => 'benefit'
            ],
        ];

        foreach($criterias as $criteria){
            Criteria::create($criteria);
        }
    }
}
