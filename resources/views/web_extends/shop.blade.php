@extends('base')
<!DOCTYPE html>
<html>


@section('title', 'Khayla Motor')

@section('content')
<style media="screen">
  .jumbotron {
    background: none;
  }
</style>
<div class="jumbotron">
<a href="{{route('Motors.create')}}" class="btn btn-success">Create</a>
<div class="container">
  <table class="table">
<h1>DAFTAR MOTOR</h1><br>
    @foreach($Motor->chunk(3) as $row)
    <tr>

      @foreach($row as $z)
      <td>
        <img class="card-img-top" width="200px"; src="{{url('storage/'.$z->filename)}}" alt="{{$z->filename}}">
        <div class="card-body">
        <p ><b>Brand Motor :</b><br>{{$z->brand_motor}}</p>
        <p ><b>Nama Motor :</b><br>{{$z->nama_motor}}</p>
        <p ><b>Tipe Motor :</b><br>{{$z->tipe_motor}}</p>
        <td>
        <p><a href="{{ route('Motors.edit',$z->id)}}" class="btn btn-primary">Edit</a></p><br>

        <form action="{{ route('Motors.destroy', $z->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                </td>

      </td>
      <!-- <td>Nama oli: {{$z->tipe_motor}}</td> -->

      @endforeach
    </tr>
    @endforeach
  </table>

</div>




@endsection
</html>
