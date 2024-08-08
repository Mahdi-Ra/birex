<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$general->sitename}} @if(!empty($page_title))| {{$page_title}} @endif</title>
    <!--Favicon add-->
    <link rel="icon" type="image/png" href="{{asset('assets/images/logo/favicon.png')}}"/>
    <!--bootstrap Css-->
    <link href="{{url('/')}}/assets/front/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{url('/')}}/assets/admin/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/admin/css/sweetalert.css')}}">

    <link href="{{url('/')}}/assets/front/css/style.css" rel="stylesheet">


    <link href="{{url('/')}}/assets/front/color.php?color={{$general->color}}" rel="stylesheet">
    
    <!BEGIN RAYCHAT CODE--> 
    <script type="text/javascript">!function(){function t(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,localStorage.getItem("rayToken")?t.src="https://app.raychat.io/scripts/js/"+o+"?rid="+localStorage.getItem("rayToken")+"&href="+window.location.href:t.src="https://app.raychat.io/scripts/js/"+o;var e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(t,e)}var e=document,a=window,o="2258fd89-b561-4d19-91df-71e4872724f9";"complete"==e.readyState?t():a.attachEvent?a.attachEvent("onload",t):a.addEventListener("load",t,!1)}();</script>
    <!END RAYCHAT CODE-->

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-165628826-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-165628826-1');
    </script>
    
    @yield('style')
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">
            <img style="max-width: 160px;" src="{{url('/')}}/assets/images/logo/logo.png" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">


                <li class="nav-item dropdown @if(request()->path() == 'buy/btc' ||  request()->path() == 'buy/eth' ||request()->path() == 'buy/doge' ||  request()->path() == 'buy/lite')active @endif">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Buy
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('buy.bitcoin.view')}}"> Bitcoin</a>
                        <!--<a class="dropdown-item" href="{{route('buy.eth.view')}}"> Ethereum </a>-->
                        <!--<a class="dropdown-item" href="{{route('buy.doge.view')}}"> Dogecoin </a>-->
                        <!--<a class="dropdown-item" href="{{route('buy.lite.view')}}"> Litecoin </a>-->

                    </div>
                </li>

                @guest

                    @foreach($menus as $data)
                    
                    <li class="nav-item @if(request()->path() == 'menu/'.$data->slug ) active @endif">
                        <a class="nav-link" href="{{route('menu.view', $data->slug)}}">{{$data->name}} </a>
                    </li>

                    @endforeach
                    
                    <li class="nav-item @if(request()->path() == 'http://blog.bircoin.co' ) active @endif">
                        <a class="nav-link" href="http://blog.bircoin.co">Blog</a>
                    </li>
                    
                    <li class="nav-item @if(request()->path() == 'contact' ) active @endif">
                        <a class="nav-link" href="{{route('contact.index')}}">Contact</a>
                    </li>
                    
                    
                @else
                
                    
                    <li class="nav-item dropdown @if(request()->path() == 'user/advertise/coin'|| request()->path() == 'user/advertise/history' )active @endif">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Advertise
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('sell.coin')}}"> Create Advertise</a>
                            <a class="dropdown-item" href="{{route('sell.buy.history')}}"> My Advertise History </a>
                        </div>
                    </li>



                    <li class="nav-item dropdown @if(request()->path() == 'user/deposits'|| request()->path() == 'user/transactions' )active @endif">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Transaction
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('deposit.history')}}"> Deposit History</a>
                            <a class="dropdown-item" href="{{route('trans.history')}}"> Transaction History </a>
                        </div>
                    </li>

                    <li class="nav-item dropdown @if(request()->path() == 'user/deposits'|| request()->path() == 'user/transactions' )active @endif">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Balance
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('deposit')}}"> Balance and Deposit</a>
                            <a class="dropdown-item" href="{{route('user.request_a_payment_list')}}"> Request a Payment</a>
                        </div>
                    </li>


                @endguest
                <li class="nav-item @if(request()->path() == 'BuyTether' ) active @endif">
                        <a class="nav-link" href="{{route('BuyTether')}}">Buy Tether</a>
                </li>
            </ul>

            @guest
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item @if(request()->path() == 'register') active @endif">
                        <a class="nav-link" href="{{url('register')}}"><i class="fa fa-check-square-o"></i> Register</a>
                    </li>

                    <li class="nav-item @if(request()->path() == 'login') active @endif">
                        <a class="nav-link" href="{{url('login')}}"><i class="fa fa-user"></i> Login</a>
                    </li>
                </ul>

            @else

                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item dropdown @if(request()->path() == 'user/edit-profile' ||request()->path() == 'user/deposit-confirm' ||request()->path() == 'user/deposit'
                                         ||request()->path() == 'user/change-password' || request()->path() == 'user/home'|| request()->path() == 'user/support' || request()->path() == 'user/support/new') active @endif">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Hi, {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{url('user/home')}}"> Dashboard </a>
                            <a class="dropdown-item" href="{{ route('deposit') }}"> Balance </a>
                            <a class="dropdown-item" href="{{route('edit-profile')}}"> My Profile </a>
                            <a class="dropdown-item" href="{{route('user.change-password')}}"> Change Password </a>
                            <a class="dropdown-item" href="{{route('support.index.customer')}}"> Support Ticket </a>
                            <a class="dropdown-item" href="{{route('user.auth_for_use')}}"> Authentication </a>
                            <a class="dropdown-item" href="{{route('two.factor.index')}}"> Security </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>

                        </div>
                    </li>
                    @php $deal = \App\AdvertiseDeal::where('to_user_id', Auth::id())->where('status', 0) @endphp
                    @php $approval = \App\AdvertiseDeal::where('to_user_id', Auth::id())->where('status', 9) @endphp

                    <li class="nav-item dropdown @if(request()->path() == ''|| request()->path() == '' ) active @endif">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            <i class="fa fa-comments" aria-hidden="true"></i> <span
                                    class="badge badge-danger">{{$deal->count() + $approval->count()}}</span>
                        </a>
                        @if($deal->count() > 0 || $approval->count() > 0)
                            <div class="dropdown-menu">
                                @foreach($deal->get() as $data)
                                    <a class="dropdown-item"
                                       href="{{route('noti.message', $data->trans_id)}}">{{$data->gateway->currency}} {{$data->add_type == 1 ? 'buy':'sell' }}
                                        request </a>
                                @endforeach

                                @foreach($approval->get() as $data)
                                    <a class="dropdown-item"
                                       href="{{route('noti.message', $data->trans_id)}}">{{$data->gateway->currency}}
                                        Approval request </a>
                                @endforeach

                            </div>

                        @endif
                    </li>
                </ul>
            @endguest
        </div>
    </div>
