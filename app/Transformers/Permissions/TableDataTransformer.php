<?php
/**
 * Created by PhpStorm.
 * User: wangxiao
 * Date: 2018/5/22
 * Time: 22:55
 */

namespace App\Transformers\Permissions;

use League\Fractal\TransformerAbstract;
use App\Entities\Permission;

/**
 * Class RoleTransformer.
 *
 * @package namespace App\Transformers;
 */
class TableDataTransformer extends TransformerAbstract
{
    /**
     * Transform the Role entity.
     *
     * @param \App\Entities\Permission $model
     *
     * @return array
     */
    public function transform(Permission $model)
    {
        return [
            'id'         => (int)$model->id,
            'name'       => (string)$model->name,
            'guard_name' => (string)$model->guard_name,
            //'created_at' => (string)$model->created_at->timestamp,
            'created_at' => (string)$model->created_at->toDateTimeString(),
            'updated_at' => (string)$model->updated_at->toDateTimeString(),
        ];
    }
}