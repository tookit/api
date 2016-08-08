<?php
/**
 * Created by PhpStorm.
 * User: michaelwang
 * Date: 8/8/16
 * Time: 11:20 PM
 */

namespace app\Presenters;


use App\Transformers\JobTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class JobPresenter extends FractalPresenter
{

    /**
     * @return JobTransformer
     */

    public function getTransformer()
    {
        // TODO: Implement getTransformer() method.

        return new JobTransformer();
    }
}