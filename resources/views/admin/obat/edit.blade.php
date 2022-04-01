@extends('admin.layouts.master')
@section ('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <div class="sl-pagebody">
        <div class="row row-sm">

            <div class="col-md-8 m-auto">
                <div class="card">
                    <div class="card-header">Edit Obat
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

                        <form action="{{route ('update.obat')}}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$obat->id}}" name="id">
                            <div class="form-group">
                                <label for="exampleInputEmail">Nama obat</label>
                                <input type="text" name="nama_obat"
                                    class="form-control @error('nama_obat') is-invalid @enderror" id="exampleInputEmail"
                                    aria-describedby="emailHelp" value="{{$obat->nama_obat}}">

                                @error('nama_obat')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail">Stok obat</label>
                                <input type="text" name="stok" class="form-control @error('stok') is-invalid @enderror"
                                    id="exampleInputEmail" aria-describedby="emailHelp" value="{{$obat->stok}}">

                                @error('stok')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update obat</button>
                        </form>

                    </div>
                </div>
            </div>

        </div><!-- sl-page-title -->

    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
@endsection