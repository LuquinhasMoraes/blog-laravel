<?php

namespace App\Presenters;

use App\Transformers\CategoriesTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CategoriesPresenter.
 *
 * @package namespace App\Presenters;
 */
class CategoriesPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CategoriesTransformer();
    }
}
