<?php

namespace App\Services;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CategoriesCreateRequest;
use App\Http\Requests\CategoriesUpdateRequest;
use App\Repositories\CategoriesRepository;
use App\Validators\CategoriesValidator;

class CategoryService {

    protected $repository;
    protected $validator;
    
    public function __construct(CategoriesRepository $repository, CategoriesValidator $validator ) {
        
        $this->repository   = $repository;
        $this->validator    = $validator;
        
    }

    public function destroy($id) {
        try {

            $deleted = $this->repository->delete($id);

            return [
                'success' => true,
                'message' => 'Deletado com sucesso.',
                'type'    => 'is-success'  
            ];

        } catch (Exception $e) {
            dd($e);
        }
    }
    
}