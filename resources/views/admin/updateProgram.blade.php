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
        <h4 class="card-title">{{ __('words.profile') }}</h4>       
        <div class="table-responsive">

          <form action="{{ url('updateProgram',$program->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- @method('PUT') --}}
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
                    <td><input type="text"  name="name" value="{{$program->name}}"></td>
                  </tr>
                  <tr>
                    <td><b>{{ __('words.description') }}</b></td> 
                    <td>
                    <textarea name="description"   cols="30" rows="10">{{$program->description}}</textarea>    
                    </td>   
                       
                  </tr>
                  <tr>
                    <td><b>{{ __('words.status') }}</b></td>
                    
                    <td> <select value="games" name="status" >
                        <option value="games" name="status" @if ($program->status == 'games')
                            selected
                        @endif>Games </option>
                        <option value="apps" name="status" @if ($program->status == 'apps')
                            selected
                        @endif> Apps </option>
                     </select></td>
                  </tr>
                  <tr>
                    <td><b>{{ __('words.logo') }}</b></td>
                    <td><input type="file"  name="logo" ></td>
                    <td><img src="{{asset($program->logo)}}" alt=""></td>
                  </tr>  
                  <tr>
                    <td><b>{{ __('words.program') }}</b></td>
                    <td><input type="file"  name="path" ></td>
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
