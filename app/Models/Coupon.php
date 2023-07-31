<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

// Bảng giảm giá
class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'value',
        'expery_date' // Ngày hết hạn
     
    ];

    public function getExperyDateAttribute() {
        return Carbon::parse($this->attributes['expery_date'])->format('Y-m-d');
    }

    // quan hệ - 1 mã giảm giá có thể có nhiều user sử dụng - 1 user chỉ dùng 1 mã duy nhất

    public function users() {
        return $this->belongsToMany(User::class, 'coupon_user');
    }

    public function firstWithExperyDate($name, $userId) {
        return $this->whereName($name)->whereDoesntHave('users', fn($q) => $q->where('user_id', $userId))->whereDate('expery_date', '>=', Carbon::now())->first();
    }
}
