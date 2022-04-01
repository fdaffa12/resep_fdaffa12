@extends('frontend.layouts.master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@section('obat') active @endsection
@section ('frontend_content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Racikan
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
                                            <th class="wd-15p">Nama Obat</th>
                                            <th class="wd-15p">Bahan Racikan</th>
                                            <th class="wd-15p">Signa</th>
                                            <th class="wd-15p">Qty</th>
                                            <th class="wd-20p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i = 1;
                                        @endphp
                                        @foreach ($racikans as $racikan)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{$racikan->nama_racikan}}</td>
                                            <td>{{$racikan->obat_id}}</td>
                                            <td>{{$racikan->signa}}</td>
                                            <td>{{$racikan->qty}}</td>
                                            <td>
                                                <a href="{{url ('racikans/edit/'.$racikan->id)}}"
                                                    class="btn btn-sm btn-success">Edit</a>
                                                <a href="{{url ('racikans/delete/'.$racikan->id)}}"
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
                    <div class="card-header">Add Obat
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

                        <form action="{{route ('store.racikan')}}" method="POST" class="bs-form-wrapper">
                            @csrf
                            <button type="submit" class="btn btn-primary">Add</button>
                            <div class="form-group">
                                <label for="exampleInputEmail">Nama Racikan</label>
                                <input type="text" name="nama_racikan"
                                    class="form-control @error('nama_racikan') is-invalid @enderror"
                                    id="exampleInputEmail" aria-describedby="emailHelp"
                                    placeholder="Enter Nama Racikan">

                                @error('nama_racikan')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputRSid">Signa</label>
                                <select class="form-control select2" name="signa" data-placeholder="Choose Signa">
                                    <option label="Choose Signa"></option>
                                    @foreach($signas as $signa)
                                    <option value="{{$signa->signa}}">{{$signa->signa}}</option>
                                    @endforeach
                                </select>
                                @error('signa')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail">Qty</label>
                                <input type="text" name="qty" class="form-control @error('qty') is-invalid @enderror"
                                    id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Qty">

                                @error('qty')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="input-group control-group input-wrapper">
                                    <select class="form-control select2" name="obat_id[]"
                                        data-placeholder="Choose Rumah Sakit">
                                        <option label="Choose Rumah Sakit"></option>
                                        @foreach($obats as $obat)
                                        <option value="{{$obat->nama_obat}}">{{$obat->nama_obat}}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-btn">
                                        <button class="btn btn-success bs-add-button" type="button"><i
                                                class="fa fa-plus"></i> Add</button>
                                    </div>
                                </div>
                            </div>
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
        '<div class="input-group control-group input-wrapper"><select class="form-control select2" name="obat_id[]" data-placeholder="Choose Rumah Sakit" ><option label="Choose Rumah Sakit"></option>@foreach($obats as $obat)<option value="{{$obat->nama_obat}}">{{$obat-> nama_obat}}</option>@endforeach</select><button class="btn btn-danger bs-remove-button" type="button"><i class="fa fa-minus"></i> Remove</button></div></div></br>';
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