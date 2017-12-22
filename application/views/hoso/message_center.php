<div data-ng-view="" class="messages-route-content">
	<div id="message-list">
		<a class="back btn btn-link hidden-md hidden-lg" ng-class="{'hidden-md':loggedIn, 'hidden-lg':loggedIn }" data-ng-href="" analytics-on="" analytics-category="Link" analytics-label="/message-center" analytics-value=" Back"><i class="fa fa-angle-left"></i> Back</a><!---->
		<div data-ng-include="'app/messages/views/templates/messages-header.tpl.html'">
			<header>
				<div class="page-header clearfix">
					<div id="folder-selection" if-feature-enabled="messagesEnhancement">
						<div class="btn-group appointment-visit-toggle-btn-group hidden-lg hidden-md hidden-sm">
							<a href="#/message-center/inbox" class="btn btn-default active" data-ng-class="{active: isActive('inbox')}" analytics-on="" analytics-event="#/message-center/inbox" analytics-category="Link" analytics-label="/message-center" analytics-value="Inbox">Inbox</a> 
							<a href="#/message-center/outbox" class="btn btn-default" data-ng-class="{active: isActive('outbox')}" analytics-on="" analytics-event="#/message-center/outbox" analytics-category="Link" analytics-label="/message-center" analytics-value="Sent">Sent</a> 
							<a data-ng-click="backToOMC()" class="btn btn-default ng-hide" ng-show="currentUser.isMember" analytics-on="" analytics-category="Link" analytics-label="/message-center" analytics-value="Priority Health Mailbox">Priority Health Mailbox</a>
						</div>
						<div class="btn-group appointment-visit-toggle-btn-group hidden-xs">
							<a href="#/message-center/inbox" class="btn btn-default active" data-ng-class="{active: isActive('inbox')}" analytics-on="" analytics-event="#/message-center/inbox" analytics-category="Link" analytics-label="/message-center" analytics-value="Message Inbox">Message Inbox</a> 
							<a href="#/message-center/outbox" class="btn btn-default" data-ng-class="{active: isActive('outbox')}" analytics-on="" analytics-event="#/message-center/outbox" analytics-category="Link" analytics-label="/message-center" analytics-value="Sent Messages">Sent Messages</a> 
							<a data-ng-click="backToOMC()" class="btn btn-default ng-hide" ng-show="currentUser.isMember" analytics-on="" analytics-category="Link" analytics-label="/message-center" analytics-value="Priority Health Mailbox">Priority Health Mailbox</a>
						</div>
					</div>
					<h1 id="userName"><span data-ng-show="currentUser.fullName" class="">Thanh Hung's</span> Messages</h1>
				</div>
				<p class="text-muted" data-ng-hide="(currentUser.isMember &amp;&amp; !currentUser.isPatient)">Communicate with Spectrum Health and Priority Health like never before. Send and receive secure messages from MyHealth. To maintain a complete record of your care for your clinical team, all of the secure messages you send through MyHealth are stored in your electronic record.</p>
			</header>
			<div class="header" data-ng-show="!showDeleteConfirmation">
				<a data-ng-href="#/message-center/compose" class="btn btn-primary" analytics-on="" analytics-category="Link" analytics-label="/message-center" analytics-value="Compose" href="#/message-center/compose">Compose</a><!---->
				<div if-feature-enabled="messagesEnhancement" class="btn-group margin-left-default" role="group" data-ng-if="!isStandardSharedAccess">
					<button class="btn btn-default" data-ng-disabled="checkedForDeleteCount <= 0 || statusLoading" data-ng-click="setDeleteConfirmation(true)" type="button" disabled="disabled"><span class="glyphicon glyphicon-trash"></span> Delete</button>
					<spinner-inline spinner-type="status" trigger="">
						<span id="status-spinner" ng-show="showSpinner" class="ng-hide"><img src="assets/images/update-spinner.gif" alt="Loading spinner"></span>
					</spinner-inline>
				</div><!---->
			</div><!---->
			<div if-feature-enabled="messagesEnhancement" class="header ng-hide" data-ng-show="showDeleteConfirmation" data-ng-if="!isStandardSharedAccess">
				<div id="delete-confirmation" class="modal-content">
					<div class="modal-body">
						<div class="alert-icon-box hidden-xs hidden-s"><i class="icon-alert"></i>
						</div>
						<h5 class="bold">Delete Selected Messages?</h5>
						<p class="text-muted">Are you sure you want to permanently delete the selected message from your Message Center?</p>
					</div>
					<div class="modal-footer text-right" role="group">
						<button type="button" class="btn btn-default btn-block-sm" data-ng-click="setDeleteConfirmation(false)">Cancel</button> 
						<button type="button" class="btn btn-primary btn-block-sm" data-ng-click="delete()">Confirm</button>
					</div>
				</div>
			</div><!---->
		</div><!---->
		<table class="table inbox" data-ng-include="getTableSrc()">
			<thead class="table-header">
				<tr>
					<th if-feature-enabled="messagesEnhancement"></th>
					<th>From</th>
					<th>Subject</th>
					<th></th>
					<th>Received</th>
				</tr>
			</thead>
			<tbody><!----></tbody>
		</table>
		<spinner-inline trigger="false">
			<br>
			<div id="inline-spinner" ng-show="showSpinner" class="ng-hide">
				<img src="assets/images/update-spinner.gif" alt="Loading spinner">
				<div>Loading Results</div>
			</div>
		</spinner-inline>
		<p class="text-muted ng-hide" data-ng-show="folder === 'outbox'">* Messages in bold have not yet been read by clinic staff.</p>
		<div class="text-center ng-hide" data-ng-show="isUserProxied()">
			<p>Message history before the date you enable access is private, and not visible to individuals who have access to your account.</p>
			<p>You will begin viewing any messages dated from that date, forward.</p>
		</div>
		<div class="btn-centered ng-hide" data-ng-show="hasMore">
			<button class="btn btn-primary" data-ng-disabled="gettingMore" data-ng-click="loadMoreMessages()" type="button" data-ng-bind="getMoreText">Load More Messages</button>
		</div>
	</div>
</div>