@extends('backend.layouts.app')

@section('dashboard-title', 'Pricing-Part')

@push('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/backend/bower_components/select2/dist/css/select2.min.css') }}">
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #3c8dbc;
            border-color: #367fa9;
            padding: 1px 10px;
            color: #fff;
        }
    </style>
@endpush

@section('content-header')
    <h1>
        Edit
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
                            Edit Pricing
                        </h2>
                        <a href="{{ route('pricing.index') }}" class="btn btn-danger pull-right" style="margin-top: -25px;">Back</a>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" style="padding-right: 120px;" action="{{ route('pricing.update', $price->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="title">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{ $price->title }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="feature">Features</label>
                                <div class="col-sm-10 {{ $errors->has('features')? 'focused error':'' }}">
                                    <select class="form-control select2" name="features[]" id="feature" data-live-search="true" multiple="multiple" data-placeholder="Select a State"
                                            style="width: 100%;">
                                        @foreach($features as $feature)
                                            <option
                                                @foreach($price->conditions as $priceFeature)
                                                    {{ $priceFeature->id == $feature->id ? 'selected':'' }}
                                                @endforeach
                                                value="{{ $feature->id }}">{{ $feature->feature }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="price">Price</label>
                                <div class="col-sm-10">
                                    <input type="number" step="0.01" class="form-control" id="price" placeholder="Enter Price" name="price" value="{{ $price->price }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" name="submit" class="btn btn-default">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <!-- Select2 -->
    <script src="{{ asset('assets/backend/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        //Initialize Select2 Elements
        $('.select2').select2()
    </script>
@endpush
