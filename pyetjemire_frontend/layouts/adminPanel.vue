<template>
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button">
            <i class="fas fa-bars"></i>
          </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <nuxt-link to="/" class="nav-link">Home</nuxt-link>
        </li>
      </ul>

      <div class="navbar-nav ml-auto">
        <a href="auth/logout" @click.prevent="logout()">Sign Out</a>
      </div>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <span class="brand-text font-weight-light">Admin Panel</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
            <span class="d-block color-white" v-if="this.$auth.user">{{ $auth.user.name }}</span>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul
            class="nav nav-pills nav-sidebar flex-column"
            data-widget="treeview"
            role="menu"
            data-accordion="false"
          >
            <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library-->
            <li class="nav-item menu-open">
              <nuxt-link to="/admin/dashboard" class="nav-link active">
                <font-awesome-icon far icon="tachometer-alt" />
                <p>Dashboard</p>
              </nuxt-link>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <nuxt-link to="/admin/users" class="nav-link">
                    <font-awesome-icon far icon="user-circle" />
                    <p>Users</p>
                  </nuxt-link>
                </li>
                <li class="nav-item">
                  <nuxt-link to="/admin/questions" class="nav-link">
                    <font-awesome-icon far icon="user-circle" />
                    <p>Pyetjet</p>
                  </nuxt-link>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <Nuxt />
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy;</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1.0
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
</template>

<script>
export default {
  middleware: ["admin"],

  methods: {
    async logout() {
      try {
        await this.$auth.logout();
      } catch (err) {
        console.log(err);
      }
    }
  }
};
</script>

<style scoped>

@import "~/assets/css/adminlte.min.css";
.color-white {
  color: white;
  text-transform: capitalize;
}
</style>
