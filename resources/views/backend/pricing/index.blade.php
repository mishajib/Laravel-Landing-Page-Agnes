@extends('backend.layouts.app')

@section('dashboard-title', 'Pricing-Part')

@section('content-header')
    <h1>
        Pricing Part
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
                            Pricing Section
                        </h2>
                        <a href="{{ route('pricing.create') }}" class="btn btn-default pull-right" style="margin-top: -25px;">Add New</a>
                        <a href="{{ route('pricing-feature.index') }}" class="btn btn-success pull-right" style="margin-top: -25px; margin-right: 10px;">Pricing Feature</a>
                    </div>
                    <div class="panel-body">
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Feature Count</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($prices as $price)
                                    <tr>
                                        <td>{{ $price->title }}</td>
                                        <td>{{ $price->price }}</td>
                                        <td>{{ $price->conditions->count() }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('pricing.edit', $price->id) }}" class="btn btn-info btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <button onclick="deletePrice({{ $price->id }})" class="btn btn-danger" type="button">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <form id="delete-form-{{ $price->id }}" action="{{ route('pricing.destroy', $price->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                            <a href="{{ route('pricing.show', $price->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Feature Count</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <!-- Sweet Alert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.3.0/dist/sweetalert2.all.min.js"></script>
    <!-- Sweet Alert 2 End -->
    <script type="text/javascript">
        function deletePrice(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false,
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
