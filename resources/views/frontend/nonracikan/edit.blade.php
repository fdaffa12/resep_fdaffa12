@extends('frontend.layouts.master')
@section ('frontend_content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <div class="sl-pagebody">
        <div class="row row-sm">

            <div class="col-md-8 m-auto">
                <div class="card">
                    <div class="card-header">Edit Non Racikan
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

                        <form action="{{Route('update.nonracikan')}}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$nonracikan->id}}" name="id">
                            <div class="form-group">
                                <label for="exampleInputEmail">Obatt</label>
                                <select class="form-control select2" name="nama_obat" data-placeholder="Choose Obatt">
                                    <option label="Choose Obatt"></option>
                                    @foreach($obats as $obat)
                                    <option value="{{$obat->nama_obat}}"
                                        {{$obat->nama_obat == $nonracikan->nama_obat ? "selected":""}}>
                                        {{$obat->nama_obat}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('nama_obat')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail">Rumah Sakit</label>
                                <select class="form-control select2" name="signa" data-placeholder="Choose Rumah Sakit">
                                    <option label="Choose Rumah Sakit"></option>
                                    @foreach($signas as $signa)
                                    <option value="{{$signa->signa}}"
                                        {{$signa->signa == $signa->signa ? "selected":""}}>
                                        {{$signa->signa}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('signa')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail">Qty</label>
                                <input type="text" name="qty" class="form-control @error('qty') is-invalid @enderror"
                                    id="exampleInputEmail" aria-describedby="emailHelp" value="{{$nonracikan->qty}}">

                                @error('qty')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update Non Racikan</button>
                        </form>

                    </div>
                </div>
            </div>

        </div><!-- sl-page-title -->

    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
@endsection