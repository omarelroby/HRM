    @php
        use App\Models\Utility;
        $users=\Auth::user();
        $currantLang = $users->currentLanguage();
        $languages=Utility::languages();
        $profile=asset(Storage::url('uploads/avatar/'));
    @endphp

    <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">

            <div class="navbar-header">
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell  text-dark "></i>  <span class="label label-warning">{{$myNotifications->count()}}</span>
                    </a>

                    <ul class="dropdown-menu dropdown-messages dropdown-menu-right">

                        @foreach($myNotifications as $key => $notification)
                            <li>
                                <div class="dropdown-messages-box">
                                    <a class="dropdown-item float-left" href="{{asset('/'.$notification->type)}}">
                                        <img alt="image" class="rounded-circle" src="{{!empty($notification->user->avatar) ? asset(Storage::url('uploads/avatar')).'/'.$notification->user->avatar : asset(Storage::url('uploads/avatar')).'/avatar.png'}}">
                                    </a>
                                    <div class="media-body">
                                        {{$notification['body'.$lang]}} <br>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown-divider"></li>

                        @endforeach

                        <li>
                            <div class="text-center link-block">
                                <a href="{{route('notifications.index')}}" class="dropdown-item">
                                     <strong>{{__('All Notifications')}}</strong>
                                </a>
                            </div>
                        </li>

                    </ul>
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                    <i class="fa fa-globe text-warning"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            @can('Create Language')
                                <a class="dropdown-item" href="{{route('manage.language',[$currantLang])}}">{{ __('Create & Customize') }}</a>
                            @endcan
                        </li>
                        @foreach($languages as $key => $language)
                            @if($key != 0)
                                <li class="dropdown-divider"></li>
                            @endif
                            <li>
                                <a class="dropdown-item @if($language == $currantLang) text-danger @endif" href="{{route('change.language',$language)}}">{{Str::upper($language)}}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                        <i class="fa fa-sign-out text-danger"></i>
{{--                        {{__('Logout')}}--}}
                    </a>
                </li>
                <form id="frm-logout" action="{{ route('logout') }}" method="POST" class="d-none">
                    {{ csrf_field() }}
                </form>
            </ul>
        </nav>
    </div>
