<?php

namespace App\Presenters;

use App\Transformers\MyTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MyPresenter.
 *
 * @package namespace App\Presenters;
 */
class MyPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MyTransformer();
    }
}
