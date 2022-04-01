@extends('frontend.layouts.master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@section ('frontend_content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <div class="sl-pagebody">
        <div class="row row-sm">

            <div class="col-md-8 m-auto">
                <div class="card">
                    <div class="card-header">Edit Racikan
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

                        <form action="{{Route('update.racikan')}}" method="POST" class="bs-form-wrapper">
                            @csrf
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Racik Kembali Obat</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Racikan</button>
                            <input type="hidden" value="{{$racikan->id}}" name="id">
                            <div class="form-group">
                                <label for="exampleInputEmail">Nama Racikan</label>
                                <input type="text" name="nama_racikan"
                                    class="form-control @error('nama_racikan') is-invalid @enderror"
                                    id="exampleInputEmail" aria-describedby="emailHelp"
                                    value="{{$racikan->nama_racikan}}">

                                @error('nama_racikan')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail">Signa</label>
                                <select class="form-control select2" name="signa" data-placeholder="Choose Signa">
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
                                    id="exampleInputEmail" aria-describedby="emailHelp" value="{{$racikan->qty}}">

                                @error('qty')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="input-group control-group input-wrapper">
                                    <select class="form-control select2" name="obat_id[]"
                                        data-placeholder="Choose Obat">
                                        <option label="Choose Obat"></option>
                                        @foreach($obats as $obat)
                                        <option value="{{$obat->nama_obat}}"
                                            {{$obat->nama_obat == $obat->nama_obat ? "selected":""}}>
                                            {{$obat->nama_obat}}
                                        </option>
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