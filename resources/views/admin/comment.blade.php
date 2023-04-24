@extends('layoutA.layout')
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
                <th><b>{{ __('words.selfie') }}</b></th>
                <th><b>{{ __('words.name') }}</b></th>
                <th><b>{{ __('words.programName') }}</b></th>
                <th><b>{{ __('words.comment') }}</b></th>
                <th><b>{{ __('words.status') }}</b></th>
                <th><b>{{ __('words.action') }}</b></th>
              </thead>
              <tbody>
                @if(count($comment)>0)
                @foreach ($comment as $item)
                    <tr>
                      <td> <img src="{{$item->selfie}}" alt=""></td>
                      <td>{{$item->userName}}</td>
                      <td>{{$item->programName}}</td>
                      <td>{{$item->commentName}}</td> 
                      <td>{{$item->status}}</td> 
                      <td>
                        <a onclick="return confirm('Are you sure to delete this ?')" class="btn btn-danger" 
                        href="{{url('deleteComment',$item->comment_id)}}">{{ __('words.delete') }}</a>
                      </td>
                    </tr>
                @endforeach     
                @else
                    <tr><td  colspan="8"><b>There are not Comments to Display</b></td></tr>
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
