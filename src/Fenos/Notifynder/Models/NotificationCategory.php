<?php
/**
 * Created by Fabrizio Fenoglio.
 */

namespace Fenos\Notifynder\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class NotificationCategory
 *
 * @package Fenos\Notifynder\Models
 */
class NotificationCategory extends Model {

    /**
     * @var string
     */
    protected $table = "notification_categories";

    /**
     * @var array
     */
    protected $fillable = ['name','text'];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * Relation with the notifications
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notifications()
    {
        return $this->hasMany('Fenos\Notifynder\Models\Notification','category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(
            'Fenos\Notifynder\Models\NotificationGroup',
            'notifications_categories_in_groups',
            'category_id','group_id'
        );
    }

    /**
     * Return category id
     *
     * @return mixed
     */
    public function id()
    {
        return $this->id;
    }
} 