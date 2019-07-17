<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
<li class="treeview">
    <a href="#"><i class="fa fa-newspaper-o"></i> <span>{{ trans('backpack::base.News') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
      <li><a href="{{ backpack_url('article') }}"><i class="fa fa-newspaper-o"></i> <span>{{ trans('backpack::base.Articles') }}</span></a></li>
      <li><a href="{{ backpack_url('category') }}"><i class="fa fa-list"></i> <span>{{ trans('backpack::base.Categories') }}</span></a></li>
      <li><a href="{{ backpack_url('tag') }}"><i class="fa fa-tag"></i> <span>{{ trans('backpack::base.Tags') }}</span></a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#"><i class="fa fa-newspaper-o"></i> <span>{{ trans('backpack::base.Products') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
    <li><a href='{{ backpack_url('products') }}'><i class='fa fa-tag'></i> <span>{{ trans('backpack::base.Products') }}</span></a></li>
    <li><a href='{{ backpack_url('ProductStudent') }}'><i class='fa fa-tag'></i> <span>{{ trans('backpack::base.Product Student') }}</span></a></li>
    <li><a href='{{ backpack_url('product_type') }}'><i class='fa fa-tag'></i> <span>{{ trans('backpack::base.product_types') }}</span></a></li>
    <li><a href='{{ backpack_url('gifttype') }}'><i class='fa fa-tag'></i> <span>{{ trans('backpack::base.gifttype') }}</span></a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#"><i class="fa fa-newspaper-o"></i> <span>{{ trans('backpack::base.Slider') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
    <li><a href='{{ backpack_url('Slider') }}'><i class='fa fa-tag'></i> <span>{{ trans('backpack::base.Slider') }}</span></a></li>
    <li><a href='{{ backpack_url('SliderItem') }}'><i class='fa fa-tag'></i> <span>{{ trans('backpack::base.Slider Items') }}</span></a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#"><i class="fa fa-newspaper-o"></i> <span>{{ trans('backpack::base.Orders') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
      <li><a href='{{ backpack_url('order') }}'><i class='fa fa-tag'></i> <span>{{ trans('backpack::base.Orders') }}</span></a></li>
      <li><a href='{{ backpack_url('OrderItems') }}'><i class='fa fa-tag'></i> <span>{{ trans('backpack::base.Order Items') }}</span></a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#"><i class="fa fa-newspaper-o"></i> <span>{{ trans('backpack::base.Shipping') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
     {{--   <li><a href='{{ backpack_url('shipping') }}'><i class='fa fa-tag'></i> <span>{{ trans('backpack::base.Shipping') }}</span></a></li>  --}}
      <li><a href='{{ backpack_url('shipp_com') }}'><i class='fa fa-tag'></i> <span>{{ trans('backpack::base.Shipping companies') }}</span></a></li>
    </ul>
</li>
{{--<li><a href='{{ backpack_url('project') }}'><i class='fa fa-tag'></i> <span>Projects</span></a></li>--}}
<li><a href='{{ backpack_url('student') }}'><i class='fa fa-graduation-cap'></i> <span>{{ trans('backpack::base.All Students') }}</span></a></li>
<li class="treeview">
    <a href="#"><i class="fa fa-newspaper-o"></i> <span>{{ trans('backpack::base.Vouchers') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
      <li><a href='{{ backpack_url('voucher') }}'><i class='fa fa-tag'></i> <span>{{ trans('backpack::base.Vouchers') }}</span></a></li>
      <li><a href='{{ backpack_url('provider') }}'><i class='fa fa-tag'></i> <span>{{ trans('backpack::base.Providers') }}</span></a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#"><i class="fa fa-newspaper-o"></i> <span>{{ trans('backpack::base.Super admin') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
    <!-- Users, Roles Permissions -->
  <li class="treeview">
    <a href="#"><i class="fa fa-group"></i> <span>{{ trans('backpack::base.UsersRoles') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
      <li><a href="{{ backpack_url('user') }}"><i class="fa fa-user"></i> <span>{{ trans('backpack::base.Users') }}</span></a></li>
      <li><a href="{{ backpack_url('role') }}"><i class="fa fa-group"></i> <span>{{ trans('backpack::base.Roles') }}</span></a></li>
      <li><a href="{{ backpack_url('permission') }}"><i class="fa fa-key"></i> <span>{{ trans('backpack::base.Permissions') }}</span></a></li>
    </ul>
  </li>

      <li><a href="{{ backpack_url('menu-item') }}"><i class="fa fa-list"></i> <span>{{ trans('backpack::base.Menu') }}</span></a></li>
      <li><a href="{{ backpack_url('elfinder') }}"><i class="fa fa-files-o"></i> <span>{{ trans('backpack::base.file_manager') }}</span></a></li>
      <li><a href='{{ url(config('backpack.base.route_prefix', 'admin') . '/setting') }}'><i class='fa fa-cog'></i> <span>{{ trans('backpack::base.Settings') }}</span></a></li>
      <li><a href='{{ url(config('backpack.base.route_prefix', 'admin').'/backup') }}'><i class='fa fa-hdd-o'></i> <span>{{ trans('backpack::base.Backups') }}</span></a></li>
      <li><a href='{{ url(config('backpack.base.route_prefix', 'admin').'/log') }}'><i class='fa fa-terminal'></i> <span>{{ trans('backpack::base.Logs') }}</span></a></li>
    </ul>
</li>

<li><a href='{{ backpack_url('upload') }}'><i class='fa fa-tag'></i> <span>{{ trans('backpack::base.Uploads') }}</span></a></li>
