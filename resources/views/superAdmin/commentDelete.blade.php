@extends('layoutSA.layout')
@section('imageProfile')  
 <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
       <img src="{{$user->selfie}}" alt="profile"/>
     </a>
@endsection
@section('body')
<div class="row">
  <div class="col-lg-10 col-ml-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">{{ __('words.comments') }}</h4>       
        <div class="table-responsive">




          {{-- <form action="{{ url('indexComments') }}" method="post" enctype="multipart/form-data">
            @csrf
         
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

            </div> --}}


            <table class="table">
              <thead>
                <th><b>{{ __('words.comment') }}</b></th>
                <th><b>{{ __('words.evaluation') }}</b></th>
                <th><b>{{ __('words.deleted') }}</b></th>
                <th><b>{{ __('words.created') }}</b></th>
                <th><b>{{ __('words.updated') }}</b></th>
                <th><b>{{ __('words.action') }}</b></th>
              </thead>
              <tbody>
                @if(count($comments)>0)
                @foreach ($comments as $item)
                    <tr>
                      <td>{{$item->name}}</td>
                      <td>{{$item->evaluation}}</td>
                      <td>{{$item->deleted_at}}</td> 
                      <td>{{$item->created_at}}</td> 
                      <td>{{$item->updated_at}}</td> 
                      <td>
                        <a onclick="return confirm('Are you sure to delete this ?')" class="btn btn-danger" 
                        href="{{url('deleteCommentForce',$item->id)}}">{{ __('words.delete') }}</a>
                        <a onclick="return confirm('Are you sure to delete this ?')" class="btn btn-success" 
                        href="{{url('restoreComments',$item->id)}}">{{ __('words.restore') }}</a>
                      </td>
                    </tr>
                @endforeach     
                @else
                    <tr><td  colspan="8"><b>There are not Admins to Display</b></td></tr>
                @endif
              </tbody>
            </table>
          
          {{-- </form> --}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
