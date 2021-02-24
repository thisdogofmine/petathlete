<?php
//new dashboard

function dash(){
	?>
<div style="text-align:center; width:100%;">
	<ul class='sf-menu' style='border:thin solid #00853F;'>
		<li style="width:9%">
			<a href="index.php">ADMIN</a>
				<ul>
					<li><a href="">Admin stuff</a></li>
				</ul>
			</li>
		<li style="width:12%">
			<a href="">Sports</a>
			<ul>
				<li>
					<a href="">Agility</a>
				</li>
				<li>
					<a href="">Scent Work</a>
				</li>
				<li>
					<a href="">Dock Diving</a>
				</li>
				<li>
					<a href="">Frisbee</a>
				</li>
				<li>
					<a href="">FlyBall</a>
				</li>
				<li>
					<a href="">Rally</a>
				</li>
				<li>
					<a href="">Barn Hunt</a>
				</li>
				<li>
					<a href="">Lure Course</a>
				</li>
			</ul>
		</li>
		<li style="width:10%">
			<a href="">Agility Lessons</a>
			<ul>
				<li>
					<a>Beginner 1</a>
					<ul>
						<li>
							<a href="">Week 1</a>
						</li>
						<li>
							<a href="">Week 2</a>
						</li>
						<li>
							<a href="">Week 3</a>
						</li>
						<li>
							<a href="">Week 4</a>
						</li>
						<li>
							<a href="">Week 5</a>
						</li>
						<li>
							<a href="">Week 6</a>
						</li>
						<li>
							<a href="">Week 7</a>
						</li>
					</ul>
				</li>
				<li>
					<a>Beginner 2</a>
					<ul>
						<li>
							<a href="">Week 1</a>
						</li>
						<li>
							<a href="">Week 2</a>
						</li>
						<li>
							<a href="">Week 3</a>
						</li>
						<li>
							<a href="">Week 4</a>
						</li>
						<li>
							<a href="">Week 5</a>
						</li>
						<li>
							<a href="">Week 6</a>
						</li>
						<li>
							<a href="">Week 7</a>
						</li>
					</ul>
				</li>
			</ul>
		</li>
		<li style="width:11%">
			<a href="list.php">Dog List</a>
		</li>
		<li style="width:8%">
			<a href="index.php">Clubs</a>
			<ul>
				<li><a target=_blank onClick="h(this);" href="">ARF</a></li>
				<li><a target=_blank onClick="h(this);" href="">Sky Dogs</a></li>
				<li><a target=_blank onClick="h(this);" href="">All Breed</a></li>
				<li><a target=_blank onClick="h(this);" href="">Increadipaws</a></li>
			</ul>
		</li>
		
		<li style="width:6%">
			<a href="">Stuff</a>
		</li>
	</ul>
</div>
<?php 
}

