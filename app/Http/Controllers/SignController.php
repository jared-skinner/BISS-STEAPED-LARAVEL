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
            'name' => 'required|max:255',
        ]);

        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect('/signs');
    }

    /**
     * Destroy the given task.
     *
     * @param  Request  $request
     * @param  Task  $task
     * @return Response
     */
    public function destroy(Request $request, Task $task)
    {
        $this->authorize('destroy', $task);

        $task->delete();

        return redirect('/tasks');
    }
}
