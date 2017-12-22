<div data-ng-view="" class="welcome-route-content">
    <section id="lobby" data-ng-controller="LobbyController">
        <div class="page-header clearfix">
            <h1>Welcome Thanh Hung</h1></div>
        <div>
            <div class="row">
                <div id="WantMoreMain" data-ng-class="{'col-lg-6': lobbyWizardStep === 'default'}" class="col-xs-12 text-center col-lg-6">
                    <div data-ng-switch="lobbyWizardStep">
                        <!---->
                        <!---->
                        <!---->
                        <div data-ng-switch-default="">
                            <p class="want-more-main-title">Want More Features?</p>
                            <p></p>
                            <p>You currently have a limited access guest account. If you are a Spectrum Health or Priority Health member you can access all of the great MyHealth features.</p>
                            <div class="col-lg-offset-4 col-lg-4 col-md-offset-4 col-md-4 col-sm-offset-4 col-sm-4 col-xs-12">
                                <button data-ng-click="showEnrollmentForms()" type="button" class="btn btn-primary btn-lg lobby-show-my-data-button" data-ng-disabled="getDataDisabled">Show My Data</button>
                            </div>
                        </div>
                        <!---->
                    </div>
                </div>
                <div class="col-xs-12 col-lg-6" data-ng-show="lobbyWizardStep === 'default'">
                    <div class="row">
                        <section id="ShareAccess" class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-1 col-xs-10 col-xs-offset-1 margin-top-default">
                            <div class="lobby-shadow-box-container"><img class="center-block lobby-shadow-box-icon" src="<?php echo base_url() ?>hoso/assets/images/lobby_share-access.png" alt="Share Access Icon">
                                <p class="center-block text-center margin-bottom-sm margin-top-sm lobby-shadow-box-title">Share Access</p>
                                <ul class="margin-right-sm lobby-shadow-box-description">
                                    <li>Please visit the MyHealth website to manage your Share Access settings.</li>
                                </ul>
                            </div>
                        </section>
                        <section id="ContactUs" class="col-lg-6 col-md-5 col-sm-5 col-sm-offset-0 col-xs-10 col-xs-offset-1 margin-top-default">
                            <div class="lobby-shadow-box-container"><img class="center-block lobby-shadow-box-icon" src="<?php echo base_url() ?>hoso/assets/images/lobby_contact-us.png" alt="Contact Us Icon"> <a href="#/about/contactus" class="center-block text-center margin-bottom-sm margin-top-sm lobby-shadow-box-title" analytics-on="" analytics-event="#/about/contactus" analytics-category="Link" analytics-label="/welcome" analytics-value="Contact Us">Contact Us</a>
                                <ul class="margin-right-sm lobby-shadow-box-description">
                                    <li>Contact us by email, phone or MyHealth message.</li>
                                    <li>Ask questions about MyHealth.</li>
                                    <li>Ask questions about your account.</li>
                                </ul>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>