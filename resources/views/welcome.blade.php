@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="text-center" style="margin-bottom: 50px;">
                <h1>LaravelConf Taiwan 2018<br>跨境電商的眉眉角角</h1>
            </div>

            <div class="row" style="margin-bottom: 50px;">
              @foreach($products as $product)
              <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                  <img src="http://via.placeholder.com/350x220">
                  <div class="caption">
                    <h3>{{ $product['name'] }}</h3>
                    <h4>{{ $currency }} {{ $product['price'] }}</h4>
                    <h4>@lang('messages.published_at')<br>{{ $product['published_at'] }}</h4>
                  </div>
                </div>
              </div>
              @endforeach
            </div>

            <div class="row">
                <div class="col-sm-4 col-md-3">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title">@lang('messages.current locale')</h3>
                      </div>
                      <div class="panel-body">
                        {{$locale}}
                      </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title">@lang('messages.current currency')</h3>
                      </div>
                      <div class="panel-body">
                        {{$currency}}
                      </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title">@lang('messages.current timezone')</h3>
                      </div>
                      <div class="panel-body">
                        {{$geoip['timezone']}}
                      </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title">@lang('messages.current ip from')</h3>
                      </div>
                      <div class="panel-body">
                        {{$geoip['ip']}}
                      </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title">@lang('messages.current accept-language')</h3>
                      </div>
                      <div class="panel-body">
                        {{\Request::header('accept-language')}}
                      </div>
                    </div>
                </div>
                
            </div>

        </div>
    </div>
</div>
@endsection
