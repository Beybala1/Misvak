@extends('master.backend')
@section('title',__('backend.social'))
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-9">
                        <div class="card">
                            <form action="{{ route('backend.social.update',$social->id) }}" class="needs-validation"novalidate method="post">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="col-12">
                                        <div
                                            class="page-title-box d-sm-flex align-items-center justify-content-between">
                                            <h4 class="mb-sm-0">@lang('backend.new') @lang('backend.social')</h4>
                                        </div>
                                    </div>
                                    <p class="text-center alert alert-warning">@lang('backend.message-icon')</p>
                                    <div class="tab-content p-3 text-muted">
                                        <div class="mb-3">
                                            <label>@lang('backend.icon') <span class="text-danger">*</span></label>
                                            <input type="text" name="icon" value="{{ $social->icon }}" class="form-control" required placeholder="@lang('backend.icon')">
                                            <div class="valid-feedback">
                                                @lang('backend.icon') @lang('messages.is-correct')
                                            </div>
                                            <div class="invalid-feedback">
                                                @lang('backend.icon') @lang('messages.not-correct')
                                            </div>
                                        </div>
                                        <label>@lang('backend.link') <span
                                            class="text-danger">*</span></label>
                                            <textarea type="text" name="link"
                                            required class="form-control" id="validationCustom"
                                            rows="7"
                                            placeholder="@lang('backend.link')">{{ $social->link }}</textarea>
                                            <div class="valid-feedback">
                                                @lang('backend.link') @lang('messages.is-correct')
                                            </div>
                                            <div class="invalid-feedback">
                                                @lang('backend.link') @lang('messages.not-correct')
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