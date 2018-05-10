<?php

namespace App\Services;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Repositories\PostRepository;
use App\Validators\PostValidator;

class PostService {

    protected $repository;
    protected $validator;

    public function __construct(PostRepository $repository, PostValidator $validator) {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    public function store ($request) {
        
        try
        {
            $this->validator->with($request)->passesOrFail(ValidatorInterface::RULE_CREATE);

            foreach($request as $key => $value){
                $data[$key] = $value;
            }

            $data['users_id'] = 1;
            
            $this->repository->create($data);

            return [
                'success' => true,
                'message' => 'Postagem publicada com sucesso.',
                'type'    => 'is-success'  
            ];

        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }

    public function update($request, $id) {
        try
        {
            $this->validator->with($request)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            
            $this->repository->update($request, $id);

            return [
                'success' => true,
                'message' => 'Postagem atualizada com sucesso.',
                'type'    => 'is-success'  
            ];

        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }

}