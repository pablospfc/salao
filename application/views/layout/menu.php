<div class="navbar-default sidebar" role="navigation">
	<div class="sidebar-nav navbar-collapse">
		<ul class="nav" id="side-menu">
			<li>
				<a href="<?php echo site_url('inicio'); ?>"><i class="fa fa-dashboard fa-fw"></i> Início</a>
			</li>
			<li>
				<a href="<?php echo site_url('cliente'); ?>"><i class="fa fa-users fa-fw"></i> Clientes</a>
			</li>
			<li>
				<a href="<?php echo site_url('profissional'); ?>"><i class="fa fa-user fa-fw"></i> Profissionais</a>
			</li>
			<li>
				<a href="<?php echo site_url('servico'); ?>"><i class="fa fa-wrench fa-fw"></i> Serviços</a>
			</li>
			<li>
				<a href="<?php echo site_url('produto'); ?>"><i class="fa fa-barcode fa-fw"></i> Produtos</a>
			</li>
			<li>
				<a href="<?php echo site_url('fornecedor'); ?>"><i class="fa fa-truck fa-fw"></i> Fornecedores</a>
			</li>
			<li>
				<a href="<?php echo site_url('cartao'); ?>"><i class="fa fa-credit-card fa-fw"></i> Cartões</a>
			</li>
			<li>
				<a href="<?php echo site_url('agenda'); ?>"><i class="fa fa-calendar fa-fw"></i> Agenda</a>
			</li>
			<li>
				<a href="<?php echo site_url('venda'); ?>"><i class="fa fa-shopping-cart fa-fw"></i> Vendas</a>
			</li>
			<li>
				<a href="<?php echo site_url('movimentacao'); ?>"><i class="fa fa-cubes fa-fw"></i> Estoque</a>
			</li>
			<li>
				<a href="<?php echo site_url('empresa/view/'.$this->session->userdata('id_empresa')); ?>"><i class="fa fa-cubes fa-fw"></i> Empresa</a>
			</li>
		</ul>
	</div>
	<!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>





