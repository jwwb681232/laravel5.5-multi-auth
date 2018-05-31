<?php
/**
 * Created by PhpStorm.
 * User: wangxiao
 * Date: 2018/5/31
 * Time: 18:51
 */
namespace App\Criteria\AdminMenus;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class RoleCriteria.
 *
 * @package namespace App\Criteria;
 */
class TopMenusCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->where('parent_id',0);
    }
}
