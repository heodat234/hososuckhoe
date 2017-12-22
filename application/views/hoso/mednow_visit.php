<div data-ng-view="" class="mednow-appointment-route-content">
	<div id="mednow">
		<a class="back btn btn-link hidden-md hidden-lg" ng-class="{'hidden-md':loggedIn, 'hidden-lg':loggedIn }" data-ng-href="" analytics-on="" analytics-category="Link" analytics-label="/mednow" analytics-value=" Back">
		<i class="fa fa-angle-left"></i> Back</a>
		<div class="page-header">
			<h1 class="page-title">thanh hung's MedNow appointment</h1>
		</div>
		<i class="icon-mednow fa-2x"></i>
		<h2 class="aliments-header">On demand care with a doctor 24/7 for:</h2>

		<div class="aliments">
			<span>Allergies</span> 
			<span>Back pain</span> 
			<span>Bites and stings</span> 
			<span>Cough, cold and flu</span> 
			<span>Diarrhea</span> 
			<span>Ear ache/pain*</span> 
			<span>Fever*</span> 
			<span>Headache</span> 
			<span>Heart burn</span> 
			<span>Nausea/vomiting</span> 
			<span>Low back pain*</span> 
			<span>Pink eye</span> 
			<span>Rash/hives</span> 
			<span>Sinus problems</span> 
			<span>Smoking cessation*</span> 
			<span>Sprains and strains*</span> 
			<span>Urinary symptoms</span>
		</div>
		<p class="aliments-asterisk">* not available for eVisit</p><h2 class="section-title">Start a MedNow Visit today</h2>
		<div>
			<div class="media action-item">
				<div class="media-left">
					<span class="fa-stack fa-2x pull-left" aria-hidden="true"><i class="fa fa-mobile fa-stack-2x"></i> <i class="fa fa-user fa-stack-1x fa-mobile-stack"></i></span>
				</div>
				<div class="media-body"><h3 class="media-heading">VIDEO VISIT</h3><span class="action-item-details">Real-time access to a primary care provider for on-demand care</span>
					<div class="action-buttons">
						<button class="btn btn-primary hidden-xs hidden-sm" ng-click="NavigationService.goToScheduleVideoVisit()">Click to Schedule</button> 
						<a class="btn btn-default hidden-xs hidden-sm" href="tel:8443227374" analytics-on="" analytics-event="tel:8443227374" analytics-category="Link" analytics-label="/mednow" analytics-value=" 844.322.7374"><i class="fa fa-phone"></i> 844.322.7374</a>
					</div>
				</div>
			</div>
			<button class="btn btn-primary btn-block visible-xs visible-sm" ng-click="NavigationService.goToScheduleVideoVisit()">Click to Schedule</button> 
			<a class="btn btn-default btn-block visible-xs visible-sm" href="tel:8443227374" analytics-on="" analytics-event="tel:8443227374" analytics-category="Link" analytics-label="/mednow" analytics-value=" 844.322.7374"><i class="fa fa-phone"></i> 844.322.7374</a>
		</div><!---->
		<footer><hr><p>The cost of a MedNow virtual visit depends on the insurance plan and type of visit. Patients may pay anywhere between $0 and $45 for a primary care video visit or eVisit, depending on their health plan coverage. For more information, please review our <a href="#/about/faq#videovisits" analytics-on="" analytics-event="#/about/faq#videovisits" analytics-category="Link" analytics-label="/mednow" analytics-value="FAQ">FAQ</a>.</p></footer>
	</div>
</div>