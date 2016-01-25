<div class="main">
    <div class="row">
        <div class="large-9 medium-9 columns" id="content">
            <%--<div id="content">--%>
                <ul class="tabs" data-tab>
                    <li class="tab-title active"><a href="#family">Family</a></li>
                    <li class="tab-title"><a href="#housing">Housing</a></li>
                    <li class="tab-title"><a href="#occupation">Occupation</a></li>
                    <li class="tab-title"><a href="#monthly">Monthly</a></li>
                    <li class="tab-title"><a href="#others">Other Details</a></li>
                    <li class="tab-title"><a href="#financial">Financial</a></li>
                </ul>
                <div class="tabs-content">
                    <div class="content active" id="family">
                        <div class="row">
                            <div class="large-12 columns">
                                <h5>Search</h5>
								
								$ParishSearchForm	
								
								$LocationSearchForm								


                            </div>
                        </div>
                    </div>
                    <div class="content" id="housing">
                        <div class="row">
                            <div class="large-12 columns end">
                                $HouseSearchForm
                                $LandSearchForm
                                $ShiftedFromSearchForm
                            </div>
                        </div>
                    </div>
                    <div class="content active" id="occupation">
                        <div class="row">
                            <div class="large-12 columns end">
                                $AgricultureSearchForm
								$BusinessSearchForm
                            </div>
                        </div>
						
                    </div>
                    <div class="content active" id="monthly">
                    </div>
                    <div class="content active" id="others">
                    </div>
                    <div class="content active" id="financial">
                    </div>

                </div>

            <%--</div>--%>
        </div><!-- div id="content" -->
        <div class="large-3 medium-3 columns" id="sidebar">
            <%--<div id="sidebar">--%>
            <% include FamilySideBar %>
            <%--</div>--%>
        </div>

    </div>
</div>

