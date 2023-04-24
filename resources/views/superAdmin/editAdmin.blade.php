@extends('layoutSA.layout')
@section('imageProfile')  
 <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
       <img src="{{$user->selfie}}" alt="profile"/>
     </a>
@endsection
@section('body')
<div class="row">
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">{{ __('words.addAdmin') }}</h4>       
        <div class="table-responsive">




          <form action="{{ url('updateAdmin',$user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="row">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>


          <table class="table">
            <thead>
            <tr>
              <td><b>{{ __('words.name') }}</b></td>
              <td><input type="text" required name="name" value="{{$user->name}}"></td>
            </tr>
            <tr>
              <td><b>{{ __('words.email') }}</b></td>
              <td><input type="email" required name="email" value="{{$user->email}}"></td>
            </tr>
            <tr>
              <td><b>{{ __('words.selfie') }}</b></td>
              <td><input type="file" name="selfie"></td>
              <td><img src="{{$user->selfie}}" alt=""></td>
            </tr>
            <tr>
              <td><b>{{ __('words.facebook') }}</b></td>
              <td><input type="text" name="facebook" value="{{$user->facebook}}"></td>
            </tr>
            <tr>
              <td><b>{{ __('words.instagram') }}</b></td>
              <td><input type="text" name="instagram" value="{{$user->instagram}}"></td>
            </tr>
            <tr>
              <td><b>{{ __('words.phone') }}</b></td>
              <td><input type="number" required name="phone" value="{{$user->phone}}"></td>
            </tr>
            <tr>
              <td><b><button class="btn btn-primary btn-icon-text" type="submit">{{ __('words.save') }}</button></b>  </td>
            </tr>
          </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
