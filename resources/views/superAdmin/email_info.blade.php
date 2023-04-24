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
        <h4 class="card-title">{{ __('words.sendEmailTo') }} <p style="color: red">{{$send->email}}</p></h4>       
        <div class="table-responsive">




          <form action="{{ url('sendUserEmail',$send->id) }}" method="post" enctype="multipart/form-data">
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
              <td><b>Email Greeting</b></td>
              <td><input type="text" required name="greeting" value="{{old('greeting')}}"></td>
            </tr>
            <tr>
              <td><b>Email Frist Line</b></td>
              <td><input type="text" required name="firstline" value="{{old('firstline')}}"></td>
            </tr>
            <tr>
              <td><b>Email Body</b></td>
              <td><input type="text" required name="bady" value="{{old('body')}}"></td>
            </tr>
            <tr>
              <td><b>Email Button Name</b></td>
              <td><input type="text" name="button" value="{{old('button')}}"></td>
            </tr>
            <tr>
              <td><b>Email URL</b></td>
              <td><input type="text" name="url" value="{{old('url')}}"></td>
            </tr>
            <tr>
              <td><b>Email Last Line</b></td>
              <td><input type="text" name="lastline" value="{{old('lastline')}}"></td>
            </tr>
            <tr>
              <td><b><button class="btn btn-primary btn-icon-text" type="submit">{{ __('words.submit') }}</button></b>  </td>
            </tr>
          </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
