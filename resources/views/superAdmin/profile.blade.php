@extends('layoutSA.layout')
@section('imageProfile')  
 <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
       <img src="{{$user->selfie}}" alt="profile"/>
     </a>
@endsection
@section('body')
<div class="row">
  <div class="col-lg-6 col-ml-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">{{ __('words.profile') }}</h4>       
        <div class="table-responsive">




          <form action="{{ url('saveProfileSuperAdmin') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('GET')
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
            
            <tbody>
                <tr>
                    <td><b>{{ __('words.name') }}</b></td>
                    <td><input type="text" required name="name" value="{{$superAdmin->name}}"></td>
                  </tr>
                  <tr>
                    <td><b>{{ __('words.email') }}</b></td>    
                        <td><input type="text" name="email" value="{{$superAdmin->email}}"></td>
                  </tr>
                  <tr>
                    <td><b>{{ __('words.selfie') }}</b></td>
                    <td><input type="file"  name="selfie" ></td>
                    <td><img src="{{$superAdmin->selfie}}" alt=""></td>
                  </tr>
                  <tr>
                    <td><b>{{ __('words.facebook') }}</b></td>
                    <td><input type="text" name="facebook" value="{{$superAdmin->facebook}}"></td>
                 
                  </tr>
                  <tr>
                    <td><b>{{ __('words.instagram') }}</b></td>
                    <td><input type="text" name="instagram" value="{{$superAdmin->instagram}}"></td>
                   
                  </tr>
                  <tr>
                    <td><b>{{ __('words.phone') }}</b></td>
                    <td><input type="number" name="phone" value="{{$superAdmin->phone}}"></td>
                  </tr>
                <tr>
                    <td><b><button class="btn btn-primary btn-icon-text" type="submit">{{ __('words.save') }}</button></b>  </td>
                </tr>
            </tbody>
            
          </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
