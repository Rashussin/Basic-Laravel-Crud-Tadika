@extends('layout.master')

@section('content')
            <div class="row">
                <div class="col-12">
                    <h1>Maklumat Pelajar</h1>

                    <form action="/pelajar/{{$pelajar->id}}/update" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Depan</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="namaDepan" placeholder="Masuk Nama Depan" value="{{$pelajar->namaDepan}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Belakang</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="namaBelakang" placeholder="Masuk Nama Belakang" value="{{$pelajar->namaBelakang}}">
                    </div>
                    <div>
                        Jantina: <input type="radio" name="jantina" value="Lelaki" @if($pelajar->jantina == 'Lelaki') checked @endif>Lelaki &nbsp
                        <input type="radio" name="jantina" value="Perempuan" @if($pelajar->jantina == 'Perempuan') checked @endif>Perempuan 
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Alamat</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat" placeholder="Masuk Alamat">{{$pelajar->alamat}}</textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>                     
                </div>
                
            </div>
@endsection         