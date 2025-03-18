@php
use Illuminate\Support\Facades\Route;
$configData = Helper::appClasses();
@endphp

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

  <!-- ! Hide app brand if navbar-full -->
  @if(!isset($navbarFull))
    <div class="app-brand demo">
      <a href="{{url('/')}}" class="app-brand-link">
        <span class="app-brand-logo demo">@include('_partials.macros',["height"=>20])</span>
        <span class="app-brand-text demo menu-text fw-bold">{{config('variables.templateName')}}</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
        <i class="ti menu-toggle-icon d-none d-xl-block align-middle"></i>
        <i class="ti ti-x d-block d-xl-none ti-md align-middle"></i>
      </a>
    </div>
  @endif

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
      {{-- main menu --}}
      @if(auth()->user()->type == 'admin')
      <li class="menu-item @if(Route::currentRouteName() == 'admin-home') active @endif">
        <a href="{{ route('admin-home') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-smart-home"></i>
          <div>Home</div>
        </a>
      </li>

      <li class="menu-item @if(Route::currentRouteName() == 'product-list' || Route::currentRouteName() == 'product-add') open @endif">
        <a href="javascript:;" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-brand-databricks"></i>
          <div>Products</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item @if(Route::currentRouteName() == 'product-list') active @endif">
            <a href="{{ route('product-list') }}" class="menu-link">
              <div>Product List</div>
            </a>
          </li>
          <li class="menu-item @if(Route::currentRouteName() == 'product-add') active @endif">
            <a href="{{ route('product-add') }}" class="menu-link">
              <div>Add Product</div>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-item @if(Route::currentRouteName() == 'reviews') active @endif">
        <a href="{{ route('reviews') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-mood-edit"></i>
          <div>Reviews</div>
        </a>
      </li>
      <li class="menu-item @if(Route::currentRouteName() == 'vote-list') active @endif">
        <a href="{{ route('vote-list') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-adjustments-exclamation"></i>
          <div>Votes</div>
        </a>
      </li>
      @endif

      @if (auth()->user()->type == 'user')
      <li class="menu-item @if(Route::currentRouteName() == 'pages-home') open @endif">
        <a href="javascript:;" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-brand-databricks"></i>
          <div>Products</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item @if(Route::currentRouteName() == 'pages-home') active @endif">
            <a href="{{ route('pages-home') }}" class="menu-link">
              <div>Product List</div>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-item @if(Route::currentRouteName() == 'vote-user-list') active @endif">
        <a href="{{ route('vote-user-list') }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-adjustments-exclamation"></i>
          <div>Votes</div>
        </a>
      </li>
      @endif


      <li class="menu-item @if(Route::currentRouteName() == 'community') active @endif">
        <a href="{{ route('community') }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-network"></i>
          <div>Community</div>
        </a>
      </li>
  </ul>

</aside>
