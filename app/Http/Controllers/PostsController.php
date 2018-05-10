<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Repositories\PostRepository;
use App\Repositories\CategoriesRepository;
use App\Validators\PostValidator;
use App\Services\PostService;

/**
 * Class PostsController.
 *
 * @package namespace App\Http\Controllers;
 */
class PostsController extends Controller
{
    /**
     * @var PostRepository
     */
    protected $repository;

    /**
     * @var PostRepository
     */
    protected $categories_repository;

    /**
     * @var PostValidator
     */
    protected $validator;

    /**
     * @var PostService
     */
    protected $service;

    /**
     * PostsController constructor.
     *
     * @param PostRepository $repository
     * @param PostValidator $validator
     */
    public function __construct(PostRepository $repository, CategoriesRepository $categories_repository, PostValidator $validator, PostService $service)
    {
        $this->repository = $repository;
        $this->categories_repository = $categories_repository;
        $this->validator  = $validator;
        $this->service    = $service;  
    }

    /**
     * Métodos Auxiliares - CategoriesRepository
     */

     public function getCategoriesTeste() {
        $categories = $this->categories_repository->all();

        $arr_categories = [];
        foreach ($categories as $key => $value) {
            $arr_categories[$key] = $value;
        }

        return $arr_categories;
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        
        $posts = $this->repository->all();
        
        
        return view('blog.index', [
            'posts' => $posts
        ]);

    }

    public function create()
    {
        $categories = $this->categories_repository->selectBoxList();
        return view('blog.add', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PostCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(PostCreateRequest $request)
    {
        try {

            $response = $this->service->store($request->all());

            if($response['success']){

                session()->flash('output', [
                    'message' => $response['message'], 
                    'type'    => $response['type']
                ]);

            }
            return redirect()->back();

        } catch (ValidatorException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->repository->find($id);

        return view('blog.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->repository->find($id);
        $categories = $this->categories_repository->selectBoxList();

        return view('blog.edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PostUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(PostUpdateRequest $request, $id)
    {
        try {

            $response = $this->service->update($request->all(), $id);

            if($response['success']){

                session()->flash('output', [
                    'message' => $response['message'], 
                    'type'    => $response['type']
                ]);

            }
            return redirect()->back();

        } catch (ValidatorException $e) {
            echo $e->getMessage();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Post deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Post deleted.');
    }
}
