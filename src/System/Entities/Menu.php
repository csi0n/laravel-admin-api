<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 10/9/17
 * Time: 9:53 AM
 */

namespace csi0n\LaravelAdminApi\System\Entities;


use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'pid',
        'name',
        'language',
        'icon',
        'slug',
        'url',
        'description',
        'sort',
        'status'
    ];
    protected $dateFormat = 'U';

    public function scopeStatus($query, $status = 'enable')
    {
        return $query->whereStatus($status);
    }
}