//dash 2 is not in use at the moment
function dash2($menu_group){
	$menu_group_list=array('menu_ccm'=>'CCM',
			
			//'menu_recon'=>'Relocation/Construction',
			'menu_reloc'=>'Relocation',
			'menu_fcon'=>'Construction',
			
			'menu_fe'=>'FE Tool',
			'menu_fiber'=>'Fiber Planning',
			'menu_module'=>'Modules',
			'menu_optimization'=>'Optimization'
	);
	?>
	<div style="text-align:center; width:100%;">
	<div class='menu_group_div'>
		<select id='menu_group_select' onchange='load_menu_group(this);'>
		<?php
		foreach($menu_group_list as $key=>$value){
			$selected=($menu_group==$key) ? "selected='selected'" : '';
			echo "<option value='$key' $selected>$value</option>";
		}
		?>
		</select>
	</div>
	
	<ul id='ccm_menu' class='sf-menu'>
		<!-- ADMIN -->
		<?php
		if (($_SESSION['MIMIC']) 
		|| (isset($_SESSION['current_user']))){ 
			?>
			<li class='menu_ccm menu_reloc menu_fcon menu_fe menu_fiber menu_module menu_optimization' style="width:9%">
				<a href="http://<?=CCM_SERVER?>/index.php">ADMIN</a>
				<ul>
					<? 
					if(in_array($_SESSION['current_user'], $_SESSION['admin']['ids'])){ 
						?>
						<li><a target=_blank href="http://<?=CCM_SERVER?>/index.php?canine=admin/email&sum=create">Admin Email</a></li>
						<li><a target=_blank href="http://<?=CCM_SERVER?>/index.php?canine=admin/email&sum=groups">Email Groups</a></li>
						<li><a>WS Tests</a><ul>
							<li><a target=_blank href="http://<?=CCM_SERVER?>/index.php?canine=webservice%2Ftest_ccm_ws&sum=test_gui">CCM WS test</a></li>
							<li><a target=_blank href="http://<?=CCM_SERVER?>/index.php?canine=webservice%2Ftest_wms_ws&sum=wms_test">WMS WS test</a></li>
							<li><a target=_blank href="http://<?=CCM_SERVER?>/webservice/test_ncms_ws.php">WMS NCMS test</a></li>
						</ul></li>
						<li><a target=_blank href="http://<?=CCM_SERVER?>/index.php?canine=admin/mimic_user&sum=mimic_user">mimic_user</a></li>
						<li><a target=_blank href="http://<?=CCM_SERVER?>/maintenance.php">maintenance</a></li>
					<?}?>
					
					<? 
					if(
						(
							is_array($_SESSION['admin']) 
							&& 
							in_array($_SESSION['current_user'], $_SESSION['admin']['ids']) 
						)
						||
						(
							is_array($_SESSION['discipline']) 
							&& 
							!in_array('CDPT', $_SESSION['discipline'])
						)
						|| 
						$_SESSION['is_mgr'] == "Y"
					){ 
						?>
						<li><a target=_blank href="http://<?=CCM_SERVER?>/manage_users.php">Manage Users</a></li>
					<? } ?>
					<? 
					if(
						is_array($_SESSION['discipline']) 
						&& 
						!in_array('Guest', $_SESSION['discipline'])
					){ 
						?>
						<li><a target=_blank href="http://<?=CCM_SERVER?>/index.php?canine=user_backup/backup&sum=user_backups">Backup</a></li>
						<li><a target=_blank href="http://<?=CCM_SERVER?>/index.php?canine=regions&sum=start">Manage regions</a></li>
						<?
					}
					?>
					
					<? 
					$relo_types = array('businessanalyst','relocation_pm','reimbursable_pm','ospe');
					
					if(is_array($_SESSION['MANAGERTYPE']) 
						&& 
						array_intersect($relo_types, $_SESSION['MANAGERTYPE'])
					){
						?>
						
						<li><a>Maintenance</a><ul>
							<li><a target=_blank href="http://<?=CCM_SERVER?>/index.php?canine=maintenance/iru_span_maint&sum=edit">IRU Span Maintenance</a></li>
							<li><a target=_blank href="http://<?=CCM_SERVER?>/index.php?canine=maintenance/reimbursable_customer_maint&sum=edit">Reimbursable Customer Maintenance</a></li>
							<li><a target=_blank href="http://<?=CCM_SERVER?>/index.php?canine=maintenance/reloc_ra_maint&sum=edit">Relocation Agency Maintenance</a></li>
						</ul></li>
						<?
					}
					?>
					
					
					<li><a target=_blank href="http://<?=CCM_SERVER?>/index.php?canine=view_regions&sum=view_disciplines">View Region Assignments</a></li>
					<li><a target=_blank href="http://<?=CCM_SERVER?>/index.php?canine=start">User Info</a></li>
					
				</ul>
			</li>
		<?php } ?>
		
		<!-- Reloc - summary -->
		<li class='menu_reloc' style="width:10%">
			<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Fsummary_fcon&sum=recon_summary">Relocation Summary</a>
		
		<!-- Reloc - New -->
		<?
		//only BAs and PMs are allowed to created reloc investigations
		
		if(is_array($_SESSION['MANAGERTYPE']) 
			&& 
			array_intersect(array('businessanalyst', 'relocation_pm', 'ospe', 'reimbursable_pm'), $_SESSION['MANAGERTYPE'])
		){
			?><li class='menu_reloc'>
				<a href="#" onclick="insert_new_relocation_investigation();" >New Investigation</a>
			</li>
			<?
		}
		?>
		
		<!-- Reloc - New Duplicate-->
		<?
		if(is_array($_SESSION['MANAGERTYPE']) 
			&& 
			array_intersect(array('businessanalyst', 'relocation_pm', 'ospe', 'reimbursable_pm'), $_SESSION['MANAGERTYPE'])
			&&
			$_REQUEST['sum'] == 'recon_form'
		){
			?><li class='menu_reloc'>
				<a href="#" onclick="duplicate_investigation();" >Duplicate Investigation</a>
			</li>
			<?
		}
		?>
		
		
		<!-- Reloc - Reports -->
		<li class='menu_reloc' style="width:11%">
			<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON/relocation_reports&sum=report_list">Relocation Reports</a>
			
			<ul>
				<li><a href="http://<?=CCM_SERVER?>/index.php?canine=FCON/relocation_reports&sum=report_list&catagory=forecast"
					>ForeCast</a>
					<ul>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON/relocation_reports&dd1=forecast_pm">Forecast Report</a>
						</li>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON/relocation_reports&dd1=forecast_pm_next_year">Forecast Report - Next Year</a>
						</li>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON/relocation_reports&dd1=forecast_executive">Forecast Summary - Executive Report</a>
						</li>
					</ul>
				</li>
					
				<li><a href="http://<?=CCM_SERVER?>/index.php?canine=FCON/relocation_reports&sum=report_list&catagory=ba"
					>BA</a>
					<ul>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON/relocation_reports&dd1=ba_counts"
								>Count of Investigations - Select Options</a>
						</li>
						
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON/relocation_reports&dd1=ba_1"
								>Count of investigations - by status and month</a>
						</li>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON/relocation_reports&dd1=ba_2"
								>Count of investigations - by status and month by user(BA)</a>
						</li>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON/relocation_reports&dd1=ba_11"
								>Count of investigations - by BA, Status, and Reviewed Date Month</a>
						</li>
						
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON/relocation_reports&dd1=ba_3"
								>Count of investigations - by state and month</a>
						</li>
						
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON/relocation_reports&dd1=ba_5"
								>Count of investigations - in Deployment by user(BA) by month</a>
						</li>
						
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON/relocation_reports&dd1=ba_6"
								>Count of investigations - in Deployment by state by month </a>
						</li>
						
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON/relocation_reports&dd1=ba_7"
								>Count of investigations - by created by and month</a>
						</li>
						
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON/relocation_reports&dd1=ba_8"
								>Count of investigations - by user(BA) and month where reviewed date is not null</a>
						</li>
						
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON/relocation_reports&dd1=ba_9"
								>Count of Site Survey (NB) - by created by and month</a>
						</li>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON/relocation_reports&dd1=ba_14"
								>Count of Site Survey (NB) - by created by State and month</a>
						</li>
						
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON/relocation_reports&dd1=ba_10"
								>Error Report</a>
						</li>
						
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON/relocation_reports&dd1=ba_12"
								>Response Time</a>
						</li>
						
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON/relocation_reports&dd1=ba_13"
								>FCD Past Due</a>
						</li>
					</ul>
				</li>
				<li><a href="http://<?=CCM_SERVER?>/index.php?canine=FCON/relocation_reports&sum=report_list&catagory=pm"
					>Reloc PM</a>
					<ul>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON/relocation_reports&dd1=pm_1"
								>Project Tracker</a>
						</li>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON/relocation_reports&dd1=pm_2"
								>Mitigation Report</a>
						</li>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON/relocation_reports&dd1=pm_3"
								>Mitigated Cost Summary</a>
						</li>
					</ul>
				</li>
				<li><a href="http://<?=CCM_SERVER?>/index.php?canine=FCON/relocation_reports&sum=report_list&catagory=reimbursable"
					>Reimbursable</a>
					<ul>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON/relocation_reports&dd1=reimbursable_1"
								>aging</a>
						</li>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON/relocation_reports&dd1=reimbursable_2"
								>Roll-up</a>
						</li>
					</ul>
				</li>
				
				
				
				<li><a href="http://<?=CCM_SERVER?>/index.php?canine=FCON/relocation_reports&dd1=wc_1"
					>Workload Calculator</a>
				</li>
				<li><a href="http://<?=CCM_SERVER?>/index.php?canine=FCON/relocation_reports&sum=report_list&catagory=exec"
					>Executive Reports</a>
					<ul>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON/relocation_reports&dd1=forecast_executive"
								>Forecast Summary</a>
						</li>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON/relocation_reports&dd1=pm_3"
								>Mitigated Summary</a>
						</li>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON/relocation_reports&dd1=reimbursement_1"
								>Reimbursement Report</a>
						</li>
					</ul>
				</li>
				
			</ul>
		</li>	
		<!-- FCon - forms -->
		<li class='menu_fcon' style="width:12%">
			<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Fmain_menu&sum=display_menu">Construction Forms</a>
			<ul>
				<li>
					<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON/estimates/estimate_list&sum=est_main&show=">Estimate Tool</a>
				</li>
				<li>
					<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Fsuper_form&sum=select_mgr">Super Form</a>
				</li>
				<li>
					<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Fsam_projects&sum=select_sam_mgr&type=area">Area Manager Projects</a>
				</li>
				<li>
					<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Fsam_projects&sum=select_sam_mgr&type=splice">Splice Manager Projects</a>
				</li>
				<li>
					<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Firu_billable&sum=iru_billable">IRU Billable Projects</a>
				</li>
				<li>
					<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON/po_list&sum=po_log&region=west">PO LOG</a>
				</li>
				<li>
					<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Fcad_form&sum=cad_form">CAD form</a>
				</li>
				<li>
					<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Freports_menu&sum=reports_menu">Reports</a>
				</li>
				<li>
					<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Finvest_input&sum=invest_input">Investigation Input form</a>
				</li>
				<li>
					<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Fplanning_est&sum=planning_ea&type=iof">IOF Fiber Build Jobs</a>
				</li>
				<li>
					<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Fplanning_est&sum=planning_ea&type=ea">Planning Estimates And Actuals Form</a>
				</li>
				<li>
					<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Fce_forecast&sum=select_mgr">CE Forecast</a>
				</li>
				<li>
					<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Fce_reimbursable&sum=ce_reimbursable">CE REIMBURSABLES</a>
				</li>
			</ul>
		</li>
		
		<!-- FCon - reports -->
		<li class='menu_fcon' style="width:10%">
			<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Freports_menu&sum=reports_menu">Construction Reports</a>
			<ul>
				<li>
					<a>projects & investigations</a>
					<ul>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Ffox_reports&sum=fox_report&report=QSELMTNWESTPROJECTSANDINVESTIG">Mnt. West Projects & Investigations</a>
						</li>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Ffox_reports&sum=fox_report&report=QSELWESTWESTPROJECTSANDINVESTI">West Projects & Investigations</a>
						</li>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Ffox_reports&sum=fox_report&report=QSELMIDWESTPROJECTSANDINVESTIG">North Central Projects Investigations</a>
						</li>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Ffox_reports&sum=fox_report&report=QSELCENTRALPROJECTSANDINVESTIG">South Central Projects & Investigations</a>
						</li>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Ffox_reports&sum=fox_report&report=QSELNEPROJECTSANDINVESTIGATION">North East Projects & Investigations</a>
						</li>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Ffox_reports&sum=fox_report&report=QSELGULFCOASTPROJECTSANDINVEST">South East Projects & Investigations</a>
						</li>
					</ul>
				</li>
				<li>
					<a>scorecard</a>
					<ul>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Ffox_reports&sum=fox_report_get_date&report=Q_SCORECARD_APPROVED">Scorecard Projects Approved</a>
						</li>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Ffox_reports&sum=fox_report_get_date&report=Q_SCORECARD_EST">Scorecard Estimates</a>
						</li>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Ffox_reports&sum=fox_report_get_date&report=Q_SCORECARD_COMPLETED">Scorecard Projects Completed</a>
						</li>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Ffox_reports&sum=fox_report_get_date&report=Q_SCORECARD_ACTIVE">Scorecard Projects Active</a>
						</li>
					</ul>
				</li>
				<li>
					<a>manager reports</a>
					<ul>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Ffox_reports&sum=fox_report_splice_mgr">Splice Manager Report</a>
						</li>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Ffox_reports&sum=fox_report_get_date&report=Q_AREA_MANAGER_ACCURACY">Area Manager Accuracy Report</a>
						</li>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Ffox_reports&sum=fox_report_get_date&report=Q_SPLICE_MANAGER_ACCURACY">Splice Manager Accuracy Report</a>
						</li>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Ffox_reports&sum=fox_report_area_mgr">Area Manager Report</a>
						</li>
					</ul>
				</li>
				<li>
					<a>other</a>
					<ul style="overflow-y:auto; height:300px; width:275px">
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Ffox_reports&sum=fox_report_get_date&report=qselSummaryByEmployee">Summary By Employee</a>
						</li>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Ffox_reports&sum=report_regional_mgr&report=Q_PO_CAPITAL">PO % Complete "Capital Projects"</a>
						</li>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Ffox_reports&sum=fox_report2&report=Q_PO_EXPENSE">PO % Complete "Expense Projects"</a>
						</li>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Ffox_reports&sum=fox_report2&report=QSELRUBILLABLEPROJECTS">IRU Report</a>
						</li>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Ffox_reports&sum=fox_report2&report=QRYOFMQUERYUPDATEDFIELDS4_10">SDP Redline Report</a>
						</li>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Ffox_reports&sum=fox_report2&report=QRYCADQUERY">CAD Query</a>
						</li>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Ffox_reports&sum=fox_report2&report=QRYPOREPORTALL">PO Job No Query</a>
						</li>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Ffox_reports&sum=fox_report&report=CAD_NOT_COMPLETE">CAD Not Complete</a>
						</li>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Ffox_reports&sum=fox_report&report=FB_NOT_COMPLETED">FB Not Complete by Region minus SDPs</a>
						</li>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Ffox_reports&sum=fox_select_state&report=Q_SDP_BY_STATE">SDP Receivedby State</a>
						</li>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Ffox_reports&sum=fox_report2&report=Q_ALL_SDPS_ONLY">All SDP Received but not Added to FB</a>
						</li>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Ffox_reports&sum=fox_get_budget_info&report=Q_CE_REPORT">CE Projected Spend Report</a>
						</li>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Ffox_reports&sum=fox_report2&report=Q_CE_REIMBURSABLE_REPORT">CE Reimbursable Report</a>
						</li>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Ffox_reports&sum=fox_report2&report=Q_CE_PRIORITY_BILLING_REPORT">Priority Billing Report</a>
						</li>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Ffox_reports&sum=fox_get_project_info&report=Q_PROJECT_COUNTS" >
								Project Count Report
							</a>
						</li>
						<li>
							<a href="http://qshare/sites/cadfb/Shared%20Documents/Fiber_Availability_Report.pdf" >
								Fiber Availability Report
							</a>
						</li>
						<li>
							<a href="http://<?=CCM_SERVER?>/index.php?canine=FCON%2Ffox_reports&sum=fox_report2&report=R_AREA_MANAGERS_YTD" >
								Area Manager YTD
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</li>
		
		<!-- FET - summary -->
		<li class='menu_fe'>
			<a href="http://<?=CCM_SERVER?>/index.php?canine=fe_tool/index&sum=show_fe_list">FE summary</a>
		</li>
		
		<!-- Optimization - PDAC -->
		<li class='menu_optimization'>
			<a href="http://<?=CCM_SERVER?>/index.php?canine=ofi/dog_pdac_hub&sum=pdac_hub_dashboard_by_owner">PDAC HUBs</a>
		</li>
		
		<!-- Optimization - Utilization -->
		<li class='menu_optimization'>
			<a href="http://<?=CCM_SERVER?>/index.php?canine=ofi%2Fofi&sum=util_report">utilization Report</a>
		</li>
		
		<!-- Optimization - Optimization -->
		<li class='menu_optimization'>
			<a href="http://<?=CCM_SERVER?>/index.php?canine=ofi/ofi&sum=ofi_summary">Optimization Tickets</a>
		</li>
		
		<!-- Optimization - Reports -->
		<li class='menu_optimization'>
			<a href="http://<?=CCM_SERVER?>/index.php?canine=ofi/ofi_reports&sum=ofi_reports">Optimization Reports</a>
		</li>
		
		<!-- CCM - Summary -->
		<li class='menu_ccm' style="width:9%">
			<a href="http://<?=CCM_SERVER?>/index.php">Summary</a>
			<ul>
				<li>
					<a href="http://<?=CCM_SERVER?>/index.php?canine=cdpt_summary&sum=mcase_summary">CDPT summary</a>
				</li>
				<li>
					<a href="http://<?=CCM_SERVER?>/index.php?canine=summary_planner&sum=planner_summary">Planner summary</a>
				</li>
				<li>
					<a href="http://<?=CCM_SERVER?>/index.php?canine=summary_epm&sum=epm_summary">EPM summary</a>
				</li>
				<li>
					<a href="http://<?=CCM_SERVER?>/index.php?canine=summary_asp&sum=asp_summary">ASP summary</a>
				</li>
			</ul>
		</li>
		
		<!-- CCM - Reference -->
		<li class='menu_ccm' style="width:11%">
			<a href="http://<?=CCM_SERVER?>/index.php">Reference Lists</a>
			<ul>
				<? if(is_array($_SESSION['discipline']) && (!in_array('Guest', $_SESSION['discipline']))){ ?>
					<li><a href="http://<?=CCM_SERVER?>/index.php?canine=capital&sum=enter_savings">FOA capital savings</a></li>
				<?}?>
				<li><a target=_blank onClick="h(this);" href="http://qtomag2mw02.qintra.com/qprov/network/nni_details.aspx">Ethernet ACTL List</a></li>
				<li><a href="http://<?=CCM_SERVER?>/index.php?canine=xref_list&sum=bankcd_xref_list">BankCd/Hecig Lookup</a></li>
				<li><a href="http://<?=CCM_SERVER?>/index.php?canine=xref_list&sum=feps_xref_list">Multi-FEPS Reason Codes</a></li>
				<li><a href="http://<?=CCM_SERVER?>/index.php?canine=xref_list&sum=router_prefix_xref_list">Router Prefix by City</a></li>
				<li><a href="http://<?=CCM_SERVER?>/index.php?canine=xref_list&sum=jep_cd_xref_list">Jep Code Priority list</a></li>
			</ul>
		</li>
		
		<!-- CCM - reports -->
		<li class='menu_ccm' style="width:11%">
			<a href="http://<?=CCM_SERVER?>/index.php?canine=dog_reports&sum=canned_reports&catagory=all">Canned Reports</a>
			<ul>
				<li><a href="http://<?=CCM_SERVER?>/index.php?canine=dog_reports&sum=canned_reports&catagory=master_case"
					>Master Case</a></li>
				<li><a href="index.php?canine=dog_reports&sum=canned_reports&catagory=cap_case"
					>Capacity Case</a></li>
				<li><a href="http://<?=CCM_SERVER?>/index.php?canine=dog_reports&sum=canned_reports&catagcanned_reports&catagory=cap_site"
					>Capacity Site/Work items</a></li>
				<li><a href="http://<?=CCM_SERVER?>/index.php?canine=dog_reports&sum=canned_reports&catagory=mtu"
					>MTU</a></li>
				<li><a href="http://<?=CCM_SERVER?>/index.php?canine=dog_reports&sum=canned_reports&catagory=block"
					>Block Reports</a></li>
				<li><a href="http://<?=CCM_SERVER?>/index.php?canine=dog_reports&sum=canned_reports&catagory=mmr"
					>Monthly Manager</a></li>
				<li><a href="http://<?=CCM_SERVER?>/index.php?canine=dog_reports&sum=canned_reports&catagory=sti"
					>STI</a></li>
				<li><a href="http://<?=CCM_SERVER?>/index.php?canine=dog_reports&sum=canned_reports&catagory=target"
					>Target</a></li>
				<li><a href="http://<?=CCM_SERVER?>/index.php?canine=dog_reports&sum=canned_reports&catagory=weekly"
					>Weekly</a></li>
				<li><a href="http://<?=CCM_SERVER?>/index.php?canine=dog_reports&sum=canned_reports&catagory=monthly"
					>Monthly</a></li>
				<li><a href="http://<?=CCM_SERVER?>/index.php?canine=dog_reports&sum=canned_reports&catagory=asp"
					>ASP</a></li>
			</ul>
		</li>
		
		<!-- CCM - Training -->
		<li class='menu_ccm' style="width:8%">
			<a href="http://<?=CCM_SERVER?>/index.php">Training</a>
			<ul>
				<li><a target=_blank onClick="h(this);" href="http://cshare.ad.qintra.com/sites/CPDT/CCM%20Overview%20Documents/CCM%20Overview_V5_09182015.ppt">CCM Overview</a></li>
				<li><a target=_blank onClick="h(this);" href="http://cshare.ad.qintra.com/sites/CPDT/CCM%20Overview%20Documents/FE%20Tool%20Overview_01302015_V3.pptx">FE Overview</a></li>
				<li><a target=_blank onClick="h(this);" href="http://cshare.ad.qintra.com/sites/CPDT/CCM%20Training%20Documents/Forms/AllItems.aspx">Detail Training documents</a></li>
			</ul>
		</li>
		
		<!-- CCM - New P2P -->
		<li class='menu_ccm'>
			<a target=_blank href="http://<?=CCM_SERVER?>/new_project.php">New CCM Project</a>
		</li>
		
		<!-- Fiber - Dark Fiber -->
		<li class='menu_fiber'>
			<a href="http://<?=CCM_SERVER?>/index.php?canine=modules/darkfiber/dark_fiber&sum=dark_fiber_request_list">Dark Fiber Requests</a>
		</li>
		
		<!-- Fiber - CNDC -->
		<li class='menu_fiber'>
			<a href="http://<?=CCM_SERVER?>/index.php?canine=cndc/inquiry&sum=inquiry_list">CNDC ROM Tool</a>
		</li>
		
		<!-- Fiber - Leased Fiber -->
		<li class='menu_fiber'>
			<a href="http://<?=CCM_SERVER?>/index.php?canine=fiber/lease_renewal&sum=cable_entry">Lease Cable Check</a>
		</li>
		
		<!-- Module - inventory -->
		<li class='menu_module'>
			<a href="http://<?=CCM_SERVER?>/index.php?canine=inventory/upload&sum=main">CTL Inv Spreadsheet</a>
		</li>
		
		<!-- Module - Held Order -->
		<li class='menu_module'>
			<a href="http://<?=CCM_SERVER?>/index.php?canine=inventory/wip_upload&sum=main">National Held Orders</a>
		</li>
		
		<!-- Module - PPQT -->
		<li class='menu_module'>
			<a href="http://<?=CCM_SERVER?>/index.php?canine=cndc/route_checker/search_routes&sum=show_form">PPQT</a>
		</li>
		
		<!-- Module - PNUM Requests -->
		<li class='menu_module'>
			<a href="http://<?=CCM_SERVER?>/index.php?canine=pnum/pnum&sum=summary_pav_requests">PNUM/Address/VTA</a>
		</li>
		
		<!-- Module - Tie Cable -->
		<li class='menu_module'>
			<a href="http://<?=CCM_SERVER?>/index.php?canine=inventory/tie_cables&sum=assignments">Tie Cable Asgmt</a>
		</li>
		
		<!-- Module - Cable Segment -->
		<li class='menu_module'>
			<a href="http://<?=CCM_SERVER?>/index.php?canine=inventory/tie_cables&sum=cable_segments">Cable Segment Asgmt</a>
		</li>
		
		<!-- Module - PNUM Search -->
		<!--li class='menu_module'>
			<a href="http://<?=CCM_SERVER?>/index.php?canine=modules/pnum_vta/pnum_vta&sum=show_form">PNUM VTA Search</a>
		</li-->
		
		<!-- Logout -->
		<li id='menu_logout' class='menu_ccm menu_reloc menu_fcon menu_fe menu_fiber menu_module menu_optimization' >
			<a href="http://<?=CCM_SERVER?>/index.php?logout=LOGOUT">Logout</a>
		</li>
		
		<!-- Help -->
		<li id='menu_help' class='menu_ccm menu_reloc menu_fcon menu_fe menu_fiber menu_module menu_optimization' style="width:6%;" >
			<a target=_blank href="http://<?=CCM_SERVER?>/email_form.php">Help</a>
			<ul>
				<li><a target=_blank href="http://mysupportdesk.corp.intranet/">Support Desk</a></li>
				<li><a target=_blank href="http://<?=CCM_SERVER?>/email_form.php">Questions</a></li>
			</ul>
		</li>
		
	</ul>
		<script>
			var selected_menu_group='<?=$menu_group?>';
			
			function load_menu_group(group){
				//TODO: set cookie
				if(group.tagName=='SELECT'){
					var menu_group=group.value;
				}else{
					var menu_group=group;
				}
				$('#ccm_menu').children().each(function(ind,val){
					if($(val).hasClass(menu_group)){
						$(val).css('display','block');
					}else{
						$(val).css('display','none');
					}
				});
			}
			load_menu_group(selected_menu_group);
		</script>
	</div><? 
}

