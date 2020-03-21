@extends('backend.layouts.app')

@section('dashboard-title', 'Pricing-Part')

@section('content-header')
    <h1>
        Show Pricing
        <small>Control Pricing Part</small>
    </h1>
@endsection

@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading" style="padding: 20px 20px;">
                        <h2 class="panel-title">
                            Show Price Content
                        </h2>
                        <a href="{{ route('pricing.index') }}" class="btn btn-danger pull-right" style="margin-top: -25px;">Back</a>
                    </div>
                    <div class="panel-body">
                        <h3>Title: {{ $price->title }}</h3>
                        <h5>Price: {{ $price->price }}</h5>
                        <ol>
                            @foreach($price->conditions as $feature)
                                <li>{{ $feature->feature }}</li>
                            @endforeach
                        </ol>
                        <a href="{{ route('pricing.edit', $feature->id) }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

