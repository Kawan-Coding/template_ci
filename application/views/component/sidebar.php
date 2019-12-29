<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?php echo base_url(); ?>dist/index">Zero Admin</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="<?php echo base_url(); ?>dist/index">Zero</a>
    </div>
    <ul class="sidebar-menu">
      <!-- dashboard -->
      <li class="menu-header">Dashboard</li>
      <li class="<?php echo $this->uri->segment(2) == '' || $this->uri->segment(2) == 'index' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>

      <!-- Power Go -->
      <li class="<?php echo $this->uri->segment(2) == 'power_go' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/power_go"><i class="fas fa-fire"></i> <span>Power Go</span></a></li>
     
      <!-- account -->
      <li class="dropdown <?php echo $this->uri->segment(2) == 'customer' || $this->uri->segment(2) == 'zero' ? 'active' : ''; ?>">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Account</span></a>
        <ul class="dropdown-menu">
          <li class="<?php echo $this->uri->segment(2) == 'customer' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/customer">Customer</a></li>
          <li class="<?php echo $this->uri->segment(2) == 'zero' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/zero">Zero</a></li>
        </ul>
      </li>

      <!-- report -->
      <li class="dropdown <?php echo $this->uri->segment(2) == 'transaction_report' || $this->uri->segment(2) == 'finance_report' ? 'active' : ''; ?>">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-database"></i><span>Report</span></a>
        <ul class="dropdown-menu">
          <li class="<?php echo $this->uri->segment(2) == 'transaction_report' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/transaction_report">Transaction</a></li>
          <li class="<?php echo $this->uri->segment(2) == 'finance_report' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/finance_report">Finance</a></li>
        </ul>
      </li>
      </li>
    </ul>
  </aside>
</div>