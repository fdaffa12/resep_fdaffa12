@extends('admin.layouts.master')
@section('obat') active @endsection
@section ('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Obat
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
                                            <th class="wd-15p">Stok</th>
                                            <th class="wd-15p">Status</th>
                                            <th class="wd-20p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i = 1;
                                        @endphp
                                        @foreach ($obats as $obat)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{$obat->nama_obat}}</td>
                                            <td>{{$obat->stok}}</td <td>
                                            <td>
                                                @if($obat->status == 1)
                                                <span class="badge badge-success">Ada/Tersdia</span>
                                                @else
                                                <span class="badge badge-danger">Habis</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{url ('admin/obats/edit/'.$obat->id)}}"
                                                    class="btn btn-sm btn-success">Edit</a>
                                                <a href="{{url ('admin/obats/delete/'.$obat->id)}}"
                                                    class="btn btn-sm btn-danger">Delete</a>
                                                @if($obat->status == 1)
                                                <a href="{{url ('admin/obats/inactive/'.$obat->id)}}"
                                                    class="btn btn-sm btn-danger">Habis</a>
                                                @else
                                                <a href="{{url ('admin/obats/active/'.$obat->id)}}"
                                                    class="btn btn-sm btn-success">Ada</a>
                                                @endif
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

                        <form action="{{route ('store.obat')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail">Nama Obat</label>
                                <input type="text" name="nama_obat"
                                    class="form-control @error('nama_obat') is-invalid @enderror" id="exampleInputEmail"
                                    aria-describedby="emailHelp" placeholder="Enter Nama Obat">

                                @error('nama_obat')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail">Stok</label>
                                <input type="text" name="stok" class="form-control @error('stok') is-invalid @enderror"
                                    id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Stok">

                                @error('stok')
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