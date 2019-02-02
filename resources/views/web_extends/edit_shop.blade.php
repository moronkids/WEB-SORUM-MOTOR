@extends('base')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container">
<div class="jumbotron">

<h1>Update Motor</h1>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('Motors.update', $motors->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Brand Motor</label>
          <input type="text" class="form-control" name="brand_motor" value={{ $motors->brand_motor}} />
        </div>
        <div class="form-group">
          <label for="price">Nama Motor</label>
          <input type="text" class="form-control" name="nama_motor" value={{ $motors->nama_motor}} />
        </div>
        <div class="form-group">
          <label for="quantity">Tipe Motor</label>
          <input type="text" class="form-control" name="tipe_motor" value={{ $motors->tipe_motor}} />
        </div>
        <div class="form-group">
        <label for="author">Cover:</label>
        <input type="file" class="form-control" name="gambarmotor"/>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection
