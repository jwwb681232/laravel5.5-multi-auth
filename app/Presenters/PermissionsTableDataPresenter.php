<?php
/**
 * Created by PhpStorm.
 * User: wangxiao
 * Date: 2018/5/22
 * Time: 22:53
 */

namespace App\Presenters;
use App\Transformers\PermissionsTableDataTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class PermissionsTableDataPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PermissionsTableDataTransformer();
    }
}