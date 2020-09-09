<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
      protected $table = 'permission';

      protected $fillable = ['user_id', 'name_purse_id'];

      public function NamePurse()
          {
              return $this->belongsTo('App\NamePurse');
          }


}
