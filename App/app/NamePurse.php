<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NamePurse extends Model
{
        protected $table = 'name_purse';

        public function Permission()
          {
              return $this->hasMany('App\Permission');
          }
}
