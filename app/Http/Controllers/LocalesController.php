<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\LocaleCreateRequest;
use App\Http\Requests\LocaleUpdateRequest;
use App\Repositories\LocaleRepository;
use App\Validators\LocaleValidator;

/**
 * Class LocalesController.
 *
 * @package namespace App\Http\Controllers;
 */
class LocalesController extends Controller
{
    /**
     * @var LocaleRepository
     */
    protected $repository;

    /**
     * @var LocaleValidator
     */
    protected $validator;

    /**
     * LocalesController constructor.
     *
     * @param LocaleRepository $repository
     * @param LocaleValidator $validator
     */
    public function __construct(LocaleRepository $repository, LocaleValidator $validator)
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
        $locales = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $locales,
            ]);
        }

        return view('locales.index', compact('locales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  LocaleCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(LocaleCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $locale = $this->repository->create($request->all());

            $response = [
                'message' => 'Locale created.',
                'data'    => $locale->toArray(),
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
        $locale = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $locale,
            ]);
        }

        return view('locales.show', compact('locale'));
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
        $locale = $this->repository->find($id);

        return view('locales.edit', compact('locale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  LocaleUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(LocaleUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $locale = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Locale updated.',
                'data'    => $locale->toArray(),
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
                'message' => 'Locale deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Locale deleted.');
    }
}
