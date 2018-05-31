<?php
/**
 * Created by PhpStorm.
 * User: wangxiao
 * Date: 2018/5/22
 * Time: 22:53
 */

namespace App\Presenters\Permissions;
use App\Transformers\Permissions\TableDataTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class TableDataPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TableDataTransformer();
    }
}