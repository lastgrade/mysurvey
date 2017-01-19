
    <% if $IncludeFormTag %>
        <form $AttributesHTML>
    <% end_if %>
        <fieldset>
            <% if $Legend %><legend>$Legend</legend><% end_if %>

            <div class="row">
                <% with $FieldMap %>
                    <div class="large-8 columns">
                        <div class="row">
                        <% with $HoldsLand %>
                            <div class="large-3 columns">
                                <label>Land Holder</label>
                                $Field 
                            </div>
                        <% end_with %>

                        <% with $Area %>
                            <div class="large-3 columns">
                                <label for="$ID">$Title</label> $Field
                            </div>
                        <% end_with %>

                        <% with $ParishID %>
                            <div class="large-6 columns ">
                                <label for="$ID">$Title</label> $Field
                            </div>
                        <% end_with %>
                        </div>
                    </div>
                <% end_with %>


                <% if $Actions %>
                    <div class="Actions">
                        <% loop $Actions %>
                            <div class="large-4 columns ">
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

