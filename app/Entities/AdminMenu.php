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
    protected $fillable = [];

}
