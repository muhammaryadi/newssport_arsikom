<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationTargetHistory extends Model
{
    use HasFactory;

    protected $table = 'notification_target_histories';
    protected $fillable = ['notification_id', 'cust_id', 'sent_date', 'is_success', 'via_wa', 'via_email'];

    public function notifikasi()
    {
        return $this->belongsTo(PushNotification::class, 'notification_id');
    }
}
