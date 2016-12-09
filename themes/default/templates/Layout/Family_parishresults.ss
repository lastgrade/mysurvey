<div class="main">
    <div class="row">
        <div class="large-9 medium-9 columns" id="content">

            <h2>Search results</h2>
            $ParishSearchForm       



            <% if $PaginatedList %>
			<% include PaginationResult  Items=$PaginatedList %>
			<a href="{$Link(print-by-parish)}?{$getUrlParameters}" target="_blank" title="Print"> Print <i class="fi-print"></i></a>
                <table>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Family</th>
                        <th>Contact Person</th>
                        <th>Contact No</th>
                        <th>Block/Unit/Family</th>
                        <th>House No</th>
						<th></th>
                    </tr>
                    </thead>
                    <tbody>
                <% loop $PaginatedList %>
                    <tr>
                        <td>$ID</td>
                        <td>$Name<br>{$Address}, $Pincode</td>
                        <td><% if $Contact %>$Contact.Name<% end_if %></td>
                        <td><% if $Contact %>$Contact.Mobile<% end_if %></td>
                        <td>{$BlockNo}/{$UnitNo}/{$FamilyNo}</td>
                        <td>$HouseNo</td>
						<td>
							<a href="$Link" data-reveal-id="myModal" data-reveal-ajax="true" title="View $Name"><i class="fi-page"></i></a>
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

