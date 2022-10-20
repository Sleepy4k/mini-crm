@extends('dashboard.layouts.main')
@section('title', 'Companies')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Perusahaan</h1>
</div>
<br>
<a class="btn btn-success mb-3" href="{{ route('companies.create')}}">Tambah</a>
<div class="row">
    <div class="col-md-6">
        <form action="{{route('companies.index')}}"> 
            <div class="input-group mb-3">
                <form action="{{route('companies.index')}}" method="GET"> 
                <input type="text" class="form-control" placeholder="Search.." name="search">
                <button class="btn btn-primary" type="submit">Search</button>
              </div>
        </form> 
    </form>
    </div>
</div>
<br>
<div class="table-responsive">
    <table class="table table-striped table-sm table-bordered" border="1">
        <thead>
            <tr class="table-success">
                <th class="text-center">No</th>
                <th>Nama Perusahaan</th>
                <th>Email</th>
                <th>Logo Perusahaan</th>
                <th>Website</th>
                <th colspan="2">Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $item)
                <tr class="align-middle">
                    <td>{{$companies->firstItem() + $loop->index}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td><img src="{{ asset('storage/'.$item->logo)}}" height="60"></td>
                    <td><a href="{{$item->website}}">{{$item->website}}</a></td>
                    <td>
                        <a href="/companies/{{$item->id}}/edit" class="btn btn-primary">Edit</a>
                        <form action="/destroy/{{$item->id}}" class="d-inline"
                            method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" onclick="return confirm ('Apakah anda yakin ingin menghapus data?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$companies->links()}}
</div>
@endsection