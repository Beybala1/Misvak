@extends('master.backend')
@section('title',__('backend.message'))
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-9">
                        <div class="card">
                                <div class="card-body">
                                    <div class="col-12">
                                        <div
                                            class="page-title-box d-sm-flex align-items-center justify-content-between">
                                            <h4 class="mb-sm-0">@lang('backend.message')</h4>
                                        </div>
                                    </div>
                                    <p class="fw-bold">@lang('backend.name'):{{$message->name}}</p>
                                    <p class="fw-bold">@lang('backend.email'):{{$message->email}}</p>
                                    <p class="fw-bold">@lang('backend.phone'):{{$message->phone}}</p>
                                    <p class="fw-bold">@lang('backend.subject'):{{$message->subject}}</p>
                                    <p class="fw-bold">@lang('backend.message'):{{$message->message}}</p>
                                </div>
                                <div class="mb-5 text-center">
                                    <div>
                                        <a href="mailto:{{$message->email}}"
                                           class="btn btn-primary">
                                            @lang('backend.answer')
                                        </a>
                                        <a href="{{ url()->previous() }}" type="button"
                                           class="btn btn-secondary waves-effect">
                                            @lang('backend.cancel')
                                        </a>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
