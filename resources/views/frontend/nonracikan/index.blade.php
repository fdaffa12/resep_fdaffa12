@extends('frontend.layouts.master')
@section('obat') active @endsection
@section ('frontend_content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Non Racikan
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
                                            <th class="wd-15p">Signa</th>
                                            <th class="wd-15p">Qty</th>
                                            <th class="wd-20p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i = 1;
                                        @endphp
                                        @foreach ($nonracikans as $nonracikan)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{$nonracikan->nama_obat}}</td>
                                            <td>{{$nonracikan->signa}}</td>
                                            <td>{{$nonracikan->qty}}</td>
                                            <td>
                                                <a href="{{url ('nonracikans/edit/'.$nonracikan->id)}}"
                                                    class="btn btn-sm btn-success">Edit</a>
                                                <a href="{{url ('nonracikans/delete/'.$nonracikan->id)}}"
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

                        <form action="{{route ('store.nonracikan')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputRSid">Obat</label>
                                <select class="form-control select2" name="nama_obat" data-placeholder="Choose Obat">
                                    <option label="Choose Obat"></option>
                                    @foreach($obats as $obat)
                                    <option value="{{$obat->nama_obat}}">{{$obat->nama_obat}}</option>
                                    @endforeach
                                </select>
                                @error('nama_obat')
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