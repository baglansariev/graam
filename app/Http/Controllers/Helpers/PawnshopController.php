<?php

namespace App\Http\Controllers\Helpers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pawnshop;

class PawnshopController extends Controller
{
    public $image_dir = 'images/pawnshops/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Список ломбардов',
            'pawnshops' => Pawnshop::all(),
        ];
        return view('pawnshop.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pawnshop.create', ['title' => 'Доавление нового ломбарда']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has(['name', 'phone'])) {

            $data = $request->all();

            if ($file = $request->file('image')) {
                $file_path = $this->image_dir . $file->getClientOriginalName();
                $file->move($this->image_dir, $file->getClientOriginalName());

                $data['image'] = $file_path;
            }

            if (Pawnshop::create($data)) {
                $request->session()->flash('msg_success', 'Ломбард успешно создан!');
            }
            else {
                $request->session()->flash('msg_error', 'Ошибка! Попробуйте позже.');
            }
        }
        return redirect(route('pawnshop.index'));
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
        $pawnshop = Pawnshop::findOrFail($id);
        $data = [
            'title' => 'Изменить ломбард ' . $pawnshop->name,
            'pawnshop' => $pawnshop,
        ];


        return view('pawnshop.edit', $data);
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
        if ($request->has(['name', 'phone'])) {
            $pawnshop = Pawnshop::findOrFail($id);
            $data = $request->all();

            if ($file = $request->file('image')) {
                $file_path = $this->image_dir . $file->getClientOriginalName();
                $file->move($this->image_dir, $file->getClientOriginalName());

                $data['image'] = $file_path;
            }

            if ($pawnshop->update($data)) {
                $request->session()->flash('msg_success', 'Ломбард успешно изменен!');
            }
            else {
                $request->session()->flash('msg_error', 'Ошибка! Попробуйте позже.');
            }
        }
        return redirect(route('pawnshop.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $pawnshop = Pawnshop::findOrFail($id);

        if ($pawnshop->delete()) {
            $request->session()->flash('msg_success', 'Ломбард успешно удален!');
        }
        else {
            $request->session()->flash('msg_error', 'Ошибка! Попробуйте позже.');
        }

        return redirect(route('pawnshop.index'));
    }
}
