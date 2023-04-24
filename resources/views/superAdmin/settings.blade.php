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
        <h4 class="card-title">{{ __('words.settings') }}</h4>       
        <div class="table-responsive">




          <form action="{{ url('saveSettingsSuperAdmin') }}" method="post" enctype="multipart/form-data">
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
                    <td><b>{{ __('words.title') }}</b></td>
                    <td><input type="text" required name="title" value="{{$settings->title}}"></td>
                  </tr>
                  <tr>
                    <td><b>{{ __('words.description') }}</b></td>

                    <td>
                        <textarea name="description" id="" cols="30" rows="10">
                            {{$settings->description}}
                        </textarea>
                    </td>
                  </tr>
                  <tr>
                    <td><b>{{ __('words.icon') }}</b></td>
                    <td><input type="file"  name="icon" ></td>
                    <td><img src="{{$settings->icon}}" alt=""></td>
                  </tr>
                  <tr>
                    <td><b>{{ __('words.logo') }}</b></td>
                    <td><input type="file" name="logo" ></td>
                    <td><img src="{{$settings->logo}}" alt=""></td>
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
