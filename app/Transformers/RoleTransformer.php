<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Role;

/**
 * Class RoleTransformer.
 *
 * @package namespace App\Transformers;
 */
class RoleTransformer extends TransformerAbstract
{
    /**
     * Transform the Role entity.
     *
     * @param \App\Entities\Role $model
     *
     * @return array
     */
    public function transform(Role $model)
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
