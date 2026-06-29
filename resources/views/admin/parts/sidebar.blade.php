  <!--sidebar wrapper -->
  <div class="sidebar-wrapper" data-simplebar="true">
      <div class="sidebar-header">
          <div>
              <img src="{{ asset('') }}assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
          </div>
          <div>
              <h4 class="logo-text">Dashtreme</h4>

          </div>
          <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
          </div>
      </div>
      <!--navigation-->
      <ul class="metismenu" id="menu">
          <li>
              <a href="{{ route('admin.dashboard') }}">
                  <div class="parent-icon"><i class='bx bx-grid-alt'></i></div>
                  <div class="menu-title">Dashboard</div>
              </a>
          </li>

          <li>
              <a href="{{ route('parcel.index') }}">
                  <div class="parent-icon"><i class='bx bx-package'></i></div>
                  <div class="menu-title">Parcels</div>
              </a>
          </li>

          <li>
              <a href="{{ route('parcel.index') }}">
                  <div class="parent-icon"><i class='bx bx-calendar-check'></i></div>
                  <div class="menu-title">Bookings</div>
              </a>
          </li>

          <li>
              <a href="tracking.php">
                  <div class="parent-icon"><i class='bx bx-current-location'></i></div>
                  <div class="menu-title">Tracking</div>
              </a>
          </li>

          <li>
              <a href="{{ route('parcel.create') }}">
                  <div class="parent-icon"><i class='bx bx-send'></i></div>
                  <div class="menu-title">Send Parcel</div>
              </a>
          </li>

          <li>
              <a href="{{ route('hub.index') }}">
                  <div class="parent-icon"><i class='bx bx-buildings'></i></div>
                  <div class="menu-title">Hubs</div>
              </a>
          </li>

          <li>
              <a href="{{ route('hub.create') }}">
                  <div class="parent-icon"><i class='bx bx-plus-circle'></i></div>
                  <div class="menu-title">Add Hub</div>
              </a>
          </li>

          <li>
              <a href="users.php">
                  <div class="parent-icon"><i class='bx bx-group'></i></div>
                  <div class="menu-title">Users</div>
              </a>
          </li>

          <li>
              <a href="hub-managers.php">
                  <div class="parent-icon"><i class='bx bx-user-pin'></i></div>
                  <div class="menu-title">Hub Managers</div>
              </a>
          </li>

          <li>
              <a href="reports.php">
                  <div class="parent-icon"><i class='bx bx-bar-chart-alt-2'></i></div>
                  <div class="menu-title">Reports</div>
              </a>
          </li>

          <li>
              <a href="notifications.php">
                  <div class="parent-icon"><i class='bx bx-bell'></i></div>
                  <div class="menu-title">Notifications</div>
              </a>
          </li>

          <li>
              <a href="email-logs.php">
                  <div class="parent-icon"><i class='bx bx-envelope'></i></div>
                  <div class="menu-title">Email Logs</div>
              </a>
          </li>

          <li>
              <a href="settings.php">
                  <div class="parent-icon"><i class='bx bx-cog'></i></div>
                  <div class="menu-title">Settings</div>
              </a>
          </li>

          <li>
              <a href="activity-logs.php">
                  <div class="parent-icon"><i class='bx bx-history'></i></div>
                  <div class="menu-title">Activity Logs</div>
              </a>
          </li>

          <li>
              <a href="profile.php">
                  <div class="parent-icon"><i class='bx bx-user-circle'></i></div>
                  <div class="menu-title">Profile</div>
              </a>
          </li>

          <li>
              <a href="{{ route('logout') }}"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <div class="parent-icon">
                      <i class='bx bx-log-out'></i>
                  </div>
                  <div class="menu-title">Logout</div>
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </li>







      </ul>
      <!--end navigation-->
  </div>
  <!--end sidebar wrapper -->
