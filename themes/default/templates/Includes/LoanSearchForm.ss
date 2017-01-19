                    <% if $IncludeFormTag %>
                    <form $AttributesHTML>
                    <% end_if %>
                    <fieldset>
                        <% if $Legend %><legend>$Legend</legend><% end_if %>
							
							
                        <div class="row">
							<div class="large-9 columns">
								
                            <% with $FieldMap %>
								<div class="row">
									<div class="large-6 columns">                                                                    
                                    <% with $HasLoan %>
                                        <label for="$ID">$Title</label>$Field
                                    <% end_with %>
									</div>
									<div class="large-6 columns"> 																																		
										<% with $ParishID %>
												<label for="$ID">$Title</label> $Field		
										<% end_with %>
									</div>								
                                </div>
								
                            <% end_with %>
							</div>
							
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
