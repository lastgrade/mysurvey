<div class="main">
    <div class="row">
        <div class="large-9 medium-9 columns" id="content">

            <h2>Search results</h2>

            $HouseSearchForm

			<% if $PaginatedList %>
			<a href="{$Link(printlist)}?{$getUrlParameters}" target="_blank" title="Print"> Print <i class="fi-print"></i></a>
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
						</th>
					</thead>
					<tbody>
						<% loop $PaginatedList %>
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
				<% include Pagination Items=$PaginatedList %>
			<% else %>
				<p>No records found</p>
			<% end_if %>
			
       </div><!-- div id="content" -->

        <div class="large-3 medium-3 columns" id="sidebar">            
		
                <% include FamilySideBar %>            
				
        </div>

    </div>
</div>

