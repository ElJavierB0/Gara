<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\Models\Employee;
use App\Models\Remplacement;

class Record extends Model
{
    use HasFactory;

    public function service(){
        return $this->belongsTo(Service::class);
    }
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
    public function remplacement(){
        return $this->belongsTo(Remplacement::class);
    }
}
