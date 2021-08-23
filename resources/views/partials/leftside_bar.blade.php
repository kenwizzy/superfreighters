<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{url('/')}}" class="brand-link">HOME</a>
    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item has-treeview">
            <a href="{{url('dashboard')}}" class="nav-link active">
              <p>
                Dashboard

              </p>
            </a>

          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('countries')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Countries</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('transport_mode')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mode of Transport</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url('weights')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Weights</p>
                </a>
              </li>
            </ul>
          </li>
            </ul>
          </li>

        </ul>
      </nav>
    </div>
    <!-- /.sidebar -->
  </aside>
