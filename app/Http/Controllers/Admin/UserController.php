<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdate;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    protected $perPage = 10;
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $users = User::query()->orderBy('updated_at', 'desc')->paginate($this->perPage);

        return view('admin.user.index', [
            'users' =>  $users,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function show(User $user)
    {
        $user = User::find($user->id);

        return response()->view('admin.user.show', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function edit(User $user)
    {
        return response()->view('admin.user.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UserUpdate $request, User $user)
    {

        $data = $request->validated();

        if (($user->id == Auth::user()->id) && empty($data['is_admin'])) {

            $request->flash();
            return redirect()->back()
                ->with('error', __('sessions.error.adminStatus'));
        }

        if (empty($data['is_admin'])) $data['is_admin'] = 0;

        $user->fill($data);
        $user->updated_at = Carbon::now();

        try {
            $user->save();

        } catch (QueryException $e) {
            $request->flash();
            return redirect()->back()
                ->with('error', __('sessions.error.dbError', ['code' => $e->errorInfo[1]]));
        }

        return redirect()->route('admin.user.show', ['user' => $user])
            ->with('success', __('sessions.success.updateUser'));
    }

    public function changeStatus(Request $request, User $user)
    {
        if ($user->id == Auth::user()->id) {

            return redirect()->back()
                ->with('error', __('sessions.error.adminStatus'));
        }

        $user->is_admin = !(boolean)$user->is_admin;
        $user->updated_at = Carbon::now();

        try {
            $user->save();

        } catch (QueryException $e) {

            return redirect()->back()
                ->with('error', __('sessions.error.dbError', [
                    'code' => $e->errorInfo[1]
                ]));
        }

        return redirect()->back()
            ->with('success', __('sessions.success.updateStatus'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user)
    {
        if ($user->id == Auth::user()->id) {

            return redirect()->back()
                ->with('error', __('sessions.error.adminDestroy'));
        }

        try {
            $user->delete();

        } catch (QueryException $e) {

            return redirect()->back()
                ->with('error', __('sessions.error.dbError', ['code' => $e->errorInfo[1]]));
        }

        return redirect()->back()
            ->with('success', __('sessions.success.deleteUser'));
    }
}
