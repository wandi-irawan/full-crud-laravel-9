@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Tabel Data Student</div>

                
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#Createmodal">Tambah</button>

                   <table class="table table-bordered table-striped"> 
                    <head>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </head>
                    <tbody>
                    @foreach ($student as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->gender}}</td>
                            <td>{{$item->address}}</td>
                            <td>{{$item->email}}</td>
                            <td class="center" width="25%">
                                <a href="{{ url('student/'.$item->id) }}" class="btn btn-secondary">Detail</a>

                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#Updatestudent{{$item->id}}">Ubah</button>

                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Deletestudent{{$item->id}}">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                       
                    </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- tambah -->
<div class="modal fade" id="Createmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>

        
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ url('/student') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name')is-invalid @enderror" value="{{old('name')}}">

                @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror

            </div>

            <div class="mb-3">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" class="form-control @error('gender')is-invalid @enderror">
                    <option value="" hidden>--pilih--</option>
                    <option value="Male" {{old('gender') == 'Male' ? 'selected' : null }}>Male</option>
                    <option value="Female" {{old('gender') == 'Female' ? 'selected' : null }}>Female</option>
                </select>

                @error('gender')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror

            </div>

            <div class="mb-3">
                <label for="address">Address</label>
               <textarea name="address" id="address" cols="30" rows="5" class="form-control @error('address')is-invalid @enderror">{{ old('address') }}</textarea>

               @error('address')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror

            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control @error('email')is-invalid @enderror" value="{{old('email')}}">

                @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror

                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
                <button type="submit" class="btn btn-primary">Save</button>
                
                </div>
            </form>
        </div>
      </div>
    </div>
</div>

<!-- ubah -->
@foreach ($student as $item)
<div class="modal fade" id="Updatestudent{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>

        
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ url('/student/'.$item->id) }}" method="post">
            @method("PUT")
            @csrf

            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name')is-invalid @enderror" value="{{$item->name}}">
                @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" class="form-control">
                    <option value="Male">{{$item->gender == 'Male' ? 'selected' : null}}</option>
                    <option value="Female">{{$item->gender == 'Female' ? 'selected' : null}}</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="address">Address</label>
               <textarea name="address" id="address" cols="30" rows="5" class="form-control @error('address')is-invalid @enderror">{{$item->address}}</textarea>
               @error('address')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control @error('email')is-invalid @enderror" value="{{$item->email}}">
                @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
        </div>
      </div>
    </div>
</div>
    
@endforeach

{{-- hapus --}}
@foreach ($student as $item)
    <div class="modal fade" id="Deletestudent{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
            <h5 class="modal-title" id="exampleModalLabel">Delete Student</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <form action="{{ url('student/'.$item->id) }}" method="post">
            @method("DELETE")
            @csrf
            <div class="modal-body">
            are you sure to delete this student : {{$item->name}}
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
        </form>
            </div>
        </div>
  </div>
@endforeach

@endsection