function search_fields($alpha){
	$html="";
	$advanced_search_pages=array('FCON/planning_est'
								, 'FCON/fcon_package'
								, 'FCON/summary_fcon'
								, 'dog/dog_package'
								, 'cdpt_summary'
								, 'summary_planner'
								, 'fe_tool/index');
	
	if(in_array($alpha->canine, $advanced_search_pages)){
		if(strstr($alpha->canine, 'FCON')){
			//{$alpha->canine} {$alpha->sum}
			$html.="<script>".advanced_search_dialog("index.php?canine=FCON/summary_fcon&sum=search", $alpha->adv_searchable, false)."</script>";
		}else if(strstr($alpha->canine, 'fe_tool')){
			$html.="<script>".advanced_search_dialog("index.php?canine=fe_tool/index&sum=search", $alpha->adv_searchable, false)."</script>";
		}else{
			$html.="<script>".advanced_search_dialog("index.php?canine=dog/dog_package&sum=search", $alpha->adv_searchable, true, 'Fields with an * must be exact matches. Others can be partial matches.')."</script>";
		}
		
		$div_width="505px";
		$select_width="style='width:150px'";
		$search_td1="<td></td>";
		$search_td2="<td><a href='javascript:advanced_search_dialog();'>Advanced</a></td>";
		$dialog_div="<div style='display:none;' id='advanced_search'></div>";
	}else{
		$div_width="450px";
		$select_width="";
		$search_td1="";
		$search_td2="";
		$dialog_div="";
	}
	
	$searchable = $alpha->searchable;
	if(isset($_COOKIE['plnr_sum_pref'])){
		$preferences=json_decode($_COOKIE['plnr_sum_pref']);
		$default_search=$preferences->default_search;
	}else{
		$default_search="";
	}
	$html.=" {$dialog_div}
	<div style='width:{$div_width}; height:55px'>
		<table style='width:100%; height:100%'>
			<tr>
				{$search_td1}
				<td style='font-size:12pt; font-weight:bold'>Search For:</td>
				<td style='font-size:12pt; font-weight:bold'>Search Field:</td>
				<td style='text-align:left'></td>
			</tr>
			<tr>
				{$search_td2}
				<td><input type=text id='search_item' onchange='enable_fox_search();' >
				</td>
				<td>
					<select id='search_field' {$select_width}>";
	foreach($searchable as $key => $data){
		if($data==$default_search){
			$selected="selected='selected'";
		}else{
			$selected="";
		}
		$html.="<option value='{$data}' {$selected}>{$key}</option>";
	}
	$html.="</select>
				</td>
				<td onmouseover='enable_fox_search();' >
					<input type='button'  id='search' value='search' onclick=\"fox_search('{$alpha->canine}','{$alpha->sum}')\" disabled='disabled'>
				</td>
			</tr>
		</table>
	</div>";
	return $html;
}
?>
