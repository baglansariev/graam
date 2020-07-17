<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserDocument;

class DocumentsController extends Controller
{
    public $docs_dir;

    public function __construct()
    {
        $this->docs_dir = 'documents/';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'documents' => Auth::user()->documents(),
            'user' => Auth::user(),
        ];
        return view('admin.user.documents.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'doc_names' => $this->getDocNamesList(),
        ];
        return view('admin.user.documents.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file               = $request->file('document');
        $fileOriginalName   = $file->getClientOriginalName();
        $doc_path           = $this->docs_dir . Auth::user()->id;

        Auth::user()->documents()->create([
            'name'              => $request->input('doc_name'),
            'original_name'     => $fileOriginalName,
            'path'              => $doc_path . '/' . $fileOriginalName,
            'size'              => $file->getSize(),
        ]);

        $file->move($doc_path, $fileOriginalName);

        return redirect(route('documents.index'));
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
        $data = [
            'doc_names'  => $this->getDocNamesList(),
            'document'   => UserDocument::find($id),
        ];

        return view('admin.user.documents.edit', $data);
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
        $file               = $request->file('document');
        $fileOriginalName   = $file->getClientOriginalName();
        $doc_path           = $this->docs_dir . Auth::user()->id;

        UserDocument::find($id)->update([
            'name'              => $request->input('doc_name'),
            'original_name'     => $fileOriginalName,
            'path'              => $doc_path . '/' . $fileOriginalName,
            'size'              => $file->getSize(),
        ]);

        $file->move($doc_path, $fileOriginalName);

        return redirect(route('documents.index'));
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

    public function getDocNamesList()
    {
        return [
            'Учетная карточка контрагента ЮЛ/ИП.',
            'Анкета ЮЛ/ИП',
            'Скан-копия свидетельства ОГРН/ОГРНИП ЮЛ (если регистрация прошла до 01.01.2017г.) /ИП',
            'Скан-копия свидетельства ИНН ЮЛ/ИП',
            'Скан-копия уведомления о поставке на спец. учет (со всеми изменениями) ЮЛ/ИП',
            'Скан-копия карты спец. учета ЮЛ/ИП',
            'Скан-копия уведомления статистики ЮЛ/ИП',
            'Скан-копия решения или протокола о создании ЮЛ ЮЛ',
            'Скан-копия решения или протокола о назначении ген. директора ЮЛ',
            'Скан-копия приказа о назначении ген. директора ЮЛ',
            'Скан-копия паспорта ген. Директора ЮЛ/ ИП ЮЛ/ИП',
            'Скан-копия Устава ЮЛ ЮЛ'
        ];
    }
}
