<div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
       <div class="container">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
             <a class="navbar-brand"  href="#">
               <img width="80" src="{{$settings->logo}}" alt="#" /></a><b><p class="name-app">App Store</p></b>
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class=""> </span>
             </button>
             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                  <li class="nav-item" >
                     <a class="nav-link" href="{{url('games')}}" >{{ __('words.games') }} <span class="sr-only">(current)</span></a>
                  </li>
                   <li class="nav-item">
                     <a class="nav-link" href="{{url('apps')}}">{{ __('words.apps') }} <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item ">
                     <a class="nav-link" href="{{ route('archive') }}">{{ __('words.archive') }}</a>
                  </li>
                   <li class="nav-item ">
                      <a class="nav-link" href="{{ route('/') }}">{{ __('words.home') }}</a>
                   </li>
                   @if (Route::has('login'))
                       @auth 
                       @if (Auth::user()->status=='superAdmin' )
                       <li class="nav-item">
                        <a class="nav-link" href="{{ route('superAdmin') }}">{{ __('words.dashboard') }} <span class="sr-only">dashboard</span></a>
                     </li>
                       @endif
                       @if (Auth::user()->status=='admin')
                       <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin') }}">{{ __('words.dashboard') }} <span class="sr-only">dashboard</span></a>
                     </li>
                       @endif
                       <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">{{ Auth::user()->name }}<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                           <li>
                              <x-slot name="content">
                                 <!-- Account Management -->
                                 <div class="block px-4 py-2 text-xs text-gray-400">
                                     {{ __('Manage Account') }}
                                 </div>
     
                                 <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                     {{ __('Profile') }}
                                 </x-jet-dropdown-link>
     
                                 @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                     <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                         {{ __('API Tokens') }}
                                     </x-jet-dropdown-link>
                                 @endif
     
                                 <div class="border-t border-gray-100"></div>
     
                                 <!-- Authentication -->
                                 <form method="POST" action="{{ route('logout') }}" x-data>
                                     @csrf
     
                                     <x-jet-dropdown-link href="{{ route('logout') }}"
                                      F        @click.prevent="$root.submit();">
                                         {{ __('Log Out') }}
                                     </x-jet-dropdown-link>
                                 </form>
                             </x-slot>
                             <li>
                             <form action="{{url('logoutWebsite')}}" method="post">
                              @csrf
                           <button type="submit">{{ __('words.logout') }} </button>
                           </form>
                        
                             </li>
                              {{-- <form method="POST" action="{{ route('logout') }}" x-data>
                                 @csrf
                                 @method('POST')                              
                              <x-jet-dropdown-link href="{{ route('logout') }}"
                                       @click.prevent="$root.submit();">
                                  {{ __('Log Out') }}
                              </x-jet-dropdown-link>
                             </form> --}}
                          
                           </li>
                           <li> 
                             
                               <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                 {{ __('words.profile') }}
                          </x-jet-responsive-nav-link>
                    
                        </li>
                        @else
                        <li class="nav-item">
                          <a class="nav-link" href="{{route('login')}}">{{ __('words.login') }}</a>
                       </li>
                       @if (Route::has('register'))
                       <li class="nav-item">
                          <a class="nav-link" href="{{route('register')}}">   {{ __('words.register') }}</a>
                       </li>
                         
                         @endif
                         @endauth
                         @endif
                        </ul>
                     </li>
                     
                  
                   {{-- <form class="form-inline">
            
                        <input type="search" name="search" id="">
                     
                      <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                      <i class="fa fa-search" aria-hidden="true"></i>
                      </button>
                   </form> --}}
                </ul>

                <ul class="navbar-nav">
                  <li class="nav-item line" >  
                     <form action="{{url('searchWebsite')}}" method="get" >
                        @csrf
                       <input class="searchClass" type="search" placeholder="{{ __('words.search') }}" name="searchText" value="{{old('searchText')}}"/>
                        {{-- <button class="btn btn-success">{{ __('words.search') }}</button> --}}
                     </form>
                  </li>
                </ul>
             </div>
          </nav>
       </div>
    </header>
    <!-- end header section -->
 </div>