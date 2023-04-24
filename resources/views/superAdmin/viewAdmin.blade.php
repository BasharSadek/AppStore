@extends('layoutSA.layout')
@section('imageProfile')  
 <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
       <img src="{{$user->selfie}}" alt="profile"/>
     </a>
@endsection
@section('body')
<div class="row">
  <div class="col-lg-12  grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">{{ __('words.usersDeleted') }}</h4>       
        <div class="table-responsive">

          <table class="table">
            <thead>
              <th><b>{{ __('words.selfie') }}</b></th>
              <th><b>{{ __('words.id') }}</b></th>
              <th><b>{{ __('words.name') }}</b></th>
              <th><b>{{ __('words.email') }}</b></th>
              <th><b>{{ __('words.facebook') }}</b></th>
              <th><b>{{ __('words.instagram') }}</b></th>
              <th><b>{{ __('words.phone') }}</b></th>
              <th><b>{{ __('words.action') }}</b></th>
              <th><b>{{ __('words.sendEmail') }}</b></th>
            </thead>
            <tbody>
              @if(count($admins)>0)
              @foreach ($admins as $item)
                  <tr>
                    <td> <img src="{{$item->selfie}}" alt=""></td>
                
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->facebook}}</td>
                    <td>{{$item->instagram}}</td>
                    <td>{{$item->phone}}</td>
                    <td>
                      <a onclick="return confirm('Are you sure to delete this ?')" class="btn btn-danger" 
                      href="{{url('deleteAdmin',$item->id)}}">{{ __('words.delete') }}</a>
                      <a class="btn btn-success" href="{{url('editAdmin',$item->id)}}">{{ __('words.update') }}</a>
                    </td>
                    <td>
                      <a class="btn btn-info" href="{{url('send_email',$item->id)}}">{{ __('words.sendEmail') }}</a>
                    </td>
                  </tr>
              @endforeach     
              @else
                  <tr><td  colspan="8"><b>There are not Admins to Display</b></td></tr>
              @endif
            </tbody>
          </table>
          
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
