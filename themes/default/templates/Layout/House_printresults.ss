
			<% if $Results %>
				<table>
					<thead>
					<tr>
						<th>#</th>
						<th>Family</th>
						<th>Contact Person</th>						
						<th>Block/Unit/Family</th>
						<th>House</th>
						<th>Ration Card</th>
						<th>House Type</th>
					</tr>
					</thead>
					<tbody>
						<% loop $Results %>
						<tr>
							<td>$ID</td>
							<td>$Name<br>{$Address}, $Pincode</td>
							<td>
								<% if $Contact %>$Contact.Name<% end_if %>
								<% if $Contact %><br>$Contact.Mobile<% end_if %>								
							</td>							
							<td>{$BlockNo}/{$UnitNo}/{$FamilyNo}</td>							
							<td><% if $House %>$House.Status<% end_if %></td>
							<td>
								<% if $House %>
								$House.RationCardHolder <% if $House.HoldsRationCard %>, $House.CardType.UpperCase<% end_if %>
								<% end_if %>								
							</td>
							<td>
								<% if $House %>
									$House.Type 
								<% end_if %>								
							</td>							
						</tr>
						<% end_loop %>
					</tbody>
				</table>

			<% else %>
				<p>No records found</p>
			<% end_if %>
			
