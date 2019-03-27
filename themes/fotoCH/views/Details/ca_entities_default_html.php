<?php
$t_item = $this->getVar("item");
$va_comments = $this->getVar("comments");
$vn_comments_enabled =  $this->getVar("commentsEnabled");
$vn_share_enabled =     $this->getVar("shareEnabled");
?>
<div class="row">
  <div class='col-xs-12 navTop'><!--- only shown at small screen size -->
    {{{previousLink}}}{{{resultsLink}}}{{{nextLink}}}
  </div><!-- end detailTop -->
  <div class='navLeftRight col-xs-1 col-sm-1 col-md-1 col-lg-1'>
    <div class="detailNavBgLeft">
      {{{previousLink}}}{{{resultsLink}}}
    </div><!-- end detailNavBgLeft -->
  </div><!-- end col -->
  <div class='col-xs-12 col-sm-10 col-md-10 col-lg-10'>
    <div class="container">
      <div class="row">
        <div class='col-md-12 col-lg-12'>
          <div class="bottom-spaced-lg">
            <H6>{{{^ca_entities.type_id}}}{{{<ifdef code="ca_entities.idno">, ^ca_entities.idno</ifdef>}}}</H6>
            <H4>{{{^ca_entities.preferred_labels.displayname}}}</H4>
            <H6>{{{<ifdef code="ca_entities.lifespan">^ca_entities.lifespan</ifdef>}}}</H6>
          </div>
          <H6><?php print $t_item->getDisplayLabel("ca_entities.heimatort") ?></H6>
          <span>{{{<ifdef code="ca_entities.heimatort">^ca_entities.heimatort</ifdef>}}}</span>
          <h6><?php print $t_item->getDisplayLabel("ca_entities.genre_list") ?></h6>
          <?php
          if($vs_bildgattung = $t_item->get("ca_entities.genre_list" , array('convertCodesToDisplayText' => true))){
            print "<div class='unit'>{$vs_bildgattung}</div><!-- end unit -->";
          }
          ?>
          {{{<ifdef code="ca_entities.address">
            <H6><?php print $t_item->getDisplayLabel("ca_entities.address") ?></H6>
            <div class="row">
              <ifdef code="ca_entities.address.address1"><div class='col-md-12 col-lg-12'>^ca_entities.address.address1</div></ifdef>
              <ifdef code="ca_entities.address.address2"><div class='col-md-12 col-lg-12'>^ca_entities.address.address2</div></ifdef>

              <ifdef code="ca_entities.address.postalcode|ca_entities.address.city">
                <div class='col-md-12 col-lg-12'>
                  <span>^ca_entities.address.postalcode </span>
                  <span>^ca_entities.address.city</span>
                </div>
              </ifdef>

              <ifdef code="ca_entities.address.stateprovince|ca_entities.address.country">
                <div class='col-md-12 col-lg-12'>
                  <span>^ca_entities.address.stateprovince</span>
                  <span>^ca_entities.address.country</span>
                </div>
              </ifdef>
            </div>
          </ifdef>}}}

          <H6>GND</H6>
          <span>{{{<ifdef code="ca_entities.alternate_idnos">^ca_entities.alternate_idnos</ifdef>}}}</span>

        </div><!-- end col -->
      </div><!-- end row -->
      <div class="row">

        <div class='col-sm-12 col-md-12 col-lg-12'>

          {{{<ifdef code="ca_entities.werdegang">
          <div class='unit'>
            <div>
              <H6 data-toggle="collapse" data-target="#werdegang">
                <i class="fa fa-angle-down padded-right-sm"></i>
                <?php print $t_item->getDisplayLabel("ca_entities.werdegang") ?>
              </H6>
              <hr/>
            </div>
            <p id="werdegang" class="collapse">^ca_entities.werdegang</p>
          </div>
          </ifdef>}}}

          {{{<ifdef code="ca_entities.working_description">
          <div class='unit'>
            <div>
              <H6 data-toggle="collapse" data-target="#working_bio">
                <i class="fa fa-angle-down padded-right-sm"></i>
                <?php print $t_item->getDisplayLabel("ca_entities.working_description") ?>
              </H6>
              <hr/>
            </div>
            <p id="working_bio" class="collapse">^ca_entities.working_description</p>
          </div>
          </ifdef>}}}

          {{{<ifcount code="ca_collections" min="1" max="1"><H6>Related collection</H6></ifcount>}}}
          {{{<ifcount code="ca_collections" min="2">
            <div>
              <H6 data-toggle="collapse" data-target="#related-collections">
                <i class="fa fa-angle-down padded-right-sm"></i>
                Related collections
              </H6>
              <hr/>
            </div>
          </ifcount>}}}
          <div id="related-collections" class="collapse">
            {{{<unit relativeTo="ca_entities_x_collections" delimiter="<br/>"><unit relativeTo="ca_collections"><l>^ca_collections.preferred_labels.name</l> (^relationship_typename)</unit></unit>}}}
          </div>


          {{{<ifcount code="ca_entities.related" min="1" max="1">
            <div>
              <H6 data-toggle="collapse" data-target="#related-people">
                <i class="fa fa-angle-down padded-right-sm"></i>
                Related person
              </H6>
              <hr/>
            </div>
          </ifcount>}}}
          {{{<ifcount code="ca_entities.related" min="2">
            <div>
              <H6 data-toggle="collapse" data-target="#related-people">
                <i class="fa fa-angle-down padded-right-sm"></i>
                Related people
              </H6>
              <hr/>
            </div>
          </ifcount>}}}

          <div id="related-people" class="collapse">
            {{{<unit relativeTo="ca_entities_x_entities" delimiter="<br/>"><unit relativeTo="ca_entities" delimiter="<br/>"><l>^ca_entities.related.preferred_labels.displayname</l></unit> (^relationship_typename)</unit>}}}
          </div>

          {{{<ifcount code="ca_occurrences" min="1" max="1"><H6>Related occurrence</H6></ifcount>}}}
          {{{<ifcount code="ca_occurrences" min="2">
            <div>
              <H6 data-toggle="collapse" data-target="#related-occurrence">
                <i class="fa fa-angle-down padded-right-sm"></i>
                Related occurrences
              </H6>
              <hr/>
            </div>
          </ifcount>}}}

          <div id="related-occurrence" class="collapse">
            {{{<unit relativeTo="ca_entities_x_occurrences" delimiter="<br/>"><unit relativeTo="ca_occurrences" delimiter="<br/>"><l>^ca_occurrences.preferred_labels.name</l></unit> (^relationship_typename)</unit>}}}
          </div>

          {{{<ifcount code="ca_places" min="1" max="1">
            <div>
              <H6 data-toggle="collapse" data-target="#related-place">
                <i class="fa fa-angle-down padded-right-sm"></i>
                Related place
              </H6>
              <hr/>
            </div>
          </ifcount>}}}
          {{{<ifcount code="ca_places" min="2"><H6>Related places</H6></ifcount>}}}

          <div id="related-place" class="collapse">
            {{{<unit relativeTo="ca_entities_x_places" delimiter="<br/>"><unit relativeTo="ca_places" delimiter="<br/>"><l>^ca_places.preferred_labels.name</l></unit> (^relationship_typename)</unit>}}}
          </div>
        </div><!-- end col -->
      </div><!-- end row -->

      {{{<ifcount code="ca_objects" min="2">
        <div class="row">
          <div id="browseResultsContainer">
            <?php print caBusyIndicatorIcon($this->request).' '.addslashes(_t('Loading...')); ?>
          </div><!-- end browseResultsContainer -->
        </div><!-- end row -->
        <script type="text/javascript">
         jQuery(document).ready(function() {
           jQuery("#browseResultsContainer").load("<?php print caNavUrl($this->request, '', 'Search', 'objects', array('search' => 'entity_id:^ca_entities.entity_id'), array('dontURLEncodeParameters' => true)); ?>", function() {
             jQuery('#browseResultsContainer').jscroll({
               autoTrigger: true,
               loadingHtml: '<?php print caBusyIndicatorIcon($this->request).' '.addslashes(_t('Loading...')); ?>',
               padding: 20,
               nextSelector: 'a.jscroll-next'
             });
           });


         });
        </script>
      </ifcount>}}}
    </div><!-- end container -->
  </div><!-- end col -->
  <div class='navLeftRight col-xs-1 col-sm-1 col-md-1 col-lg-1'>
    <div class="detailNavBgRight">
      {{{nextLink}}}
    </div><!-- end detailNavBgLeft -->
  </div><!-- end col -->
</div><!-- end row -->
<script type='text/javascript'>
 jQuery(document).ready(function() {
   $('.trimText').readmore({
     speed: 75,
     maxHeight: 120
   });
 });
</script>
