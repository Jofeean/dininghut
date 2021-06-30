<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Tags extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $fillable = ["menu_id", "category_id"];

    public function menus()
    {
        return $this->belongsTo(Menu::class, "menu_id");
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, "category_id");
    }
}
