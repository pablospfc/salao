
<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="<?php echo site_url('inicio'); ?>"><i class="icon-dashboard"></i><span class="hidden-tablet"> Início</span></a></li>
						<li><a href="<?php echo site_url('cliente'); ?>"><i class="icon-group"></i><span class="hidden-tablet"> Clientes</span></a></li>
						<li><a href="<?php echo site_url('profissional'); ?>"><i class="icon-user"></i><span class="hidden-tablet"> Profissionais</span></a></li>
						<li><a href="<?php echo site_url('servico'); ?>"><i class="icon-wrench"></i><span class="hidden-tablet"> Serviços</span></a></li>
						<li><a href="<?php echo site_url('produto'); ?>"><i class="icon-barcode"></i><span class="hidden-tablet"> Produtos</span></a></li>
						<li><a href="<?php echo site_url('fornecedor'); ?>"><i class="icon-truck"></i><span class="hidden-tablet"> Fornecedores</span></a></li>
						<li><a href="<?php echo site_url('cartao'); ?>"><i class="icon-credit-card"></i><span class="hidden-tablet"> Cartões</span></a></li>
						<li><a href="<?php echo site_url('agenda'); ?>"><i class="icon-calendar"></i><span class="hidden-tablet"> Agenda</span></a></li>
						<li><a href="<?php echo site_url('venda'); ?>"><i class="icon-shopping-cart"></i><span class="hidden-tablet"> Vendas</span></a></li>
						<li><a href="<?php echo site_url('movimentacao'); ?>"><i class="icon-cargo"></i><span class="hidden-tablet"> Estoque</span></a></li>
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Contas</span><span class="label label-important"> 2 </span></a>
							<ul>
								<li><a class="submenu" href="<?php echo site_url('contas_pagar/index'); ?>"><i class="icon-file-alt"></i><span class="hidden-tablet"> Contas a Pagar</span></a></li>
								<li><a class="submenu" href="<?php echo site_url('contas_receber/index'); ?>"><i class="icon-file-alt"></i><span class="hidden-tablet"> Contas a Receber</span></a></li>
							</ul>
						</li>
						<li>
							<a class="dropmenu" href="#"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Relatórios</span><span class="label label-important"> 3 </span></a>
							<ul>
								<li><a class="submenu" href="submenu.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> </span></a></li>
								<li><a class="submenu" href="submenu2.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> </span></a></li>
							</ul>
						</li>
						<li>
							<a class="dropmenu" href="#"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Configurações</span><span class="label label-important"> 3 </span></a>
							<ul>
								<li><a class="submenu" href="<?php echo site_url('empresa/view/'.$this->session->userdata('id_empresa')); ?>"><i class="icon-file-alt"></i><span class="hidden-tablet">Empresa</span></a></li>
								<li><a class="submenu" href="<?php echo site_url('usuario'); ?>"><i class="icon-file-alt"></i><span class="hidden-tablet">Usuários</span></a></li>
								<li><a class="submenu" href="<?php echo site_url('perfil'); ?>"><i class="icon-file-alt"></i><span class="hidden-tablet">Perfis</span></a></li>
								<li><a class="submenu" href="<?php echo site_url('permissao'); ?>"><i class="icon-file-alt"></i><span class="hidden-tablet">Permissões</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>