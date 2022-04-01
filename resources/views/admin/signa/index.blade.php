@extends('admin.layouts.master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@section('signa') active @endsection
@section ('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Signa
                    </div>

                    <div class="card-body">
                        <div class="card pd-20 pd-sm-40">
                            <h6 class="card-body-title">Basic Responsive DataTable</h6>
                            @if(session('Catupdate'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{session('Catupdate')}}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if(session('delete'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{session('delete')}}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            <div class="table-wrapper">
                                <table id="datatable1" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-5p">S1</th>
                                            <th class="wd-35p">Signa</th>
                                            <th class="wd-20p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i = 1;
                                        @endphp
                                        @foreach ($signas as $signa)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{$signa->signa}}</td>
                                            <td>
                                                <a href="{{url ('admin/signas/edit/'.$signa->id)}}"
                                                    class="btn btn-sm btn-success">Edit</a>
                                                <a href="{{url ('admin/signas/delete/'.$signa->id)}}"
                                                    class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div><!-- table-wrapper -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Add Signa
                    </div>

                    <div class="card-body">
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{session('success')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <form action="{{route ('store.signa')}}" method="POST" class="bs-form-wrapper">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail">Signa</label>
                                <input type="text" name="signa"
                                    class="form-control @error('signa') is-invalid @enderror" id="exampleInputEmail"
                                    aria-describedby="emailHelp" placeholder="Enter Signa">

                                @error('signa')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="input-group control-group input-wrapper">
                                    <select class="form-control select2" name="contoh[]"
                                        data-placeholder="Choose Rumah Sakit">
                                        <option label="Choose Rumah Sakit"></option>
                                        @foreach($obats as $obat)
                                        <option value="{{$obat->id}}">{{$obat->nama_obat}}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-btn">
                                        <button class="btn btn-success bs-add-button" type="button"><i
                                                class="fa fa-plus"></i> Add</button>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>

                    </div>
                </div>
            </div>

        </div><!-- sl-page-title -->

    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
@endsection

<script>
jQuery(document).ready(function() {
    var maxLimit = 5;
    var appendHTML =
        '<div class="input-group control-group input-wrapper"><select class="form-control select2" name="contoh[]" data-placeholder="Choose Rumah Sakit" ><option label="Choose Rumah Sakit"></option>@foreach($obats as $obat)<option value="{{$obat->id}}">{{$obat-> nama_obat}}</option>@endforeach</select><button class="btn btn-danger bs-remove-button" type="button"><i class="fa fa-minus"></i>Remove</button></div></div></br>';
    var x = 1;

    // for addition
    jQuery('.bs-add-button').click(function(e) {
        e.preventDefault();
        if (x < maxLimit) {
            jQuery('.bs-form-wrapper').append(appendHTML);
            x++;
        }
    });

    // for deletion
    jQuery('.bs-form-wrapper').on('click', '.bs-remove-button', function(e) {
        e.preventDefault();
        jQuery(this).parents('.input-wrapper').remove();
        x--;
    });
});
</script>