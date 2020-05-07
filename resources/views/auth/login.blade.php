@extends('layouts.layoutLogin')

@section('content')
        <div class="container">
            <div class="row justify-content-md-center mt-12">
                <div class="col-sm-8">
                    <div class="row border-box">
                        <div class="col-sm-6 p-0">
                            <img src="{{ asset('assets2/img/bpnt1.png') }}" class="img-fluid">
                        </div>
                        <div class="col-sm-6 p-0">
                            <div class="card">
                                <div class="card-header">
                                  <center>
                                    <img src="{{ asset('assets2/img/plg.png') }}" width="220px" height="140px">
                                    <div class="sub-title">
                                        <strong>DINAS SOSIAL KOTA PALEMBANG</strong>
                                    </div>
                                  </center>
                                </div>
                                
                                <div class="card-body">
                                    <form class-"form-horizontal" method="POST" action="{{ route('login') }}">
                                      {{ csrf_field() }}
                                      <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ti-user"></i></span>
                                          </div>
                                          <input id="username" type="text" class="form-control input-login" placeholder="username" name="username" value="{{ old('username') }}" required autofocus>
                                        
                                          @if ($errors->has('username'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('username') }}</strong>
                                                </span>
                                           @endif

                                        </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ti-lock"></i></span>
                                          </div>
                                          <input id="password" type="password" class="form-control input-login" placeholder="password" name="password" required>
                                        
                                             @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                      
                                      <button type="submit" class="btn btn-primary float-right" style="margin-top:35px;">Masuk <i class="ti-angle-double-right" style="font-size: 12px"></i></button>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
    @endsection
