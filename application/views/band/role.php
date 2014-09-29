<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bandbrary</title>

	<?php $this->load->view('header'); ?>

</head>
<style>
.col-xs-3 {
	float: left;
	height: 970px;
	background-color: #f7f7f7;
	border-left: 1px solid #C0C0C0;
	border-right: 1px solid #C0C0C0;
	-webkit-box-shadow: 0 1px 0px rgba(0,0,0,0.05);
	-moz-box-shadow: 0 1px 0px rgba(0,0,0,0.05);
	box-shadow: 0 1px 0px rgba(0,0,0,0.05);
	background-color: #F7F6F6 ;
	padding-left: 0px;
	padding-right: 0px;
}
.col-xs-7 {
	padding-left: 20px;
	padding-right: 0px;
	border: 0px solid #FFFFFF;
}
.container {
	background-color: #FFFFFF;
	-webkit-box-shadow: 0 2px 2px -2px rgba(0, 0, 0, .52);
	box-shadow: 0 1px 1px rgba(0,0,0,.24),0 1px 5px rgba(0,0,0,.05);
}
.ui.vertical.menu {
	width: 29rem;
	border-radius: 0px;
}
.ui.vertical.menu > .active.item {
	box-shadow: 0em 0 0 inset;
}
.ui.vertical.pointing.menu > .active.item:after {
	border-top: 0px;
	border-right: 0px;
	border-left: 1px solid #C0C0C0;;
	margin-top: -.4em;
	left: 28.9rem;
}
.ui.pointing.menu > .active.item:after {
	background-color: #FFFFFF;
	width: .8em;
	height: .8em;
}
.ui.menu {
	background-color: #F7F6F6;
}
.ui.menu .item {
	font-size: 1.5rem;
	padding: 1em 1em;
}
.ui.menu:first-child {
	margin-top: 3rem;
}
.ui.form.segment{
	-webkit-box-shadow: none;
	box-shadow: none;
}
.line {
	width: 750px;
}
.ui.table {
	font-size: 1em;
}
.ui.label {
font-size: 1rem;
}
.ui.table td {
padding: 0.40em 1.2em;
}
.ui.table th {
	padding: 0.9em 1.2em;
}

</style>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-3">
				<div class="ui vertical menu">
					<div class="header item">
						<i class="user icon"></i>
						ACCOUNT
					</div>
					<div class="menu">
						<a href="<?= base_url('account/edit') ?>" class="item">Genaral</a>
						<a href="<?= base_url('account/password') ?>" class="item">Password</a>
					</div>
					<div class="header item">
						<i class="circle blank icon"></i>
						BAND
					</div>
					<div class="menu">
						<a href="<?= base_url('band/edit') ?>" class="item">Information</a>
						<a href="<?= base_url('band/request') ?>" class="item">Join Request</a>
						<a href="<?= base_url('band/role') ?>" class="item">Roles</a>>
					</div>
				</div>
			</div>
			<div class="col-xs-7">
				<table class="ui table segment">
					<p>
						<h1>Band Roles</h1>
						<div class="line"></div><br><p>
						<thead>
							<tr><th>Name</th>
								<th>Status</th>
								<th>Position</th>
							</tr></thead>
							<tbody>
								<tr>
									<td>Cheniphat Varasai</td>
									<td>
										<a class="ui green label">
											Approved
										</a>
									</td>
									<td>
										<div class="ui selection dropdown">
											<input type="hidden" name="gender">
											<div class="default text" style="font-size: 14px;">Position</div>
											<i class="dropdown icon"></i>
											<div class="menu">
												<div class="item" data-value="1" style="font-size: 14px;">Band Master</div>
												<div class="item" data-value="0" style="font-size: 14px;">Member</div>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td>Punpun Sa</td>
									<td>
										<a class="ui blue label">
											Pending
										</a>
									</td>
									<td>
										<div class="ui selection dropdown">
											<input type="hidden" name="gender">
											<div class="default text" style="font-size: 14px;">Position</div>
											<i class="dropdown icon"></i>
											<div class="menu">
												<div class="item" data-value="1" style="font-size: 14px;">Band Master</div>
												<div class="item" data-value="0" style="font-size: 14px;">Member</div>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td>Chanin Nualprasong</td>
									<td>
										<a class="ui red label">
										Denied
									</div>
									</td>
									<td>
										<div class="ui selection dropdown">
											<input type="hidden" name="gender">
											<div class="default text" style="font-size: 14px;">Position</div>
											<i class="dropdown icon"></i>
											<div class="menu">
												<div class="item" data-value="1" style="font-size: 14px;">Band Master</div>
												<div class="item" data-value="0" style="font-size: 14px;">Member</div>
											</div>
										</div>
									</td>
								</tr>
							</tbody>
							<tfoot>
								<tr><th colspan="3">
									<div class="ui form">
										<div class="field">
											<input type="text" placeholder="invite more member">
										</div>
									</div>
								</th>
							</tr></tfoot>
						</table>
						<br><p><div class="line"></div><p>
					<div class="ui red submit button">Save Change</div>
					</div>
					<div class="col-xs-2"></div>
				</div>
			</div>

			<?php $this->load->view('footer'); ?>
			<script>
			</script>
		</body>
		</html>