@extends('pages.master')
@section('title')
URL Shortener - Edit URL Shortener Form
@endsection
@section('body')
<div class="ttm-page-title-row">
    <div class="ttm-page-title-row-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading">
                        <h2 class="title" style="color: white;">Edit URL Shortener</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="site-main">
    <section class="ttm-row pt-100 pb-50 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ttm-col-bgcolor-yes ttm-bg ttm-bgcolor-white z-index-2 spacing-5 box-shadow">
                        <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <form id="" class="ttm-contactform-2 wrap-form clearfix" method="post" action="{{ route('update_url_shortener') }}">
                            @csrf
                            <input type="hidden" value="{{ Crypt::encrypt($url_shorteners_info->id) }}" name="id">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="name" class="mb-2 custom-label">URL Name</label>
                                    <span class="text-input"><input name="name" id="name" type="text" value="{{ $url_shorteners_info->name }}" required="required"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <span class="text-input">
                                        <label for="original_url" class="mb-2 custom-label">URL</label>
                                        <input name="original_url" id="original_url" type="text"  value="{{ $url_shorteners_info->original_url }}" placeholder="URL" required="required">
                                    </span>
                                </div>
                            </div>
                            <button class="submit ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor" type="submit">Shorten
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection