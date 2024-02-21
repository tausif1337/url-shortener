<?php
namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class UrlShortener extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'original_url',
        'short_url',
        'click_count',
        'created_by',
    ];
    // method to increment click count
    public function incrementClickCount()
    {
        $this->click_count++;
        $this->save();
    }
}