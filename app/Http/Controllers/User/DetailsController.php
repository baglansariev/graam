<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\ManagerController;

class DetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $manager = new ManagerController();
        $manager                = json_decode($manager->getManagerInfo($user->crm_id));
        $data = [
            'has_details' => $user->details()->count(),
            'user' => $user,
            'manager' => $manager,
        ];
       return view('admin.user.details.index', $data);
       // return view('user.info', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.details.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        if ($user->details()->create($request->input())) {
            session()->flash('success_msg', 'Личные данные успешно обновлены!');
        }
        else {
            session()->flash('error_msg', 'Ошибка! Попробуйте попозже.');
        }
        return redirect(route('details.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $manager = new ManagerController();
        $manager                = json_decode($manager->getManagerInfo($user->crm_id));
        $data = [
            'user' => $user,
            'manager' => $manager,
        ];
        return view('admin.user.details.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $data = $request->except(['_token', '_method']);


        if ($user->details()->update($data)) {
            session()->flash('success_msg', 'Личные данные успешно обновлены!');
        }
        else {
            session()->flash('error_msg', 'Ошибка! Попробуйте попозже.');
        }
        return redirect(route('details.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
