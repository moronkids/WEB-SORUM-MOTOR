@extends('base')

@section('title', 'Khayla Motor')

@section('content')

<div class="jumbotron">
<a href="{{route('create.shop')}}" class="btn btn-success">Create</a>
  <table class="table table-hover">
    @foreach($Motor->chunk(4) as $row)
    <tr>

      @foreach($row as $z)
      <td>
        <li>Brand Motor : {{$z->brand_motor}}</li>
        <li>Nama Motor : {{$z->nama_motor}}</li>
        <li>Tipe Motor : {{$z->tipe_motor}}</li>
        <td><li><a href="{{ route('Motors.edit',$z->id)}}" class="btn btn-primary">Edit</a></li>
<br>
        <li><form action="{{ route('Motors.destroy', $z->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form></li></td>
      </td>
      <!-- <td>Nama oli: {{$z->tipe_motor}}</td> -->

      @endforeach
    </tr>
    @endforeach
  </table>




@endsection
