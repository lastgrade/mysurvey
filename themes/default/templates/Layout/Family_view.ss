<div class="row main">
    <div class="large-12 columns">
		<div class="panel">
		<% with Family %>		
        <h3>$Name</h3>
				<!--<a href="family/print-family/$ID" target="_blank" title="Print"> Print <i class="fi-print"></i></a>-->
				<a href="{$Link('edit-family')}?&BackURL=$Top.RequestedURL" title="Edit $Name"><i class="fi-page-edit"></i> Edit</a>
				|
				<a href="$Top.GoBackURL" title="Go back"><i class="fi-page-edit"></i> Go back</a>
	        <div class="row">			
	            <div class="large-6 columns">
					$Address, $Pincode (pin) <br>
					House no: $HouseNo <br>
					Panchayat: $InPanchayat <br>
					Municipality: $InMunicipality <br>
					Corporation: $InCorporation 
	
	            </div>
	            <div class="large-6 columns">
	            	Parish: $Parish.NameWithLocation <br>
					Block no: $BlockNo <br>
	                Unit no: $UnitNo <br>
					Family no: $FamilyNo				
              </div>
       	</div>
        </div>
		<hr>
		
        <div class="row">
            <div class="large-12 columns">
				
				<h4 class="subheader">Members</h4>
						<a href="members/add-member?FamilyID=$ID&BackURL=$Top.RequestedURL" title="Add member"><i class="fi-page-add"></i> Add member</a>
						<% if FamilyMembers %>
							<table>
							<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Gender</th>
								<th>DOB / Age</th>
								<th>Blood G / Status</th>
								<th>Relation</th>
								<th></th>
							</tr>
							</thead>
							<tbody>							
						<% loop FamilyMembers %>
							<tr>
								<td>$ID</td>
								<td>$Name</td>
								<td>{$Sex}</td>
								<td>{$DateOfBirth.Format('d-m-Y')} / {$Age} yrs</td>
								<td>$BloodGroup / $MStatus</td>
								<td>$Relation</td>	
								<td>
								<a href="{$Link('view')}?&BackURL=$Top.RequestedURL" title="View $Name"><i class="fi-page"></i></a>
								| 
								<a href="{$Link('edit-member')}?&BackURL=$Top.RequestedURL" title="Edit $Name"><i class="fi-page-edit"></i></a>
								|
								<a href="{$Link('delete-member')}?&BackURL=$Top.RequestedURL" title="Delete $Name" onclick="return confirm('Are you sure?');"><i class="fi-page-delete"></i></a>							
								</td>														
							</tr>						
						<% end_loop %>
							</tbody>						
							</table>
						<% end_if %>
				<hr>
						
				<h4 class="subheader">Housing</h4>
						<h5 class="subheader">House</h5>
						<% if not $House %>
							<a href="house/add-house?FamilyID=$ID&BackURL=$Top.RequestedURL"><i class="fi-page-add"></i> Add</a>
						<% else %>
						<% end_if %>				
						<% if $House %>						
				        <div class="row">
						    <div class="large-6 columns">
								House: $House.Status<br>								
								Ration-Card Holder: $House.RationCardHolder<br>
								HouseType: $House.Type
							</div>			
						    <div class="large-6 columns">								
								Card Type: $House.CardType.UpperCase<br>
								Build Year: $House.BuildYear
							</div>
						</div>
							<% with $House %>
								<a href="house/edit-house/$ID?BackURL=$Top.RequestedURL"><i class="fi-page-edit"></i> Edit</a>
							<% end_with %>						
						<% end_if %>
						
						<h5 class="subheader">Land</h5>
						<% if not $Land %>
							<a href="land/add-land?FamilyID=$ID&BackURL=$Top.RequestedURL"><i class="fi-page-add"></i> Add</a>
						<% end_if %>
						<% if $Land %>						
				        <div class="row">
						    <div class="large-4 columns">
								HoldsLand: $Land.LandHolder							
							</div>
						    <div class="large-4 columns">
								Area: $Land.Area							
							</div>										
						    <div class="large-4 columns">
								Total Land: $Land.InCent cents
							</div>
						</div>
							<% with $Land %>
								<a href="land/edit-land/$ID?BackURL=$Top.RequestedURL"><i class="fi-page-edit"></i> Edit</a>
							<% end_with %>					
						
						<% end_if %>
						
						<h5 class="subheader">Shifted Form</h5>
						<% if not $ShiftedFrom %>
							<a href="shifted-from/add-shifted-from?FamilyID=$ID&BackURL=$Top.RequestedURL"><i class="fi-page-add"></i> Add</a>
						<% end_if %>		
										
						<% if $ShiftedFrom %>												
				        <div class="row">
						    <div class="large-4 columns">
								Status : $ShiftedFrom.Shifted							
							</div>
						    <div class="large-4 columns">
								From Where: $ShiftedFrom.FromWhere							
							</div>										
						    <div class="large-4 columns">
								Reason: $ShiftedFrom.Reason
							</div>
						</div>
							<% with $ShiftedFrom %>
								<a href="shifted-from/edit-shifted-from/$ID?BackURL=$Top.RequestedURL"><i class="fi-page-edit"></i> Edit</a>
							<% end_with %>					
							
                        <% end_if %>
				<hr>
				<h4 class="subheader">Occupation</h4>

						<h4 class="subheader">Agriculture</h4>
						<% if not $Agriculture %>
							<a href="agriculture/add-agriculture?FamilyID=$ID&BackURL=$Top.RequestedURL"><i class="fi-page-add"></i> Add</a>
						<% end_if %>								
						
						<% if $Agriculture %>
				        <div class="row">
						    <div class="large-6 columns">
								Type: $Agriculture.Type							
							</div>
						    <div class="large-6 columns">
								others : $Agriculture.Other							
							</div>										
						</div>
							<% with $Agriculture %>
								<a href="agriculture/edit-agriculture/$ID?BackURL=$Top.RequestedURL"><i class="fi-page-edit"></i> Edit</a>
							<% end_with %>					
						
						<% end_if %>
						
						<h4 class="subheader">Business</h4>
						<% if not $Business %>
							<a href="business/add-business?FamilyID=$ID&BackURL=$Top.RequestedURL"><i class="fi-page-add"></i> Add</a>
						<% end_if %>											
						
						<% if $Business %>						
				        <div class="row">
						    <div class="large-6 columns">
								Type: $Business.Type							
							</div>
						    <div class="large-6 columns">
								others : $Business.Other							
							</div>										
						</div>
							<% with $Business %>
								<a href="business/edit-business/$ID?BackURL=$Top.RequestedURL"><i class="fi-page-edit"></i> Edit</a>
							<% end_with %>					
						
						<% end_if %>
				<hr>
				<h4 class="subheader">Monthly</h4>
				
						<h5 class="subheader">Monthly Income</h5>
						<% if not $MonthlyIncome %>
							<a href="monthlyincome/add-monthly-income?FamilyID=$ID&BackURL=$Top.RequestedURL"><i class="fi-page-add"></i> Add</a>
						<% end_if %>											
						
						<% if $MonthlyIncome %>
				        <div class="row">
						    <div class="large-6 columns">
								Land: $MonthlyIncome.Land							
							</div>
						    <div class="large-6 columns">
								Job : $MonthlyIncome.Job							
							</div>
						</div>	
						<div class="row">							
						    <div class="large-6 columns">
								Others : $MonthlyIncome.Others							
							</div>										
						    <div class="large-6 columns">
								Total : $MonthlyIncome.Total							
							</div>																	
						</div>
							<% with $MonthlyIncome %>
								<a href="monthlyincome/edit-monthly-income/$ID?BackURL=$Top.RequestedURL"><i class="fi-page-edit"></i> Edit</a>
							<% end_with %>					
						
						<% end_if %>
						
						<h5 class="subheader">Monthly Expense</h5>						
						<% if not $MonthlyExpense %>
							<a href="monthlyexpense/add-monthly-expense?FamilyID=$ID&BackURL=$Top.RequestedURL"><i class="fi-page-add"></i> Add</a>
						<% end_if %>											

						<% if $MonthlyExpense %>
				        <div class="row">
						    <div class="large-6 columns">
								Food: $MonthlyExpense.Food							
							</div>
						    <div class="large-6 columns">
								Education : $MonthlyExpense.Education							
							</div>
						</div>	
						<div class="row">							
						    <div class="large-6 columns">
								Medical : $MonthlyExpense.Medical							
							</div>										
						    <div class="large-6 columns">
								Mobile : $MonthlyExpense.Mobile							
							</div>																	
						</div>
						<div class="row">							
						    <div class="large-6 columns">
								Others : $MonthlyExpense.Others							
							</div>										
						    <div class="large-6 columns">
								Total : $MonthlyExpense.Total							
							</div>																	
						</div>
							<% with $MonthlyExpense %>
								<a href="monthlyexpense/edit-monthly-expense/$ID?BackURL=$Top.RequestedURL"><i class="fi-page-edit"></i> Edit</a>
							<% end_with %>					
						
						<% end_if %>
						
				<hr>		
				<h4 class="subheader">Other Details</h4>
						<h5 class="subheader">Vehicle</h5>
						<% if not $Vehicle %><a href="#"><i class="fi-page-add"></i>Add</a><% end_if %>				
						<% if $Vehicle %>
				        <div class="row">
						    <div class="large-4 columns">
								Has Cycle : $Vehicle.HasCycle							
							</div>
						    <div class="large-4 columns">
								Has Bike : $Vehicle.HasBike							
							</div>										
						    <div class="large-4 columns">
								Has Autoriskaw : $Vehicle.HasAutoriskaw							
							</div>
						</div>	
				        <div class="row">
						    <div class="large-4 columns">
								Has LightVehicle : $Vehicle.HasLightVehicle
							</div>
						    <div class="large-4 columns">
								Has HeavyCommercial : $Vehicle.HasHeavyCommercial						
							</div>										
						    <div class="large-4 columns">
								Has CountryBoat : $Vehicle.HasCountryBoat							
							</div>
						</div>	
				        <div class="row">
						    <div class="large-4 columns">
								Has Vallam : $Vehicle.HasVallam
							</div>
						    <div class="large-4 columns">
								Has FishingBoat : $Vehicle.HasFishingBoat					
							</div>										
						    <div class="large-4 columns">
								Has TouristBoat : $Vehicle.HasTouristBoat		
							</div>
						</div>	          
						<% end_if %>

						<h5 class="subheader">Appliance</h5>
						<% if not $Appliance %><a href="#"><i class="fi-page-add"></i>Add</a><% end_if %>						
						<% if $Appliance %>
				        <div class="row">
						    <div class="large-4 columns">
								Has Computer : $Appliance.HasOrNot('Computer')							
							</div>
						    <div class="large-4 columns">
								Has WashingMachine : $Appliance.HasOrNot('WashingMachine')							
							</div>										
						    <div class="large-4 columns">
								Has AirConditioner : $Appliance.HasOrNot('AirConditioner')							
							</div>
						</div>	
				        <div class="row">
						    <div class="large-4 columns">
								Has MicrowaveOven : $Appliance.HasOrNot('MicrowaveOven')		
							</div>
						    <div class="large-4 columns">
								Has CookingGas : $Appliance.HasOrNot('CookingGas')		
							</div>										
						    <div class="large-4 columns">
								Has Fridge : $Appliance.HasOrNot('Fridge')		
							</div>
						</div>
				        <div class="row">
						    <div class="large-4 columns">
								Has Other items: $Appliance.HasOrNot('Others')		
							</div>
						    <div class="large-8 columns last">
								Specify (if has other items) : $Appliance.Specify
							</div>										
						</div>	
						<% end_if %>
						
						<h5 class="subheader">Other Facility</h5>
						<% if not $OtherFacility %><a href="#"><i class="fi-page-add"></i>Add</a><% end_if %>						
						<% if $OtherFacility %>
				        <div class="row">
						    <div class="large-4 columns">
								Has WaterWell : $OtherFacility.HasOrNot('WaterWell')							
							</div>
						    <div class="large-4 columns">
								Has DrillWell : $OtherFacility.HasOrNot('DrillWell')							
							</div>										
						    <div class="large-4 columns">
								Has WaterConnection : $OtherFacility.HasOrNot('WaterConnection')							
							</div>
						</div>	
				        <div class="row">
						    <div class="large-4 columns">
								Has RainwaterStorage : $OtherFacility.HasOrNot('RainwaterStorage')		
							</div>
						    <div class="large-4 columns">
								Has Biogas : $OtherFacility.HasOrNot('Biogas')		
							</div>										
						    <div class="large-4 columns">
								Has Electricity : $OtherFacility.HasOrNot('Electricity')		
							</div>
						</div>
				        <div class="row">
						    <div class="large-4 columns">
								Has SolarEnergy: $OtherFacility.HasOrNot('SolarEnergy')		
							</div>
						    <div class="large-8 columns last">
								Has VegetableGarden: $OtherFacility.HasOrNot('VegetableGarden')		
							</div>										
						</div>	
						<% end_if %>
						
						<h5 class="subheader">Media</h5>
						<% if not $Media %><a href="#"><i class="fi-page-add"></i>Add</a><% end_if %>						
						<% if $Media %>
				        <div class="row">
						    <div class="large-6 columns">
								Has Newspaper : $Media.HasNewspaper()							
							</div>
						    <div class="large-6 columns">
								<% if $Media.Newspaper %> $Media.NewspaperCount papers, $Media.NewspaperNames <% end_if %>							
							</div>										
						</div>	
				        <div class="row">
						    <div class="large-6 columns">
								Has Magazine : $Media.HasOrNot('Magazine')							
							</div>
						    <div class="large-6 columns">
								Has Kids Magazine : $Media.HasOrNot('KidsMagazine')	
							</div>										
						</div>							
				        <div class="row">
						    <div class="large-6 columns">
								Has Television : $Media.HasOrNot('Television')							
							</div>
						    <div class="large-6 columns">
								Has Internet : $Media.HasOrNot('Internet')	
							</div>										
						</div>
				        <div class="row">
						    <div class="large-6 columns">
								Has Mobile : $Media.HasOrNot('Mobile')							
							</div>
						    <div class="large-6 columns">
								<% if $Media.Mobile %> $Media.MobileCount mobile <% end_if %>
							</div>										
						</div>												
						<% end_if %>
						
						<h5 class="subheader">Catholic Magazine </h5>
						<% if not $CatholicMagazine %><a href="#"><i class="fi-page-add"></i>Add</a><% end_if %>						
						<% if $CatholicMagazine %>
				        <div class="row">
						    <div class="large-4 columns">
								Has Jeevadeepthi : $CatholicMagazine.HasOrNot('Jeevadeepthi')							
							</div>
						    <div class="large-4 columns">
								Has Jeevanaadam : $CatholicMagazine.HasOrNot('Jeevanaadam')							
							</div>										
						    <div class="large-4 columns">
								Has Christain : $CatholicMagazine.HasOrNot('Christain')							
							</div>
						</div>	
				        <div class="row">
						    <div class="large-4 columns">
								Has Preshitha Keralam : $CatholicMagazine.HasOrNot('PreshithaKeralam')		
							</div>
						    <div class="large-4 columns">
								Has Shalom : $CatholicMagazine.HasOrNot('Shalom')		
							</div>										
						    <div class="large-4 columns">
								Has Cherupushpam : $CatholicMagazine.HasOrNot('Cherupushpam')		
							</div>
						</div>
				        <div class="row">
						    <div class="large-4 columns">
								Others : $CatholicMagazine.HasOrNot('Others')		
							</div>
						    <div class="large-8 columns last">
								Specify (if other items) : $CatholicMagazine.Specify
							</div>										
						</div>	
						<% end_if %>

				<hr>
				<h4 class="subheader">Financial</h4>
						<h5 class="subheader">Loan</h5>
						<% if not $Loan %><a href="#"><i class="fi-page-add"></i>Add</a><% end_if %>				
						<% if $Loan %>
				        <div class="row">
						    <div class="large-6 columns">
								Has Loan : $Loan.OnLoan()							
							</div>
						    <div class="large-6 columns">
								<% if $Loan.HasLoan %> Amount: $Loan.Amount <% end_if %>							
							</div>										
						</div>	
				        <div class="row">
						    <div class="large-6 columns">
								<% if $Loan.HasLoan %> From: $Loan.FromWhere <% end_if %>
							</div>
						    <div class="large-6 columns">
								<% if $Loan.HasLoan %> Reason: $Loan.Reason <% end_if %>
							</div>										
						</div>							
						<% end_if %>
						
						<h5 class="subheader">Savings</h5>
						<% if not $Saving %><a href="#"><i class="fi-page-add"></i>Add</a><% end_if %>
						<% if $Saving %>
				        <div class="row">
						    <div class="large-4 columns">
								Has EducationFund : $Saving.HasOrNot('EducationFund')							
							</div>
						    <div class="large-4 columns">
								Has LifeInsurance : $Saving.HasOrNot('LifeInsurance')							
							</div>										
						    <div class="large-4 columns">
								Has HealthInsurance : $Saving.HasOrNot('HealthInsurance')							
							</div>
						</div>	
				        <div class="row">
						    <div class="large-4 columns">
								Has DeathFund : $Saving.HasOrNot('DeathFund')		
							</div>
						    <div class="large-4 columns">
								Has MarriageFund : $Saving.HasOrNot('MarriageFund')		
							</div>										
						    <div class="large-4 columns">
								Has Mythri : $Saving.HasOrNot('Mythri')		
							</div>
						</div>
				        <div class="row">
						    <div class="large-4 columns">
								Has Chitty : $Saving.HasOrNot('Chitty')		
							</div>							
						    <div class="large-4 columns">
								Others : $Saving.HasOrNot('Others')		
							</div>
						    <div class="large-4 columns last">
								Specify (if others) : $Saving.Specify
							</div>										
						</div>	
						<% end_if %>
						
						<hr>
						
						<h4 class="subheader">Contact</h4>
						<% if not $Contact %><a href="#"><i class="fi-page-add"></i>Add</a><% end_if %>				
						<% if $Contact %>						
				        <div class="row">
						    <div class="large-4 columns">
								Name : $Contact.Name
							</div>
						    <div class="large-4 columns">
								Email : $Contact.Email
							</div>										
						    <div class="large-4 columns">
								Mobile : $Contact.Mobile
							</div>
						</div>
						<% end_if %>
					
                </div>
			</div>	
		</div>
		<% end_with %>
		
    </div>
</div>
<a class="close-reveal-modal" aria-label="Close">&#215;</a>

