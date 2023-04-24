@extends('layoutWebsite.layout')
@section('title') {{$program[0]->name}} @endsection
@section('meta_description') {{$program[0]->description}} @endsection
@section('meta_keywords') {{$program[0]->name}} @endsection
@section('body')
<section class="inner_page_head">
    <div class="container_fuild">
       <div class="row">
          <div class="col-md-12">
             <div class="full">
              <img src="/{{$program[0]->logo}}" alt="" class="logoProgram">  <h3>{{ __('words.download') }}</h3>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- end inner page section -->
 <!-- client section -->
 <section class="client_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
          {{$program[0]->name}}
          </h2>
       </div>
       <div id="carouselExample3Controls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">  
             <div class="carousel-item active">
                <div class="box col-lg-10 mx-auto">
                   <div class="img_container">
                      <div class="img-box">
                         <div class="img_box-inner">
                            <img src="/{{$program[0]->imgName}}" alt="">
                         </div>
                      </div>
                   </div>
                   {{-- <div class="detail-box">
                      <h5>
                         {{$program[0]->name}}
                      </h5>
                      <h6>
                        {{$program[0]->Downloads}}
                      </h6>
                      <p>
                        {{$program[0]->description}}
                      </p>
                   </div> --}}
                </div>
             </div>
            
             <div class="carousel-item">
                <div class="box col-lg-10 mx-auto">
                   <div class="img_container">
                      <div class="img-box">
                         <div class="img_box-inner">
                            <img src="/{{$program[1]->imgName}}" alt="">
                         </div>
                      </div>
                   </div>      
                </div>
             </div>
             <div class="carousel-item">
                <div class="box col-lg-10 mx-auto">
                   <div class="img_container">
                      <div class="img-box">
                         <div class="img_box-inner">
                            <img src="/{{$program[2]->imgName}}" alt="">
                         </div>
                      </div>
                   </div>
                 
                </div>
             </div>
          </div>
          <div class="carousel_btn_box">
             <a class="carousel-control-prev" href="#carouselExample3Controls" role="button" data-slide="prev">
             <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
             <span class="sr-only">Previous</span>
             </a>
             <a class="carousel-control-next" href="#carouselExample3Controls" role="button" data-slide="next">
             <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
             <span class="sr-only">Next</span>
             </a>
          </div>
          <div class="heading_container heading_center">
            <h5>
            {{$program[0]->Downloads}} Downloads
            </h5>
            <h5>
               {{$program[0]->description}}
            </h5>
            <form action="{{url('download',$program[0]->id)}}" method="POST">
               @csrf
               <button type="submit" class="btn btn-success"
               >{{ __('words.download') }}</button>
            </form>
           
         </div>
         <br><br><br><br><br>
         <div class="row m-3">
            <form action="{{url('storeComment',$program[0]->id)}}" method="GET" >
               @method('get')
               @csrf
            ⭐  <select value="star" name="star" required >
               <option value="1" name="star" class="col-1">1 </option>
               <option value="2" name="star" class="col-1"> 2 </option>
               <option value="3" name="star" class="col-1"> 3 </option>
               <option value="4" name="star" class="col-1"> 4 </option>
               <option value="5" name="star" class="col-1"> 5 </option>
            </select><br>
            &nbsp;&nbsp;&nbsp;
            <label for="comment">{{ __('words.comment') }} :</label>
            <input class="col-8" type="text" placeholder="{{ __('words.comment') }} " name="comment" id="comment" required> 
            <button href="" class="col-4  btn btn-info btn-rounded btn-fw m-1">{{ __('words.comment') }}</button>
            </form>
         </div>
         <div>
            @foreach ($comment as $item)
            <div class="m-3"><img src="/{{$item->selfie}}" class="logoImage" alt="selfie">
             <h5 style="display: inline">{{$item->name}}</h5>  
               <h6 >{{$item->created}}</h6>
               <h5 style="display: inline">{{$item->commentName}}</h5>&nbsp;&nbsp;&nbsp;
               <h6 style="display: inline">{{$item->evaluation}} ⭐</h6>
               &nbsp;&nbsp;
               @if (Auth::id() && auth()->user()->id == $item->user_id)
               <a onclick="return confirm('Are you sure to delete this ?')" class="btn btn-danger" href="{{url('deleteComment',$item->comment_id)}}">{{ __('words.delete') }}</a>
               @endif
          
            </div>
                
            @endforeach
         </div>
       </div>
    </div>
 </section>
@endsection