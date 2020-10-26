<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProductLocaleCreateRequest;
use App\Http\Requests\ProductLocaleUpdateRequest;
use App\Repositories\ProductLocaleRepository;
use App\Validators\ProductLocaleValidator;

/**
 * Class ProductLocalesController.
 *
 * @package namespace App\Http\Controllers;
 */
class ProductLocalesController extends Controller
{
    /**
     * @var ProductLocaleRepository
     */
    protected $repository;

    /**
     * @var ProductLocaleValidator
     */
    protected $validator;

    /**
     * ProductLocalesController constructor.
     *
     * @param ProductLocaleRepository $repository
     * @param ProductLocaleValidator $validator
     */
    public function __construct(ProductLocaleRepository $repository, ProductLocaleValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $productLocales = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $productLocales,
            ]);
        }

        return view('productLocales.index', compact('productLocales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductLocaleCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ProductLocaleCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $productLocale = $this->repository->create($request->all());

            $response = [
                'message' => 'ProductLocale created.',
                'data'    => $productLocale->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
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
        $productLocale = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $productLocale,
            ]);
        }

        return view('productLocales.show', compact('productLocale'));
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
        $productLocale = $this->repository->find($id);

        return view('productLocales.edit', compact('productLocale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductLocaleUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ProductLocaleUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $productLocale = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'ProductLocale updated.',
                'data'    => $productLocale->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
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
                'message' => 'ProductLocale deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'ProductLocale deleted.');
    }
}
