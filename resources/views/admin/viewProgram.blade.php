@extends('layoutA.layout')
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
        <h4 class="card-title">{{ __('words.viewProgram') }}</h4>       
        <div class="table-responsive">

          <table class="table">
            <thead>
              <th><b>{{ __('words.logo') }}</b></th>
              <th><b>{{ __('words.id') }}</b></th>
              <th><b>{{ __('words.name') }}</b></th>
              <th><b>{{ __('words.description') }}</b></th>
              <th><b>{{ __('words.status') }}</b></th>
              <th><b>{{ __('words.downloads') }}</b></th>
              <th><b>{{ __('words.action') }}</b></th>
            </thead>
            <tbody>
              @if(count($program)>0)
              @foreach ($program as $item)
                  <tr>
                    <td> <img src="{{$item->logo}}" alt=""></td>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->description}}</td> 
                    <td>{{$item->status}}</td>
                    <td>{{$item->Downloads}}</td>
                    <td>
                      <a onclick="return confirm('Are you sure to delete this ?')" class="btn btn-danger" 
                      href="{{url('deleteProgram',$item->id)}}">{{ __('words.delete') }}</a>
                      <a class="btn btn-success" href="{{url('editProgram',$item->id)}}">{{ __('words.update') }}</a>
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
