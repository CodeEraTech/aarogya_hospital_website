<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OpdSchedule extends Model
{
    protected $guarded = [];

    protected $casts = ['days' => 'array'];

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    public function getDaysLabelAttribute(): string
    {
        $order = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $days = collect($this->days ?? [])->sortBy(fn ($day) => array_search($day, $order, true))->values()->all();
        $groups = [];
        foreach ($days as $day) {
            $last = count($groups) - 1;
            if ($last >= 0 && array_search($day, $order, true) === array_search($groups[$last][count($groups[$last]) - 1], $order, true) + 1) $groups[$last][] = $day;
            else $groups[] = [$day];
        }
        return collect($groups)->map(fn ($group) => count($group) > 1 ? $group[0].'–'.$group[count($group)-1] : $group[0])->implode(', ');
    }
}
