<?php
/**
 * Created by PhpStorm.
 * User: wangxiao
 * Date: 2018/5/19
 * Time: 0:22
 */
namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class RoleCriteria.
 *
 * @package namespace App\Criteria;
 */
class AdminUsersCriteria implements CriteriaInterface
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
        $keyword   = request('search');
        $sortField = request('sort');
        $order     = request('order');

        return $model->when($keyword,function ($query)use($keyword){

            return $query->where('name','like',"%{$keyword}%");

        })->when(($sortField && $order),function ($query)use($sortField,$order){

            return $query->orderBy($sortField,$order);

        },function($query){

            return $query->orderBy('id','desc');

        });
    }
}