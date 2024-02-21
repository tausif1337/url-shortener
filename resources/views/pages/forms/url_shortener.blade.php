@extends('pages.master')
@section('title')
URL Shortener
@endsection
@section('body')
<div class="ttm-page-title-row">
    <div class="ttm-page-title-row-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading">
                        <h2 class="title" style="color: white;">URL Shortener</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="site-main">
    <section class="ttm-row pt-100 pb-100 clearfix">
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
                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        @if(session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <form id="urlShortener" class="ttm-contactform-2 wrap-form clearfix" method="post" action="{{ route('store_url_shortener') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <span class="text-input">
                                        <label for="name" class="mb-2 custom-label">URL Name</label>
                                        <input name="name" id="name" type="text" value="" placeholder="Enter URL Name" required="required">
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <span class="text-input">
                                        <label for="original_url" class="mb-2 custom-label">URL</label>
                                        <input name="original_url" id="original_url" type="text" value="" placeholder="URL" required="required">
                                    </span>
                                </div>
                            </div>
                            <button class="submit ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor" type="submit">Shorten</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<section class="ttm-row pt-0 pb-50 clearfix">
    <div class="container">
        <div class="card">
            <h5 class="card-header">URL List</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-striped" id="myTable">
                        <thead class="table-light">
                            <tr>
                                <th width="5%">SN</th>
                                <th width="10%">Name</th>
                                <th width="25%">Original URL</th>
                                <th width="25%">Short URL</th>
                                <th width="10%">Clicks</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @php
                            $counter = 1;
                            @endphp
                            @foreach ($url_shorteners as $url_shortener)

                            @php
                            // Check if the logged-in user is the creator of the project
                            $isCreator = auth()->user()->id === $url_shortener->created_by
                            @endphp
                            @if ($isCreator)
                            <tr>
                                <td>{{ $counter++ }}</td>
                                <td>{{ $url_shortener->name }}</td>
                                <td><a href="{{ $url_shortener->original_url }}">{{ $url_shortener->original_url }}</a></td>
                                <td><a href="{{ route('short_url.redirect', $url_shortener->short_url) }}">{{ route('short_url.redirect', $url_shortener->short_url) }}</a></td>
                                <td>{{ $url_shortener->click_count }}</td>
                                <td>
                                    <a href="{{ route('edit_url_shortener', Crypt::encrypt($url_shortener->id)) }}" class="btn btn-sm btn-primary" title="Edit"><i class="fa fa-pencil"></i></a>

                                    <a href="{{ route('delete_url_shortener', Crypt::encrypt($url_shortener->id)) }}" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection