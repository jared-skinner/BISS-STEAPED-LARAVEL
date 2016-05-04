<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Sign;
use App\Repositories\SignRepository;

class SignController extends Controller
{
    /**
     * The sign repository instance.
     *
     * @var SignRepository
     */
    protected $signs;

    /**
     * Create a new controller instance.
     *
     * @param  SignRepository  $signs
     * @return void
     */
    public function __construct(SignRepository $signs)
    {
        $this->middleware('auth');

        $this->signs = $signs;
    }

    /**
     * Display a list of all of the user's signs.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        return view('signs.index', [
            'signs' => $this->signs->forUser($request->user()),
        ]);
    }

    /**
     * Create a new sign.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'description' => 'required|max:255',
            'ordered-by' => 'required|max:255',
            'route' => 'required|max:255',
            'brand' => 'required|max:255',
            'price' => 'numeric|required|max:999999.99',
        ]);

        $request->user()->signs()->create([
            'description' => $request->description,
            'ordered-by' => $request->ordered_by,
            'route' => $request->route,
            'brand' => $request->brand,
            'price' => $request->price,
        ]);

        return redirect('/signs');
    }

    /**
     * Destroy the given sign.
     *
     * @param  Request  $request
     * @param  Sign  $sign
     * @return Response
     */
    public function destroy(Request $request, Sign $sign)
    {
        $this->authorize('destroy', $sign);

        $sign->delete();

        return redirect('/signs');
    }
}
