@extends('layouts.backend.app')
@section('title')
    All Houses
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('partial.successMessage')

                <div class="card my-5 mx-4">
                    <div class="card-header">
                        <h3 class="card-title float-left"><strong>All Houses ({{ $housecount }})</strong></h3>

                    </div>
                    <!-- /.card-header -->
                    @if ($houses->count() > 0)
                        <div class="">
                            <div class="table-responsive">
                                <table id="dataTableId" class="table table-bordered table-striped table-background">
                                    <thead>
                                        <tr>
                                            <th>Area Code</th>
                                            {{-- <th>Added at</th> --}}
                                            <th>Contact</th>
                                            <th>Size </th>
                                            <th>Trans Status </th>
                                            <th>Approved</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($houses as $key => $house)
                                            <tr>
                                                <td>{{ $house->plot_code }}</td>
                                                {{-- <td>{{ $house->created_at->toFormattedDateString() }}</td> --}}
                                                <td>{{ $house->user->contact }}</td>
                                                <td>{{ $house->area_size }} sqft</td>
                                                <td style="color: Red; font-weight:700">{{ $house->order->status }}</td>
                                                <td>
                                                    @if ($house->a_status == 1)
                                                        Approved
                                                    @else
                                                        Pending
                                                    @endif
                                                </td>

                                                <td>
                                                    @if ($house->status == 1)
                                                        Available
                                                    @else
                                                        Not Available
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.house.approve', $house->id) }}"
                                                        class="btn btn-warning btn-sm">Approved</a>
                                                    <a href="{{ route('admin.house.show', $house->id) }}"
                                                        class="btn btn-success btn-sm">Details</a>
                                                    <button class="btn btn-danger btn-sm" type="button"
                                                        onclick="deleteHouse({{ $house->id }})">
                                                        Delete
                                                    </button>

                                                    <form id="delete-form-{{ $house->id }}"
                                                        action="{{ route('admin.house.destroy', $house->id) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')

                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div> <!-- /.card-body -->
                    @else
                        <h2 class="text-center text-info font-weight-bold m-3">No Area Found</h2>
                    @endif

                    <div class="pagination">
                        {{ $houses->links() }}
                    </div>

                </div>
                <!-- /.card -->
            </div>
        </div>
    </div><!-- /.container -->
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script type="text/javascript">
        function deleteHouse(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure to remove this house?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, remove it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {

                    event.preventDefault();
                    document.getElementById('delete-form-' + id).submit();

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                    )
                }
            })
        }
    </script>
@endsection
