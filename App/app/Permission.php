<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
      protected $table = 'permission';

      public function NamePurse()
          {
              return $this->belongsTo('App\NamePurse');
          }


}
