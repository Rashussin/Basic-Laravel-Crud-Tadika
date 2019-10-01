@extends('layout.master')

@section('content')
            @if(session('done'))
                <div class="alert alert-success" role="alert">
                {{session('done')}}
                </div>
            @endif
            <div class="row">
                <div class="col-6">
                    <h1>Maklumat Pelajar</h1>
                </div>
                <div class="col-6">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                    Tambah Pelajar
                    </button>
                </div>


                <table class="table table-striped"> 
                    <tr>
                        <th>Nama Depan</th>
                        <th>Nama Belakang</th>
                        <th>Jantina</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach($data_pelajar as $pelajar)
                    <tr>           
                        <td>{{$pelajar->namaDepan}}</td>
                        <td>{{$pelajar->namaBelakang}}</td>
                        <td>{{$pelajar->jantina}}</td>
                        <td>{{$pelajar->alamat}}</td>        
                        <td><a href="/pelajar/{{$pelajar->id}}/edit" class="btn btn-warning">Ubah</a> <br>
                        <a href="/pelajar/{{$pelajar->id}}/delete" class="btn btn-danger">Buang</a>
                        </td>   
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="/pelajar/create" method="POST">
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleFormControlInput1">Nama Depan</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="namaDepan" placeholder="Masuk Nama Depan">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Nama Belakang</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="namaBelakang" placeholder="Masuk Nama Belakang">
            </div>
            <div>
                Jantina: <input type="radio" name="jantina" value="Lelaki">Lelaki &nbsp
                <input type="radio" name="jantina" value="Perempuan">Perempuan 
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Alamat</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat" placeholder="Masuk Alamat"></textarea>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
            </div>
            </div>
        </div>
@endsection      