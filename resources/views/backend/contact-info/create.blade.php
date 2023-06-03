@extends('master.backend')
@section('title',__('backend.contact-info'))
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-9">
                        <div class="card">
                            <form action="{{ route('backend.contact-info.store') }}" class="needs-validation" novalidate
                                  method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="col-12">
                                        <div
                                            class="page-title-box d-sm-flex align-items-center justify-content-between">
                                            <h4 class="mb-sm-0">@lang('backend.contact-info')</h4>
                                        </div>
                                    </div>
                                    <div class="tab-content p-3 text-muted">
                                        <label>@lang('backend.content') <span
                                            class="text-danger">*</span></label>
                                            <textarea type="text" name="content"
                                            required class="form-control" id="validationCustom"
                                            rows="7"
                                            placeholder="@lang('backend.content')"></textarea>
                                            <div class="valid-feedback">
                                                @lang('backend.content') @lang('messages.is-correct')
                                            </div>
                                            <div class="invalid-feedback">
                                                @lang('backend.content') @lang('messages.not-correct')
                                            </div>
                                    </div>
                                </div>
                                <div class="mb-5 text-center">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                            @lang('backend.submit')
                                        </button>
                                        <a href="{{ url()->previous() }}" type="button"
                                           class="btn btn-secondary waves-effect">
                                            @lang('backend.cancel')
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
