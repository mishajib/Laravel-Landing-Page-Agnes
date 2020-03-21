@extends('backend.layouts.app')

@section('dashboard-title', 'Condition-Part')

@section('content-header')
    <h1>
        Edit
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
                            Edit Pricing Condition
                        </h2>
                        <a href="{{ route('pricing-feature.index') }}" class="btn btn-danger pull-right" style="margin-top: -25px;">Back</a>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" style="padding-right: 120px;" action="{{ route('pricing-feature.update', $feature->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="title">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{ $feature->feature }}">
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

