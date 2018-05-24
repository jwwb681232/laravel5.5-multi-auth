<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\My;

/**
 * Class MyTransformer.
 *
 * @package namespace App\Transformers;
 */
class MyTransformer extends TransformerAbstract
{
    /**
     * Transform the My entity.
     *
     * @param \App\Entities\My $model
     *
     * @return array
     */
    public function transform(My $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