</nav>


<div class="container">
    <br>

    <div id="justify-height">
        @yield('body')
    </div>


</div>

<div id="back-to-top" class="scroll-top back-to-top active" data-original-title="" title="" style="display: none">
    <i class="fa fa-angle-up"></i>
</div>

<footer class="blog-footer">
    <div class="container">
        <div class="text-center">
            <a href="{{url('/')}}"><img style="max-height: 60px; max-width: 160px;"
                                        src="{{url('/')}}/assets/images/logo/logo.png" class="rounded" alt="logo"></a>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4"><i class="fa fa-map-marker"></i> {{$general->address}}</div>
            <div class="col-md-4"><i class="fa fa-phone"></i> {{$general->phone}}</div>
            <div class="col-md-4"><i class="fa fa-envelope"></i> {{$general->email}}</div>
        </div>
        <hr>
        <ul class="list-inline">
            @foreach($social as $data)
                <li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank"
                                                href="{{$data->link}}">{!! $data->code !!}</a></li>
            @endforeach
        </ul>
        <p>
            <a href="#">{{$general->copyright}}</a>
            <a href="{{route('terms.index')}}">Terms</a> & <a href="{{route('policy.index')}}">Policy</a>
        </p>
    </div>
</footer>

<!--jquery script load-->
<script src="{{url('/')}}/assets/front/js/jquery.js"></script>
<!--Bootstrap v3 script load here-->
<script src="{{url('/')}}/assets/front/js/bootstrap.min.js"></script>

<script src="{{asset('assets/admin/js/sweetalert.js')}}"></script>

<script src="{{asset('assets/front/js/main.js')}}"></script>


@yield('script')

</script>
@if (Session::has('alert'))
    <script type="text/javascript">
        $(document).ready(function () {
            swal("{{ Session::get('alert') }}", "", "warning");
        });
    </script>
@endif

@if (Session::has('message'))
    <script type="text/javascript">
        $(document).ready(function () {
            swal("{{ Session::get('message') }}", "", "success");
        });
    </script>
@endif

@if (Session::has('success'))
    <script type="text/javascript">
        $(document).ready(function () {
            swal("{{ Session::get('success') }}", "", "success");
        });
    </script>
@endif
<script>
    $(document).ready(function () {
        var winheight = $(window).height() - 365;
        $('#justify-height').css('min-height', winheight + 'px');
    });
</script>



 <script>
// window.onbeforeunload = function (e) {
//     e = e || window.event;

// $.ajax({
//     type : "GET",
//     url : "https://bircoin.co/logoutt",
//     async: true,
//     cache: false,
//     success:function (data) {
//     }
// });
   
// };
 </script>
           
   
</body>
</html>
