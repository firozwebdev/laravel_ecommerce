<style>
    .current{

        background-color: #2a2e3a !important;
    }
    .mydrop{
        display:block !important;
    }

</style>

<div class="text-center">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
</div>
<div class="side-bar-wrapper collapse navbar-collapse navbar-ex1-collapse">

    <div class="search-box">
        <input type="text" placeholder="SEARCH" class="form-control">
    </div>
    <ul class="side-menu">
        <li>
            <a href="notifications.html">
                <span class="badge badge-notifications pull-right alert-animated">5</span>
                <i class="icon-flag"></i> Notifications
            </a>
        </li>
    </ul>
    <div class="relative-w">
        <ul class="side-menu">
            <li  <?php if(Request::is('dashboard')){echo ' class="active"';} else {echo '';}?>>
                <a  href="index.html">
                    <span class="badge pull-right">17</span>
                    <i class="icon-dashboard"></i> Dashboard
                </a>
            </li>
            <li>
            <!--<li <?php if(Request::is('add-category') || Request::is('manage-category')){echo ' class="active"';} else {echo '';}?>>
                <a href="#" class="is-dropdown-menu">
                    <span class="badge pull-right"></span>
                    <i class="icon-code-fork"></i> Category
                </a>
                <ul <?php if(Request::is('add-category') || Request::is('manage-category')){echo ' class="mydrop"';} else {echo '';}?>>

                    <li <?php if(Request::is('add-category')){echo ' class="current"';} else {echo '';}?>>
                        <a href="{{ route('add.category') }}">
                            <i class="icon-beaker"></i>
                            Add Category
                        </a>
                    </li>
                    <li <?php if(Request::is('manage-category')){echo ' class="current"';} else {echo '';}?>>
                        <a href="{{ route('manage.category') }}">
                            <i class="icon-picture"></i>
                            Manage Category
                        </a>
                    </li>
                </ul>
            </li>-->


            <li <?php if(Request::is('add-blog') || Request::is('manage-blog') || Request::is('manage-comment')){echo ' class="active"';} else {echo '';}?>>
                <a href="#" class="is-dropdown-menu">
                    <span class="badge pull-right"></span>
                    <i class="icon-bar-chart"></i> Blog
                </a>
                <ul <?php if(Request::is('add-blog') || Request::is('manage-blog') || Request::is('manage-comment')){echo ' class="mydrop"';} else {echo '';}?>>
                    <li  <?php if(Request::is('add-blog')){echo ' class="current"';} else {echo '';}?>>
                        <a href="{{ route('add.blog') }}">
                            <i class="icon-random"></i>
                            Add Blog
                        </a>
                    </li>
                    <li  <?php if(Request::is('manage-blog')){echo ' class="current"';} else {echo '';}?>>
                        <a href="{{ route('manage.blog') }}">
                            <i class="icon-bullseye"></i>
                           Manage Blog
                        </a>
                    </li>
                    <li  <?php if(Request::is('manage-comment')){echo ' class="current"';} else {echo '';}?>>
                        <a href="{{ route('manage.comment') }}">
                            <i class="icon-bullseye"></i>
                           Manage Comment
                        </a>
                    </li>

                </ul>
            </li>

           <!-- <li <?php if(Request::is('add-page') || Request::is('manage-page')){echo ' class="active"';} else {echo '';}?>>
                <a href="charts.html" class="is-dropdown-menu">
                    <span class="badge pull-right"></span>
                    <i class="icon-bar-chart"></i> Page
                </a>
                <ul <?php if(Request::is('add-page') || Request::is('manage-page')){echo ' class="mydrop"';} else {echo '';}?>>
                    <li  <?php if(Request::is('add-page')){echo ' class="current"';} else {echo '';}?>>
                        <a href="{{ route('add.page') }}">
                            <i class="icon-random"></i>
                            Add Page
                        </a>
                    </li>
                    <li  <?php if(Request::is('manage-page')){echo ' class="current"';} else {echo '';}?>>
                        <a href="{{ route('manage.page') }}">
                            <i class="icon-bullseye"></i>
                            Manage Pages
                        </a>
                    </li>


                </ul>
            </li>-->


            <!--<li>
                <a href="datatable.html" class="is-dropdown-menu">
                    <span class="badge pull-right">24</span>
                    <i class="icon-th"></i> Tables
                </a>
                <ul>
                    <li>
                        <a href="datatable.html">
                            <i class="icon-list-alt"></i>
                            Data Tables
                        </a>
                    </li>
                    <li>
                        <a href="table.html">
                            <i class="icon-table"></i>
                            Regular Tables
                        </a>
                    </li>
                </ul>
            </li>-->
            <li <?php if(Request::is('add-user') || Request::is('manage-user')){echo ' class="active"';} else {echo '';}?>>
                <a href="datatable.html" class="is-dropdown-menu">
                    <span class="badge pull-right">24</span>
                    <i class="icon-th"></i> Customers
                </a>
                <ul <?php if(Request::is('add-user') || Request::is('manage-customer')){echo ' class="mydrop"';} else {echo '';}?>>
                    <li  <?php if(Request::is('add-user')){echo ' class="current"';} else {echo '';}?>>
                        <!--<a href="{{ route('add.user') }}">
                            <i class="icon-list-alt"></i>
                            Add User
                        </a>-->
                    </li>
                    <li  <?php if(Request::is('manage-customer')){echo ' class="current"';} else {echo '';}?>>
                        <a href="{{ route('manage.customer') }}">
                            <i class="icon-table"></i>
                           Manage Customers
                        </a>
                    </li>
                </ul>
            </li>


            <?php
                $count = DB::table('contact')
                        ->where('message_status',0)
                        ->count();

            ?>



            <li  <?php if(Request::is('inbox-mail')){echo ' class="active"';} else {echo '';}?>>
                <a href="{{ route('manage.mail') }}">
                    @if($count>0)
                        <span class="badge pull-right alert-animated">
                            {{ $count }} new
                         </span>
                    @endif
                    <i class="icon-inbox"></i>
                    Inbox
                </a>
            </li>

            <li <?php if(Request::is('ecommerce-add-category') || Request::is('ecommerce-manage-category')){echo ' class="active"';} else {echo '';}?>>
                <a href="datatable.html" class="is-dropdown-menu">
                    <span class="badge pull-right">24</span>
                    <i class="icon-th"></i> Ecommerce
                </a>
                <ul <?php if(Request::is('ecommerce-add-category') || Request::is('ecommerce-manage-category')){echo ' class="mydrop"';} else {echo '';}?>>
                    <li  <?php if(Request::is('ecommerce-add-category')){echo ' class="current"';} else {echo '';}?>>
                        <a href="{{ route('ecommerce.add.category') }}">
                            <i class="icon-list-alt"></i>
                            Add Category
                        </a>
                    </li>

                    <li  <?php if(Request::is('ecommerce-manage-category')){echo ' class="current"';} else {echo '';}?>>
                        <a href="{{ route('ecommerce.manage.category') }}">
                            <i class="icon-list-alt"></i>
                            Manage Category
                        </a>
                    </li>
                    <li  <?php if(Request::is('ecommerce-add-product')){echo ' class="current"';} else {echo '';}?>>
                        <a href="{{ route('ecommerce.add.product') }}">
                            <i class="icon-list-alt"></i>
                            Add Product
                        </a>
                    </li>

                    <li  <?php if(Request::is('ecommerce-manage-product')){echo ' class="current"';} else {echo '';}?>>
                        <a href="{{ route('ecommerce.manage.product') }}">
                            <i class="icon-list-alt"></i>
                            Manage Product
                        </a>
                    </li>



                </ul>
            </li>

            <!-- <li>
                 <a href="{{ route('incoming.mail') }}">
                     <span class="badge pull-right"></span>
                     <i class="icon-signin"></i> Incoming mail
                 </a>
             </li>-->

           <!-- <li>
                <a href="login.html">
                    <span class="badge pull-right"></span>
                    <i class="icon-signin"></i> Login Page
                </a>
            </li>-->
        </ul>
    </div>
</div>