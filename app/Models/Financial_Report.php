<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financial_Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'month',
        'year',
        'total_sales',
        'total_expense',
        'profit_before_tax',
        'tax_amount',
        'profit_after_tax',
    ];
}
