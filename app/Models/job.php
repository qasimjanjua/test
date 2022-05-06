<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    use HasFactory;
    protected $table = 'jobs';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'candidates_id',
                  'job_title',
                  'company_name',
                  'start_date',
                  'end_date'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
               'created_at',
               'updated_at',
               'start_date',
               'end_date'
           ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = !empty($value) ? \DateTime::createFromFormat('Y-m-d H:i', $value) : null;
    }

    /**
     * Set the end_date.
     *
     * @param  string  $value
     * @return void
     */
    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = !empty($value) ? \DateTime::createFromFormat('Y-m-d H:i', $value) : null;
    }

    /**
     * Set the start_time.
     *
     * @param  string  $value
     * @return void
     */
}
