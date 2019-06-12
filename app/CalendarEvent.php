<?php

namespace Sinjirite;

use Illuminate\Database\Eloquent\Model;

class CalendarEvent extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'calendar';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];
    protected $dateFormat = 'U';

    // Keys must be same as types
    public static $types = [
        '1' => ['title' => 'Къща 2', 'color' => 'green', 'type' => 1, 'order' => 1],
        '3' => ['title' => 'Къща 3', 'color' => 'green', 'type' => 3, 'order' => 2],
        '2' => ['title' => 'Къща 4', 'color' => 'green', 'type' => 2, 'order' => 3],
//        '10' => ['title' => 'Стая А1', 'color' => 'purple', 'type' => 10],
//        '11' => ['title' => 'Стая А2', 'color' => 'purple', 'type' => 11],
        '12' => ['title' => 'Стая А3', 'color' => 'purple', 'type' => 12, 'order' => 12],
    ];
}
