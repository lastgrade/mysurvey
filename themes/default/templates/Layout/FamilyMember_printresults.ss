
			<% if $Results %>

				<table>
					<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Family</th>						
						<th>Gender / DOB / Age</th>
						<th>Blood Group / Martial Status</th>		
					</tr>
					</thead>
					<tbody>
						<% loop $Results %>
						<tr>
							<td>$ID</td>
							<td>$Name<br></td>
							<td><% if $Family %>$Family.Name<% end_if %></td>							
							<td>{$Sex} / {$DateOfBirth.Format('d-m-Y')} / {$Age} yrs</td>							
							<td>
								$BloodGroup / $MStatus
							</td>
						</tr>
						<% end_loop %>
					</tbody>
				</table>
				
			<% else %>
				<p>No records found</p>
			<% end_if %>
			


