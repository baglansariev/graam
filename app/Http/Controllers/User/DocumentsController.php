<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\ClientHelper;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserDocument;
use App\Models\DocumentCategory;
use League\CommonMark\Block\Element\Document;
use GuzzleHttp\Exception\ServerException;

class DocumentsController extends Controller
{
    use ClientHelper;

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
            'document_categories'   => DocumentCategory::all(),
            'user_docs'             => Auth::user()->documents(),
            'user'             => Auth::user(),
        ];
       // return view('admin.user.documents.index', $data);
        return view('user.docs', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'doc_categories' => DocumentCategory::all(),
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
        $files = $request->file('documents');

        foreach ($files as $file) {
            $fileOriginalName   = $file->getClientOriginalName();
            $doc_path           = $this->docs_dir . Auth::user()->id;

            $document = Auth::user()->documents()->create([
                'category_id'       => $request->input('doc_category'),
                'name'              => $fileOriginalName,
                'path'              => '',
                'size'              => $file->getSize(),
            ]);

            $file->move($doc_path, $fileOriginalName);

            $file_full_path = $request->root() . '/' . $doc_path . '/' . $fileOriginalName;

            try {
                $response = $this->getResponseFromClientTest2('POST', '/contractor/upload-doc', [
                    'form_params' => [
                        'document' => [
                            'user_id' => Auth::user()->crm_id,
                            'name' => $fileOriginalName,
                            'full_path' => $file_full_path,
                            'extension' => $file->getClientOriginalExtension(),
                            'doc_name' => 'doc' . $document->category->id,
                        ],
                        'api_token' => $this->api_token,
                    ],
                ]);
            }
            catch (ClientException $exception) {
                echo '<pre>';
                print_r($exception->getResponse()->getBody(true));
                exit;
            }

            $response = json_decode($response, true);

            unlink($doc_path . '/' . $fileOriginalName);

            if (isset($response['id']) && isset($response['path'])) {
                $document->crm_id = $response['id'];
                $document->path = $response['path'];
                $document->save();
            }
        }

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
        $document = UserDocument::findOrFail($id);

        $temp_file = file_get_contents($document->path);
        $file_path = 'documents/temp/' . $document->name;
        file_put_contents($file_path, $temp_file);

        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_path));

       readfile($file_path);
       unlink($file_path);
       exit;
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
            'doc_categories'    => DocumentCategory::all(),
            'document'          => UserDocument::find($id),
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
        $file = $request->file('document');

        $fileOriginalName   = $file->getClientOriginalName();
        $doc_path           = $this->docs_dir . Auth::user()->id;

        $document = UserDocument::find($id);
        $document->update([
            'category_id'       => $request->input('doc_category'),
            'name'              => $fileOriginalName,
            'path'              => '',
            'size'              => $file->getSize(),
        ]);

        $file->move($doc_path, $fileOriginalName);


        $file_full_path = $request->root() . '/' . $doc_path . '/' . $fileOriginalName;

        $response = $this->getResponseFromClientTest2('POST', '/contractor/upload-doc', [
            'form_params' => [
                'document' => [
                    'id' => $document->crm_id,
                    'name' => $fileOriginalName,
                    'full_path' => $file_full_path,
                    'extension' => $file->getClientOriginalExtension(),
                    'doc_name' => 'doc' . $document->category->id,
                ],
                'api_token' => $this->api_token,
            ],
        ]);

        $response = json_decode($response, true);

        unlink($doc_path . '/' . $fileOriginalName);

        if (isset($response['id'])) {
            $document->path = $response['path'];
            $document->save();
        }

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
        $document = Document::find($id);

        $response = $this->getResponseFromClientTest2('POST', '/contractor/del-doc', [
            'form_params' => [
                'id' => $document->crm_id,
                'api_token' => $this->api_token,
            ],
        ]);

        $response = json_decode($response, true);

        return redirect(route('documents.index'));
    }

    public function getDocNamesList()
    {
        return [
            'Учетная карточка контрагента ЮЛ/ИП.',
            'Анкета ЮЛ/ИП',
            'Скан-копия свидетельства ОГРН/ОГРНИП ЮЛ (если регистрация прошла до 01.01.2017г.) / ИП',
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
