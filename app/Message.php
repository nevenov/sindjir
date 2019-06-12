<?php

namespace Sinjirite;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'messages';

    protected $fillable = ['body', 'published_at', 'down_at'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'published_at', 'down_at'];
    protected $dateFormat = 'U';

    /**
     * Get published_at formatted.
     *
     * @param  string  $value
     * @return string
     */
    public function getPublishedAtAttribute($value)
    {
        return $value ? Carbon::createFromTimestamp($value)->format('d.m.Y') : null;
    }

    /**
     * Get down_at formatted.
     *
     * @param  string  $value
     * @return string
     */
    public function getDownAtAttribute($value)
    {
        return $value ? Carbon::createFromTimestamp($value)->format('d.m.Y') : null;
    }

    public function status()
    {
        $today = Carbon::now()->format('U');
        $start = Carbon::createFromFormat('d.m.Y', $this->published_at)->format('U');
        $end = Carbon::createFromFormat('d.m.Y', $this->down_at)->format('U');

        if ($start <= $today && $today <= $end) {
            // published
            return 'alert-success';
        } elseif ($today < $start) {
            // future publish
            return 'alert-warning';
        }

        return false;
    }
}
