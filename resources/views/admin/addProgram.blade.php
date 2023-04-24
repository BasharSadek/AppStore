@extends('layoutA.layout')
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
        <h4 class="card-title">{{ __('words.addProgram') }}</h4>       
        <div class="table-responsive">

          <form action="{{ url('storeProgram') }}" method="POST" enctype="multipart/form-data">
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
            
            <tbody>
                <tr>
                    <td><b>{{ __('words.name') }}</b></td>
                    <td><input type="text" required name="name" value="{{old('name')}}"></td>
                  </tr>
                  <tr>
                    <td><b>{{ __('words.description') }}</b></td> 
                    <td>
                    <textarea name="description" required value="{{old('description')}}" cols="30" rows="10"></textarea>    
                    </td>   
                       
                  </tr>
                  <tr>
                    <td><b>{{ __('words.status') }}</b></td>
                    
                    <td> <select value="games" name="status" required>
                        <option value="games" name="status" >Games </option>
                        <option value="apps" name="status" > Apps </option>
                     </select></td>
                  </tr>
                  <tr>
                    <td><b>{{ __('words.logo') }}</b></td>
                    <td><input type="file"  name="logo" required></td>
                  </tr>  
                  <tr>
                    <td><b>{{ __('words.program') }}</b></td>
                    <td><input type="file"  name="path" required></td>
                  </tr>   
                  <tr>
                    <td><b>{{ __('words.image') }} 1</b></td>
                    <td><input type="file"  name="image1" required></td>
                  </tr> 
                  <tr>
                    <td><b>{{ __('words.image') }} 2</b></td>
                    <td><input type="file"  name="image2" required></td>
                  </tr> 
                  <tr>
                    <td><b>{{ __('words.image') }} 3</b></td>
                    <td><input type="file"  name="image3" required></td>
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
