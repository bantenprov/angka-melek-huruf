<?php

namespace Bantenprov\AngkaMelekHuruf\Http\Controllers;

/* Require */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\BudgetAbsorption\Facades\AngkaMelekHurufFacade;

/* Models */
use Bantenprov\AngkaMelekHuruf\Models\Bantenprov\AngkaMelekHuruf\AngkaMelekHuruf;

/* Etc */
use Validator;

/**
 * The AngkaMelekHurufController class.
 *
 * @package Bantenprov\AngkaMelekHuruf
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class AngkaMelekHurufController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AngkaMelekHuruf $angka_melek_huruf)
    {
        $this->angka_melek_huruf = $angka_melek_huruf;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->has('sort')) {
            list($sortCol, $sortDir) = explode('|', request()->sort);

            $query = $this->angka_melek_huruf->orderBy($sortCol, $sortDir);
        } else {
            $query = $this->angka_melek_huruf->orderBy('id', 'asc');
        }

        if ($request->exists('filter')) {
            $query->where(function($q) use($request) {
                $value = "%{$request->filter}%";
                $q->where('label', 'like', $value)
                    ->orWhere('description', 'like', $value);
            });
        }

        $perPage = request()->has('per_page') ? (int) request()->per_page : null;
        $response = $query->paginate($perPage);

        return response()->json($response)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $angka_melek_huruf = $this->angka_melek_huruf;

        $response['angka_melek_huruf'] = $angka_melek_huruf;
        $response['status'] = true;

        return response()->json($angka_melek_huruf);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AngkaMelekHuruf  $angka_melek_huruf
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $angka_melek_huruf = $this->angka_melek_huruf;

        $validator = Validator::make($request->all(), [
            'label' => 'required|max:16|unique:angka_melek_hurufs,label',
            'description' => 'max:255',
        ]);

        if($validator->fails()){
            $check = $angka_melek_huruf->where('label',$request->label)->whereNull('deleted_at')->count();

            if ($check > 0) {
                $response['message'] = 'Failed, label ' . $request->label . ' already exists';
            } else {
                $angka_melek_huruf->label = $request->input('label');
                $angka_melek_huruf->description = $request->input('description');
                $angka_melek_huruf->save();

                $response['message'] = 'success';
            }
        } else {
            $angka_melek_huruf->label = $request->input('label');
            $angka_melek_huruf->description = $request->input('description');
            $angka_melek_huruf->save();

            $response['message'] = 'success';
        }

        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $angka_melek_huruf = $this->angka_melek_huruf->findOrFail($id);

        $response['angka_melek_huruf'] = $angka_melek_huruf;
        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AngkaMelekHuruf  $angka_melek_huruf
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $angka_melek_huruf = $this->angka_melek_huruf->findOrFail($id);

        $response['angka_melek_huruf'] = $angka_melek_huruf;
        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AngkaMelekHuruf  $angka_melek_huruf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $angka_melek_huruf = $this->angka_melek_huruf->findOrFail($id);

        if ($request->input('old_label') == $request->input('label'))
        {
            $validator = Validator::make($request->all(), [
                'label' => 'required|max:16',
                'description' => 'max:255',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'label' => 'required|max:16|unique:angka_melek_hurufs,label',
                'description' => 'max:255',
            ]);
        }

        if ($validator->fails()) {
            $check = $angka_melek_huruf->where('label',$request->label)->whereNull('deleted_at')->count();

            if ($check > 0) {
                $response['message'] = 'Failed, label ' . $request->label . ' already exists';
            } else {
                $angka_melek_huruf->label = $request->input('label');
                $angka_melek_huruf->description = $request->input('description');
                $angka_melek_huruf->save();

                $response['message'] = 'success';
            }
        } else {
            $angka_melek_huruf->label = $request->input('label');
            $angka_melek_huruf->description = $request->input('description');
            $angka_melek_huruf->save();

            $response['message'] = 'success';
        }

        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AngkaMelekHuruf  $angka_melek_huruf
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $angka_melek_huruf = $this->angka_melek_huruf->findOrFail($id);

        if ($angka_melek_huruf->delete()) {
            $response['status'] = true;
        } else {
            $response['status'] = false;
        }

        return json_encode($response);
    }
}
