<ul class="menu">
    @if(Auth::User())
        <!-- menu header text -->
        <li class="divider" data-content="个人信息">
        </li>
        <!-- menu item -->
        <li class="menu-item">
            <a href="/home">
                {{Auth::User()->name}} <small><small>UID：{{Auth::User()->id}}</small></small>
            </a>
            <a href="/home">
                <small>Mail：{{Auth::User()->email}}</small>
            </a>

            <a href="/home">
                <small>QQ：{{Auth::User()->qq}}</small>
            </a>

        </li>
        <li class="divider" data-content="账单信息">
        </li>
        <!-- menu item -->
        <li class="menu-item">
            <a>{{$good[0]->name}} <small>{{$good[0]->model}}</small></a>
            <a><small>订单号：<?php $order_no = date("ymd").rand(1000000,9999999);echo $order_no;?></small></a>
            <a>
                <small>有效期至：<?php echo date("Y")+1;?>年<?php echo date("m月d日");?></small>
            </a>
            <a>
                <big><big>{{$good[0]->price}}</big></big> 元
            </a>

        </li>
    @else
          <div class="empty">
              <div class="empty-icon">
                  <i class="icon icon-people"></i>
              </div>
              <h4 class="empty-title">请登录</h4>
              <p class="empty-subtitle">您还没有登录系统，请登录之后继续购买哦！</p>
              <div class="empty-action">
                  <a href="/auth/login" class="btn btn-primary">登录</a>
                  <a href="/auth/register" class="btn">注册</a>
              </div>
          </div>

    @endif
</ul>
@if(Auth::User())
    {!!  Form::open(['url'=>'/order/new']) !!}
    {!! Form::hidden('order',base64_encode($order_no)) !!}
    {!! Form::hidden('type',base64_encode($good[0]->model)) !!}
    {!! Form::submit('立即购买',["class"=>"buy-btn"]) !!}
    {!!  Form::close() !!}
@endif

