@extends('layoutWebsite.layout')
@section('body')
      <!-- inner page section -->
      <section class="inner_page_head">
        <div class="container_fuild">
           <div class="row">
              <div class="col-md-12">
                 <div class="full">
                    <h3> {{ __('words.home') }}</h3>
                 </div>
              </div>
           </div>
        </div>
     </section>
     <!-- end inner page section -->
     <!-- product section -->
     <section class="product_section layout_padding">
        <div class="container">

           
           <div class="heading_container heading_center">
              <h2>
                  <span>{{ __('words.games') }}</span>
              </h2>
           </div>
           <div class="row">
            
           
             
           @foreach ($games as $item)
           <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="box">
                 <div class="option_container">
                    <div class="options">
                       <a href="{{url('showProgram',$item->id)}}" class="option1">
                          {{ __('words.download') }}
                       </a>
                       <a href="{{url('addTOArchiveProgram',$item->id)}}" class="option2">
                          {{ __('words.addTOArchive') }}
                       </a>
                    </div>
                 </div>
                 <div class="img-box">
                    <img src="{{$item->logo}}" alt="">
                 </div>
                 <div class="detail-box">
                    <h5>
                      {{$item->name}}
                    </h5>
                    <h6>
                     {{$item->Downloads}} {{ __('words.downloads') }}
                    </h6>
                 </div>
              </div>
           </div> 
           @endforeach
         
             
            
             
            
            
             
           </div>
           <div class="btn-box">
              <a href="{{url('games')}}">
                 {{ __('words.allGames') }}
              </a>
           </div>
               <br><br><br>
           <div class="heading_container heading_center">
              <h2>
                  <span>{{ __('words.apps') }}</span>
              </h2>
           </div>
           <div class="row">
            
           
             
           @foreach ($apps as $item)
           <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="box">
               <div class="option_container">
                  <div class="options">
                     <a href="{{url('showProgram',$item->id)}}" class="option1">
                        {{ __('words.download') }}
                     </a>
                     <a href="{{url('addTOArchiveProgram',$item->id)}}" class="option2">
                        {{ __('words.addTOArchive') }}
                     </a>
                  </div>
               </div>
               <div class="img-box">
                  <img src="{{$item->logo}}" alt="">
               </div>
               <div class="detail-box">
                  <h5>
                    {{$item->name}}
                  </h5>
                  <h6>
                   {{$item->Downloads}} {{ __('words.downloads') }}
                  </h6>
               </div>
            </div>
         </div> 
           @endforeach  
             
           </div>
           <div class="btn-box">
              <a href="{{url('apps')}}">
                 {{ __('words.allApps') }}
              </a>
           </div>
        </div>
     </section>
     <!-- end product section -->
@endsection