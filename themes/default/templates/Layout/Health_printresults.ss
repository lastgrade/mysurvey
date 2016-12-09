
			<% if $Results %>
			
				<table>
					<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Family</th>						
						<th>Gender / DOB / Age</th>
						<th>Health</th>		
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
								<% if $Health %>$Health.Diseases<% end_if %>								
							</td>
						</tr>
						<% end_loop %>
					</tbody>
				</table>
				
			<% else %>
				<p>No records found</p>
			<% end_if %>
			
