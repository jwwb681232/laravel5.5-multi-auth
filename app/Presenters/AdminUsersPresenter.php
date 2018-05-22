<?php
/**
 * Created by PhpStorm.
 * User: wangxiao
 * Date: 2018/5/19
 * Time: 0:24
 */

namespace App\Presenters;

use App\Transformers\AdminUserTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class RolePresenter.
 *
 * @package namespace App\Presenters;
 */
class AdminUsersPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AdminUserTransformer();
    }
}