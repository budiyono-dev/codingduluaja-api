<?php

namespace App\Models;

use App\Constants\TableName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = TableName::REPORT;

    protected $fillable = ['user_id', 'category', 'title', 'payload'];

    public function image()
    {
        return $this->hasMany(ReportImage::class, 'report_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
