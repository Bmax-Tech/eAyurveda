@extends('layout')
@section('content')
        <div class="container c_container c_no_padding" style="height: 233px">
            <div class="content" style="margin-top: 72px">
                <div class="col-lg-12">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-2"><img src="{{ URL::asset('assets/img/bug_1.png') }}"></div>
                    <div class="col-lg-4" style="font-size: 24px;color:#9C9C9C">
                        <span>Something is Technically wrong</span>
                        <br/>
                        <span style="font-size: 14px">We`re experiencing an internal server problem.</span>
                        <br/>
                        <span style="font-size: 14px">Please try again later.</span>
                    </div>
                    <div class="col-lg-3"></div>
                </div>
            </div>
        </div>
@stop
