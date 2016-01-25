<div class="main">
    <div class="row">
        <div class="large-9 medium-9 columns" id="content">
				<h2>Search results</h2>
				$LocationSearchForm
				
                <% if $PaginatedList %>
					<a href="{$Link(print-by-location)}?{$getUrlParameters}" target="_blank" title="Print"> Print <i class="fi-print"></i></a>
                    <table>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Family</th>
                            <th>Contact Person</th>
                            <th>Contact No</th>
                            <th>Panchayat/Municipality/Corporation</th>
                            <th>House No</th>
                            </th>
                        </thead>
                        <tbody>
                            <% loop $PaginatedList %>
                            <tr>
                                <td>$ID</td>
                                <td>$Name<br>{$Address}, $Pincode</td>
                                <td><% if $Contact %>$Contact.Name<% end_if %></td>
                                <td><% if $Contact %>$Contact.Mobile<% end_if %></td>
                                <td>{$InPanchayat}/{$InMunicipality}/{$InCorporation}</td>
                                <td>$HouseNo</td>
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

