@extends('backend.layouts.app')

@section('dashboard-title', 'Header-Part')

@section('content-header')
    <h1>
        Create
        <small>Control Header Part</small>
    </h1>
@endsection

@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading" style="padding: 20px 20px;">
                        <h2 class="panel-title">
                            Show Header Content
                        </h2>
                        <a href="{{ route('header.index') }}" class="btn btn-danger pull-right" style="margin-top: -25px;">Back</a>
                    </div>
                    <div class="panel-body">
                        <h3>Title: {{ $header->title }}</h3>
                        <h5>Description: {{ $header->description }}</h5>
                        <a href="{{ route('header.edit', $header->id) }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

