<?php
/**
 * Created by PhpStorm.
 * User: wangxiao
 * Date: 2018/5/22
 * Time: 22:36
 */

namespace App\Entities;

use Spatie\Permission\Models\Permission as PermissionModel;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Role.
 *
 * @package namespace App\Entities;
 */
class Permission extends PermissionModel implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    public function child() {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    public function children()
    {
        return $this->child()->with('children');
    }

}