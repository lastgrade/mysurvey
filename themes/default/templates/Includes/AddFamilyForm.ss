                <% if $IncludeFormTag %>
                <form $AttributesHTML>
                <% end_if %>
                <% if $Message %>
                    <p id="{$FormName}_error" class="message $MessageType">$Message</p>
                <% else %>
                    <p id="{$FormName}_error" class="message $MessageType" style="display: none"></p>
                <% end_if %>

                <fieldset>
                    <% if $Legend %><legend>$Legend</legend><% end_if %>

                    <div class="row">
                            <% with $FieldMap %>
								<div class="row">
									<div class="large-4 columns">                                                                    
                                    <% with $Name %>
                                        <label for="$ID">$Title</label>$Field
                                    <% end_with %>
									</div>
									<div class="large-4 columns"> 																																		
										<% with $Address %>
												<label for="$ID">$Title</label> $Field		
										<% end_with %>
									</div>
									<div class="large-4 columns"> 																																		
										<% with $Pincode %>
												<label for="$ID">$Title</label> $Field		
										<% end_with %>
									</div>									
                                </div>
								<div class="row">
									<div class="large-4 columns">                                                                    
                                    <% with $HouseNo %>
                                        <label for="$ID">$Title</label>$Field
                                    <% end_with %>
									</div>
									<div class="large-8 columns">
									<label>Check them to select</label>
                                    <% with $IsPanchayat %>
                                        $Field<label for="$ID">$Title</label>
                                    <% end_with %>
                                    <% with $IsMunicipality %>
                                        $Field<label for="$ID">$Title</label>
                                    <% end_with %>
                                    <% with $IsCorporation %>
                                        $Field<label for="$ID">$Title</label>
                                    <% end_with %>									
									</div>								
								</div>
								<div class="row">
									<div class="large-8 columns">
										<div class="row">
											<div class="large-4 columns">                                                                    											
											<% with $BlockNo %>
												<label for="$ID">$Title</label>$Field
											<% end_with %>
											</div>
											<div class="large-4 columns">                                                                    											
											<% with $UnitNo %>
												<label for="$ID">$Title</label>$Field
											<% end_with %>
											</div>
											<div class="large-4 columns">                                                                    											
											<% with $FamilyNo %>
												<label for="$ID">$Title</label>$Field
											<% end_with %>
											</div>
											
										</div>	
									</div>
									<div class="large-4 columns">
                                    <% with $ParishID %>
                                        <label for="$ID">$Title</label>$Field
                                    <% end_with %>										
									</div>										
								</div>								
                            <% end_with %>		<%-- with $FieldMap --%>						
						

					$Fields.fieldByName('SecurityID')					
					
                    <% if $Actions %>
                        <div class="Actions">
                            <% loop $Actions %>
                                <div class="large-3 columns">
									$addExtraClass('button')
                                </div>
                            <% end_loop %>
                        </div>
                    <% end_if %>
                    </div>
                    </fieldset>
                <% if $IncludeFormTag %>
                </form>
                <% end_if %>