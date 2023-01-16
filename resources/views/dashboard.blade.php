
<!DOCTYPE html>
<html lang="en">
  <head>
   
    @include('admin.css')
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
       
    @include('admin.leftbar')
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    @include('admin.header')
    <!-- br-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    @include('admin.rightbar')
    <!-- br-sideright -->
    <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->
       <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper @yield('content-wrapper-class')">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            @yield('breadcrumb')
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block">
                    <div class="form-group breadcrumb-right">

                    </div>
                </div>
            </div>
            <div class="content-body">
                {{-- Content Start From Here --}}
                    @yield('content')
                {{-- Content End Here --}}
            </div>
        </div>
    </div>
   
    <!-- ########## END: MAIN PANEL ########## -->
    

   @include('admin.script')
  </body>
</html>

