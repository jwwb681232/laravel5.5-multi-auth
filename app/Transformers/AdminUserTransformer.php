<?php
/**
 * Created by PhpStorm.
 * User: wangxiao
 * Date: 2018/5/19
 * Time: 0:27
 */

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Admin;

/**
 * Class RoleTransformer.
 *
 * @package namespace App\Transformers;
 */
class AdminUserTransformer extends TransformerAbstract
{
    /**
     * Transform the Role entity.
     *
     * @param \App\Admin $model
     *
     * @return array
     */
    public function transform(Admin $model)
    {
        return [
            'id'         => (int)$model->id,
            'name'       => (string)$model->name,
            'email'      => (string)$model->email,
            'job_title'  => (string)$model->job_title,
            //'created_at' => (string)$model->created_at->timestamp,
            'created_at' => (string)$model->created_at->toDateTimeString(),
            'updated_at' => (string)$model->updated_at->toDateTimeString(),
        ];
    }
}