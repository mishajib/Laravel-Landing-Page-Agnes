@extends('backend.layouts.app')

@section('dashboard-title', 'Condition-Part')

@section('content-header')
    <h1>
        Show Pricing
        <small>Control Pricing Condition Part</small>
    </h1>
@endsection

@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading" style="padding: 20px 20px;">
                        <h2 class="panel-title">
                            Show Price Condition Content
                        </h2>
                        <a href="{{ route('pricing-feature.index') }}" class="btn btn-danger pull-right" style="margin-top: -25px;">Back</a>
                    </div>
                    <div class="panel-body">
                        <h3>Title: {{ $feature->feature }}</h3>
                        <a href="{{ route('pricing-feature.edit', $feature->id) }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

