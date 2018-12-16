<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
  public function setDobAttribute($value) {
    $date_parts = explode('-', $value);
    $this->attributes['dob'] = $date_parts[2].'-'.$date_parts[1].'-'.$date_parts[0];
  }

  public function getDobAttribute($value) {
    $date_parts = explode('-', $value);
    $this->attributes['dob'] = $date_parts[2].'-'.$date_parts[1].'-'.$date_parts[0];
  }
}
