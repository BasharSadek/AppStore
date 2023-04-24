@extends('layoutA.layout')
@section('imageProfile')  
 <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
       <img src="{{$user->selfie}}" alt="profile"/>
     </a>
@endsection
@section('body')
<div class="row">
  <div class="col-lg-6 col-ml-4  grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">{{ __('words.allClients') }}</h4>       
        <div class="table-responsive">

          <table class="table">
            <thead>
              <th><b>{{ __('words.selfie') }}</b></th>
              <th><b>{{ __('words.name') }}</b></th>
              <th><b>{{ __('words.email') }}</b></th>
              <th><b>{{ __('words.action') }}</b></th>
            </thead>
            <tbody>
              @if(count($clients)>0)
              @foreach ($clients as $item)
                  <tr>
                    <td><img src="{{$item->selfie}}" alt="selfie"></td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>

                    <td>
                      <a onclick="return confirm('Are you sure to delete this ?')" class="btn btn-danger" 
                      href="{{url('deleteClientAdmin',$item->id)}}">{{ __('words.delete') }}</a>
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
