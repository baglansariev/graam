@extends('layouts.personal')
@section('content')

         <h2 class="orders-heading">Загружен 1 из 10 документов</h2>
         <div class="container docs">
             <div class="row">
                 <div class="col-sm-12">
                     <div class="popup-content d-flex justify-content-center">
                         <span class="content d-flex flex-column align-items-start">
                             <span class="order-infos">
                                 <ul class="order-infos-list">
                                     @foreach($document_categories as $category)
                                         @if($user->documents()->whereCategoryId($category->id)->count())
                                            <li class="order-infos-list-item done">
                                         @else <li class="order-infos-list-item ">
                                         @endif
                                             <span class="list-item-heading">{{ $category['name'] }}</span>

                                             @if($user->documents()->whereCategoryId($category->id)->count())
                                                 @foreach($user->documents()->whereCategoryId($category->id)->get() as $document)
                                                     <span>
                                                         <a href="{{ route('documents.show', $document->id) }}" target="_blank" class="mr-1">{{ $document->name }}</a>
                                                         <form action="{{ route('documents.destroy', $document->id) }}" method="POST">
                                                         @csrf
                                                         <input type="hidden" name="_method" value="DELETE">
                                                             <button type="submit" class="ml-1">X</button>
                                                        </form>
                                                     </span>
                                                 @endforeach
                                             @else
                                                 <span>

                                                     <form id="upload_file" action="{{ route('documents.store') }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                         <label for="inputAddress"><span class="upload-file">Загрузить файл</span> doc, pdf</label>
                                                                <input type="text" name="doc_category" value="{{ $category->id }}" hidden>
                                                                <input onchange="document.getElementById('upload_file').submit()"
                                                                    type="file" name="documents[]" class="form-control file_input" id="inputAddress" multiple required>

{{--                                                            <div class="form-group d-flex justify-content-between mt-5">--}}
{{--                                                                <button type="submit" class="btn btn-success">Сохранить</button>--}}
{{--                                                                <a href="{{ route('documents.index') }}" class="btn btn-danger right">Отмена</a>--}}
{{--                                                            </div>--}}
                                                        </form>
                                                </span>
                                             @endif

                                             @endforeach
                                         </li>





                               <!--      <li class="order-infos-list-item done">
                                         <span class="list-item-heading">Анкета ЮЛ/ИП</span>
                                     </li>
                                     <li class="order-infos-list-item disabled">
                                         <span class="list-item-heading">Скан-копия свидетельства ОГРН/ОГРНИП ЮЛ (если регистрация прошла до 01.01.2017г.) /ИП</span>
                                         <span><a href="">Загрузить файл</a> doc, pdf</span>
                                     </li>
                                     <li class="order-infos-list-item disabled">
                                         <span class="list-item-heading">Скан-копия свидетельства ИНН ЮЛ/ИП</span>
                                         <span><a href="">Загрузить файл</a> doc, pdf</span>
                                     </li>
                                     <li class="order-infos-list-item disabled">
                                         <span class="list-item-heading">Скан-копия уведомления о поставке на спец. учет (со всеми изменениями) ЮЛ/ИП</span>
                                         <span><a href="">Загрузить файл</a> doc, pdf</span>
                                     </li>
                                     <li class="order-infos-list-item disabled">
                                         <span class="list-item-heading">Скан-копия карты спец. учета ЮЛ/ИП</span>
                                         <span><a href="">Загрузить файл</a> doc, pdf</span>
                                     </li>
                                     <li class="order-infos-list-item disabled">
                                         <span class="list-item-heading">Скан-копия уведомления статистики ЮЛ/ИП</span>
                                         <span><a href="">Загрузить файл</a> doc, pdf</span>
                                     </li>
                                     <li class="order-infos-list-item disabled">
                                         <span class="list-item-heading">Скан-копия решения или протокола о создании ЮЛ ЮЛ</span>
                                         <span><a href="">Загрузить файл</a> doc, pdf</span>
                                     </li>
                                     <li class="order-infos-list-item disabled">
                                         <span class="list-item-heading">Скан-копия решения или протокола о назначении ген. директора ЮЛ</span>
                                         <span><a href="">Загрузить файл</a> doc, pdf</span>
                                     </li>
                                     <li class="order-infos-list-item disabled">
                                         <span class="list-item-heading">Скан-копия приказа о назначении ген. директора ЮЛ</span>
                                         <span><a href="">Загрузить файл</a> doc, pdf</span>
                                     </li>
                                     <li class="order-infos-list-item disabled">
                                         <span class="list-item-heading">Скан-копия паспорта ген. Директора ЮЛ/ ИП ЮЛ/ИП</span>
                                         <span><a href="">Загрузить файл</a> doc, pdf</span>
                                     </li>
                                     <li class="order-infos-list-item disabled">
                                         <span class="list-item-heading">Скан-копия Устава ЮЛ ЮЛ</span>
                                         <span><a href="">Загрузить файл</a> doc, pdf</span>
                                     </li> -->
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

@endsection
