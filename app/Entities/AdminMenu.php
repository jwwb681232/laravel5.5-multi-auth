<?php
/**
 * Created by PhpStorm.
 * User: wangxiao
 * Date: 2018/5/30
 * Time: 17:27
 */

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class My.
 *
 * @package namespace App\Entities;
 */
class AdminMenu extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'href', 'icon', 'permission_id', 'parent_id', 'sort',];

    public function permission()
    {
        return $this->hasOne(Permission::class,'id','permission_id');
    }

    public function child() {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    public function children()
    {
        return $this->child()->with('children');
    }

}
