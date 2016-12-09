
			<% if $Results %>
			
				<table>
					<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Family</th>						
						<th>Gender / DOB / Age</th>
						<th>Education</th>		
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
								<% loop Educations %>
									$Course ($PrintStatus) <% if not Last %>,<% end_if %>
								<% end_loop %>								
							</td>
						</tr>
						<% end_loop %>
					</tbody>
				</table>

			<% else %>
				<p>No records found</p>
			<% end_if %>
			

