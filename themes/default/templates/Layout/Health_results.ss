<div class="main">
    <div class="row">
        <div class="large-9 medium-9 columns" id="content">

            <h2>Search results</h2>

            $HealthSearchForm

			<% if $PaginatedList %>
			<% include PaginationResult  Items=$PaginatedList %>
			<a href="{$Link(printlist)}?{$getUrlParameters}" target="_blank" title="Print"> Print <i class="fi-print"></i></a>
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
						<% loop $PaginatedList %>
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
				<% include Pagination Items=$PaginatedList %>
			<% else %>
				<p>No records found</p>
			<% end_if %>
			
       </div><!-- div id="content" -->

        <div class="large-3 medium-3 columns" id="sidebar">            
		
                <% include FamilyMemberSideBar %>            
				
        </div>

    </div>
</div>

