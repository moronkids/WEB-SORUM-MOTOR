@extends('base')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container">
  <div class="jumbotron">
    <h1>INPUT MOTOR</h1>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('Motors.store') }}" enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              <label for="name">Brand Motor</label>
              <input type="text" class="form-control" name="brand_motor"/>
          </div>
          <div class="form-group">
              <label for="price">Nama Motor</label>
              <input type="text" class="form-control" name="nama_motor"/>
          </div>
          <div class="form-group">
              <label for="quantity">Tipe Motor</label>
              <input type="text" class="form-control" name="tipe_motor"/>
          </div>
          <div class="form-group">
        <label for="author">Cover:</label>
        <input type="file" class="form-control" name="gambarmotor"/>
        </div>
          <button type="submit" class="btn btn-primary">Add</button>

      </form>
  </div>
</div>
@endsection
