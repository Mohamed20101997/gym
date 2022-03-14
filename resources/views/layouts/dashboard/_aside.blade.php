<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('uploads/user_images/default.png')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->guard('admin')->user()->name }}</p>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{\Request::route()->getName() == 'index' ? 'active' : ''}}" ><a href="{{ route('index') }}"><i class="fa fa-th"></i><span class="app-menu__label">Dashboard</span></a></li>

            <li class="{{\Request::route()->getName() == 'serialNumber.index' ? 'active' : ''}}" ><a href="{{ route('serialNumber.index') }}"><i class="fa fa-key"></i><span class="app-menu__label">Serial Number</span></a></li>

            <li class="{{\Request::route()->getName() == 'client.index' ? 'active' : ''}}" ><a href="{{ route('client.index') }}"><i class="fa fa-users"></i><span class="app-menu__label">Clients</span></a></li>

            <li class="{{\Request::route()->getName() == 'product.index' ? 'active' : ''}}" ><a href="{{ route('product.index') }}"><i class="fa fa-product-hunt"></i><span class="app-menu__label">Products</span></a></li>

            <li class="{{\Request::route()->getName() == 'category.index' ? 'active' : ''}}" ><a href="{{ route('category.index') }}"><i class="fa fa-list"></i><span class="app-menu__label">Categories</span></a></li>

            <li class="{{\Request::route()->getName() == 'followUp.index' ? 'active' : ''}}" ><a href="{{ route('followUp.index') }}"><i class="fa fa-arrow-circle-o-up"></i><span class="app-menu__label">Follow Ups</span></a></li>

            <li class="{{\Request::route()->getName() == 'meal.index' ? 'active' : ''}}" ><a href="{{ route('meal.index') }}"><i class="fa fa-cutlery"></i><span class="app-menu__label">Meals</span></a></li>

            <li class="{{\Request::route()->getName() == 'exercise.index' ? 'active' : ''}}" ><a href="{{ route('exercise.index') }}"><i class="icon-sort-by-attributes"></i><span class="app-menu__label">Exercise</span></a></li>

        </ul>

    </section>

</aside>

